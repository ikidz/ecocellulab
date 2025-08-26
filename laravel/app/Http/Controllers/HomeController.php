<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Banners;
use App\Models\AboutusContents;
use App\Models\Researches;
use App\Models\CoreProductContents;

class HomeController extends Controller
{
    public function index(){

        $banners = Banners::with(['hotspots' => fn ($q) => $q->Published()])->Published()->get();
        $aboutusContent = AboutusContents::Published()->first();
        $highlightResearch = Researches::Highlighted()->first();
        $coreProductContent = CoreProductContents::Published()->first();
        // $productReview = ProductReviews::Highlighted()->get()->toArray();
        // $reviews = Reviews::Published()->get();
        // dd( $highlightResearch );

        $dataCompact = [
            'banners',
            'aboutusContent',
            'highlightResearch',
            'coreProductContent'
        ];

        return view('home.index', compact( $dataCompact ));
    }
}
