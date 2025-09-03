<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\ProductReviews;

use Illuminate\Support\Facades\Http;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function detail(Request $request, $slug=''){
        if( $slug == '' ){
            $product = Products::Published()->get()->last();
        }else{
            $product = Products::Published()->where('slug', $slug)->first();
        }
        if( !$product ){
            return redirect('home')->with('message-error', 'Product not found!');
        }

        // dd( $product->displayedReviews );

        $dataCompact = [
            'product',
        ];

        return view('product.detail', compact($dataCompact));
    }

    public function submitReview(Request $request){
        // dd( $request->file('img') );
        /* HoneyPot checking - Start */
        if ($request->filled('website')) {
            return redirect()->route('product.detail', ['slug' => $request->slug])->with('message-error', 'Spam detected.');
        }
        /* HoneyPot checking - End */

        /* Validation - Start */
        $validated = $request->validate([
            'img'    => 'nullable|image|mimes:jpeg,png,jpg|max:6144',
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
            'cf-turnstile-response' => 'required|string',
        ]);
        /* Validation - End */

        /* Verify Cloudflare Turnstile - Start */
        $verifyResponse = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret'   => config('services.turnstile.secret_key'),
            'response' => $request->input('cf-turnstile-response'),
            'remoteip' => $request->ip(),
        ]);

        $verifyData = $verifyResponse->json();
        if (!($verifyData['success'] ?? false)) {
            return back()->with('message-error', 'Captcha verification failed')->withInput();
        }
        /* Verify Cloudflare Turnstile - End */

        /* Get product information from slug - Start */
        $product = Products::where('slug', $request->slug)->first();
        if( !$product ){
            return redirect()->route('product.detail', ['slug' => $request->slug])->with('message-error', 'Product is missing');
        }
        /* Get product information from slug - End */

        /* Upload image - Start */
        $imgPath = null;
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $uploaded  = $request->file('img');

            $image = Image::read($uploaded->getRealPath())
                ->orient()
                ->scaleDown(1600, 1600);

            $filenameBase = 'reviews/' . uniqid('rev_', true);

            // Now that WebP is enabled, WebP first; optional JPEG fallback
            try {
                $encoded  = $image->toWebp(quality: 82);
                $filename = $filenameBase . '.webp';
            } catch (\Throwable $e) {
                $encoded  = $image->toJpeg(quality: 82);
                $filename = $filenameBase . '.jpg';
            }

            Storage::disk('public')->put($filename, (string) $encoded);
            $imgPath = $filename;
        }
        /* Upload image - End */
        
        ProductReviews::create([
            'product_id' => $product->id,
            'review_source' => 'client',
            'img' => $imgPath,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'rating' => $validated['rating'],
            'review' => $validated['review'],
            'is_approved' => false,
            'is_highlight' => false
        ]);

        return back()->with('message-success', 'Thank you for your review! Your review is now pending for approval.');
    }
}
