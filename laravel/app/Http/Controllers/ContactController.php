<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Laravel\Nova\Nova;

use App\Models\Contacts;
use App\Models\WebSettings;

use App\Mail\AdminContactNotification;
use App\Mail\ContactFormReceipt;

class ContactController extends Controller
{
    public function index( Request $request ){
        return view('contact.index');
    }

    public function submit( Request $request ){
        // Honeypot: if filled -> spam
        if ($request->filled('website')) {
            return back()->with('message-error', 'Invalid form submission.')->withInput();
        }

        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'email' => 'required|email|max:150',
            'message' => 'required|string|max:2000',
            'cf-turnstile-response' => 'required|string',
        ]);

        // Verify Cloudflare Turnstile
        $verify = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => config('services.turnstile.secret_key'),
            'response' => $request->input('cf-turnstile-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!($verify['success'] ?? false)) {
            return back()->with('message-error', 'Captcha verification failed.')->withInput();
        }

        $contact = Contacts::create([
            'fname' => $request->input('first_name'),
            'lname' => $request->input('last_name'),
            'email' => $request->input('email'),
            'subject' => 'มีการติดต่อผ่านหน้าเว็บไซต์จาก ' . ($request->input('first_name') . ' ' . ($request->input('last_name') ?? '')),
            'message' => $request->input('message'),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Build a full Nova URL like: https://your-app-url/cms/resources/contacts/{id}
        $novaUrl = rtrim(config('app.url'), '/')
                 . '/' . trim(Nova::path(), '/')
                 . '/resources/contacts/' . $contact->getKey();

        // Load once (and cache for speed)
        $settings = cache()->remember('websettings', 3600, fn () =>
            WebSettings::get()->pluck('value', 'key')->toArray()
        );

        // Send emails
        $contactEmail = $settings['COMPANY_CONTACT_EMAIL'] ?? null;
        if ( $contactEmail ) {
            try{
                Log::info('Mail: sending admin notification…', ['to' => $contactEmail]);
                $mailAdmin = Mail::to($contactEmail)->send(new AdminContactNotification($contact, $novaUrl, $settings));
                Log::info('Mail: admin sent ✅');
            } catch (\Throwable $e) {
                dd("Admin Err: " . $e->getMessage());
                Log::error('Mail: admin failed ❌', ['error' => $e->getMessage()]);
            }
            try{
                Log::info('Mail: sending user receipt…', ['to' => $contact->email]);
                $mailReceipt = Mail::to($contact->email)->send(new ContactFormReceipt($contact, $settings));
                Log::info('Mail: user sent ✅');
            }catch (\Throwable $e) {
                dd("User Err: " . $e->getMessage());
                Log::error('Mail: user failed ❌', ['error' => $e->getMessage()]);
            }
        }

        return redirect()
                ->route('contact.index')
                ->with('message-success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
