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
}
