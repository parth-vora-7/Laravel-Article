@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div>
            <h1>{!! link_to('articles/' . $article->id, $article->title) !!}</h1>
            <em>Posted on: {{ $article->created_at }}</em>
            <article>{{ $article->text }}</article>
        </div>
        <div>
            @include('article/partials/article-links')
        </div>
    </div>
</div>
@endsection
