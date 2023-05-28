<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    
    
    
    
    
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        //
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        //$tags = Tag::all();
        return view ('article.create');
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(ArticleRequest $request)
    {

        
        $article = Article::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'user_id'=>Auth::id()
        ]);

        $article->tags()->attach($request->tags);
        
        return redirect(route('article.create'))->with('status', 'Article inserted correctly!');
    }
    
    /**
    * Display the specified resource.
    */
    public function show(Article $article)
    {
        return view ('article.show', compact('article'));
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(Article $article)
    {
        
        
        if ($article->user_id == Auth::id()) {
            return view ('article.edit',compact('article'));
        } else {
            abort(403);
        }
        
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, Article $article)
    {
        if ($article->user_id == Auth::id()) {
            
            $article->update([
                'title'=>$request->title,
                'body'=>$request->body
            ]);

            $article->tags()->detach();
            $article->tags()->attach($request->tags);
            
            return redirect(route('article.show',compact('article')))->with('status','The article has been modified successfully!');
            
        } else {
            abort(403);
        }
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Article $article)
    {
        
        if ($article->user_id == Auth::id()) {

            $article->tags()->detach();
            $article->delete();
            return redirect(route('myprofile',compact('article')))->with("status","The article has been deleted");
            
        } else {
            abort(403);
        }
    }
}
