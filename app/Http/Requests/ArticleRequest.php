<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
//        $article = $this->route('articles');        
//        return Gate::allows('update-article', Article::findOrFail($article));
        
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $article = $this->route('articles');        
        $article_id = ($article) ? $article->id : null;
        return [
            'title' => 'required|unique:articles,title,' . $article_id . '|min:5|max:50',
            'text' => 'required|min:5|max:1000',
            'published_at' => 'required|date'
        ];
    }

}
