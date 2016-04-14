@extends('app')
@section('content')
<div class="container">
    <div id="blog" class="row"> 
        @foreach($articles as $article)
        <div class="col-md-10 blogShort">
            <h1>{{ $article->title }}</h1>
            <em>Posted on: {{ $article->created_at }}</em>
            <article>{{ $article->text }}</article>
            {!! link_to('articles/' . $article->id . '/delete', 'Delete', ['class' => 'btn btn-blog pull-right marginBottom10']) !!}
            {!! link_to('articles/' . $article->id . '/edit', 'Edit', ['class' => 'btn btn-blog pull-right marginBottom10']) !!}
            {!! link_to('articles/' . $article->id, 'Read more', ['class' => 'btn btn-blog pull-right marginBottom10']) !!}
        </div>
        @endforeach
@endsection