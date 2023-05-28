<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('welcome', compact('articles'));
    }
    
    public function authorList(User $user){
        $user_details = ['name'=>$user->detail->realname, 'surname'=>$user->detail->surname];
        $articles = $user->articles->sortByDesc('created_at')->values()->all();
        return view ('article.list', compact('articles'))->with('user_details', $user_details);
    }

    public function tagList(Tag $tag){
        $articles = $tag->articles->sortByDesc('created_at')->values()->all();
        return view ('tag.articles', compact('articles'))->with('tagName', $tag);
    }
}
