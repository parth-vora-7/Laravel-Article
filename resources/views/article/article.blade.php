@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div>
            <h1>{{ $article->title }}</h1>
            <em>Posted on: {{ $article->created_at }}</em>
            <article>{{ $article->text }}</article>
        </div>
    </div>
</div>
@endsection
