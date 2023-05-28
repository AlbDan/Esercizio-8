<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{

    public function __construct(){
        $this->middleware(['auth','is_admin']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view ('tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        Tag::create([
            'name'=>$request->name
        ]);

        return redirect(route('tag.create'))->with('status','Tag inserted correctly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view ('tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update([
            'name'=> $request->name
        ]);

        return redirect(route('tag.index'))->with('status','Tag modified correctly!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {

        $articles = Article::all();
        for ($i=0; $i < count($articles); $i++) { 
            for ($j=0; $j < count($articles[$i]->tags); $j++) { 
                if ($articles[$i]->tags[$j]['name']==$tag['name']) {
                    $articles[$i]->tags()->detach($articles[$i]->tags[$j]);
                }
            }
        }

        $tag->delete();

        return redirect(route('tag.index'))->with('status','The Tag has been deleted');
    }
}
