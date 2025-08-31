<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AboutusContents;
use App\Models\Teams;
use App\Models\Researches;
use App\Models\Articles;

class ArticleController extends Controller
{
    public function aboutus( Request $request ){
        $about = AboutusContents::Published()->first();
        $teams = Teams::Published()->get();

        if( !$about ){
            return redirect()->route('home')->with('message-error','About Us page is not available.');
        }

        $dataCompact = [
            'about',
            'teams'
        ];

        return view('article.aboutus', compact( $dataCompact ) );
    }

    public function research( Request $request, $slug = null ){

        if( $slug != null ){
            $research = Researches::where('slug', $slug)->first();
            if( $research ){
                $slug = $research->slug;
            }
            $researches = Researches::Published()->where('slug', '!=', $slug)->get();
        }else{
            $research = Researches::Highlighted()->get()->last();
            if( $research ){
                $slug = $research->slug;
            }
            $researches = Researches::Published()->where('slug', '!=', $research->slug)->get();
        }

        if( !$research ){
            return redirect()->route('home')->with('message-error','Research page is not available.');
        }

        $dataCompact = [
            'research',
            'researches'
        ];

        return view('article.research', compact( $dataCompact ));
    }

    public function detail( Request $request, $slug = null ){
        
        if( $slug != null ){
            $article = Articles::where('slug', $slug)->first();
            if( $article ){
                $slug = $article->slug;
            }
            $articles = Articles::Published()->where('slug', '!=', $slug)->get();
        }else{
            $article = Articles::Published()->get()->last();
            if( $article ){
                $slug = $article->slug;
            }
            $articles = Articles::Published()->where('slug', '!=', $article->slug)->get();
        }

        if( !$article ){
            return redirect()->route('home')->with('message-error','Article page is not available.');
        }

        $dataCompact = [
            'article',
            'articles'
        ];

        return view('article.article-detail', compact( $dataCompact));
        // return 'Detail';
    }
}
