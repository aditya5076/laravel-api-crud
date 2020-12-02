<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Resources\Article as ArticleResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $articles = Article::paginate(5);

        // Return collection of articles as a resource
        return ArticleResource::collection($articles);
    }
    
    public function store(Request $request)
    {
        // for put and post req
        $article=$request->isMethod('put') ? Article::findOrFail($request->article_id) :new Article;

        $article->id=$request->input('article_id');
        $article->title=$request->input('title');
        $article->body=$request->input('body');

        if($article->save()){
            return new ArticleResource($article);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=Article::findOrfail($id); //get article using id

        return new ArticleResource($article); //display article
    }


    public function destroy($id)
    {
        $article=Article::findOrfail($id); //get article using id

        if($article->delete()){
            return new ArticleResource($article); //delete article
        }
        return null;
    }
}
