<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Article;
use Auth;
use Gate;

class ArticleController extends Controller {

    function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $articles = Article::orderBy('published_at', 'desc')->published()->paginate(5);
        return view('article.list-article', ['articles' => $articles]);
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
        $article = Auth::User()->articles()->create($request->all());
        if($article) {
            $request->session()->flash('alert-class', 'alert-success');
            $request->session()->flash('message', 'New article has been created successfully.');
            return redirect('articles');
        } else {
            $request->session()->flash('alert-class', 'alert-danger');
            $request->session()->flash('message', 'Some error occured.');
            return redirect('articles');
        }
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
    public function edit(Article $article, Request $request) {
// Method 1        
//        if (Gate::denies('update-article', $article)) {
//            abort(403);
//        }
        
// Method 2
        if($request->user()->cannot('update-article', $article)) {
            abort(403);
        }
        
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
        if($request->user()->cannot('update-article', $article)) {
            abort(403);
        }
        if ($article->update($request->all())) {
            $request->session()->flash('alert-class', 'alert-success');
            $request->session()->flash('message', 'Article has been updated successfully.');
            return redirect('articles');
        } else {
            $request->session()->flash('alert-class', 'alert-danger');
            $request->session()->flash('message', 'An error occoured while updating article.');
            return view('article.edit-article', compact('article'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, Request $request) 
    {
        if($request->user()->cannot('delete-article', $article)) {
            abort(403);
        }
        if($article->trashed()) {
            $article->forceDelete();
            $request->session()->flash('alert-class', 'alert-success');
            $request->session()->flash('message', 'Article has been successfully removed.');
            return back();
        } else {
            $article->delete();
            $request->session()->flash('alert-class', 'alert-success');
            $request->session()->flash('message', 'Article has been successfully moved to trash.');
            return back();
        }
    }
    
    /**
     * To show list of soft deleted articles
     * return 
     */
    
    public function getTrash()
    {
        $articles = Article::onlyTrashed()->orderBy('published_at', 'desc')->where('uid', \Auth::User()->id)->paginate(5);
        return view('article.list-article', ['articles' => $articles]);
    }
    
    /**
     * To restore a soft deleted article
     * @param \App\Article $article
     */
    
    public function restoreArticle(Article $article, Request $request) 
    {
        if($request->user()->cannot('restore-article', $article)) {
            abort(403);
        }
        $request->session()->flash('alert-class', 'alert-success');
        $request->session()->flash('message', 'Article has been restored successfully.');
        $article->restore();
        return back();
    }
    
    /**
     * To get only logged in user's articles
     */
    
    function userArticles() {
        $articles = Article::myArticles()->withTrashed()->paginate(5);
        return view('article.list-article', ['articles' => $articles]);
    }
    
    /*
     * To display articles in grid view
     */
    
    function gridView() {
        $articles = Article::paginate(9);
        dd($articles);
        
        return view('article.list-grid-article', ['articles' => $articles]);
    }
}
