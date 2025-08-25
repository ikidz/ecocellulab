<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function aboutus( Request $request ){
        return view('article.aboutus');
    }

    public function research( Request $request ){
        return view('article.research');
    }

    public function researchDetail( Request $request, $slug = null ){
        // Fetch the research detail by slug
        // Assuming you have a Researches model with a method to find by slug
        $research = \App\Models\Researches::where('slug', $slug)->firstOrFail();

        // return view('article.research-detail', compact('research'));
        return 'Detail';
    }
}
