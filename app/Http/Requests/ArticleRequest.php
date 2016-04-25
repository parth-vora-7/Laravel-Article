<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Gate;
use App\Article;

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
        return [
            'title' => 'required|unique:articles|min:5|max:50',
            'text' => 'required|min:5|max:1000',
            'published_at' => 'required|date'
        ];
    }

}
