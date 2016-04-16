<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Article;

class ArticleController extends Controller {

    function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $articles = Article::orderBy('published_at', 'desc')->published()->paginate(5);
        return view('article.list-article', ['articles' => $articles, 'delete' => 0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('article.add-article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request) {
        /*        Simple method to validate the inputs:  */
//        $this->validate($request, array(
//            'title' => 'required|min:5|max:25',
//            'text' => 'required|min:5|max:40',
//            'published_at' => 'required|date'
//        ));  

        /* Save record using save() */
//        $article = new Article;
//        $article->title = $request->get('title');
//        $article->text = $request->get('text');
//        $article->published_at = $request->get('published_at');
//        $article->save();

        /* Save record using create() - Mass assignment */
        //dd(\Auth::user()->id);
        $article = \Auth::User()->articles()->create($request->all());
        return redirect('articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article) {
        return view('article.article', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article) {
        return view('article.edit-article', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Article $article, ArticleRequest $request) {
        if ($article->update($request->all())) {
         //   Flash::success('Your article is successfully updated !!!');
            return redirect('articles');
        } else {
        //    Flash::error('Error occoured while updating article !!!');
            return view('article.edit-article', compact('article'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article) {
        if($article->trashed()) {
            $article->forceDelete();
        } else {
            $article->delete();
        }       
        return redirect('articles');
    }
    
    /**
     * To show list of soft deleted articles
     * return 
     */
    
    public function getTrash()
    {
        $articles = Article::onlyTrashed()->orderBy('published_at', 'desc')->paginate(5);
        return view('article.list-article', ['articles' => $articles, 'delete' => 1]);
    }
    
    /**
     * To restore a soft deleted article
     * @param \App\Article $article
     */
    
    public function restoreArticle(Article $article) 
    {
        $article->restore();
        return redirect('articles');
    }

}
