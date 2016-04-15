@extends('app')
@section('content')
<div class="container">
  <div id="blog" class="row"> 
    @foreach($articles as $article)
    <div class="col-md-10 blogShort">
      <h1>{{ $article->title }}</h1>
      <em>Posted on: {{ $article->created_at }}</em>
      <article>{{ $article->text }}</article>

      {!! Form::open(['route' => ['articles.destroy' , $article->id], 'method' => 'delete']) !!}
      {!! Form::submit('Delete', ['style' => 'background:none; border:none;color:red;', 'class' => 'btn btn-blog pull-right marginBottom10']) !!}
      {!! Form::close() !!}
      {!! link_to_route('articles.edit', 'Edit', $article->id, ['class' => 'btn btn-blog pull-right marginBottom10']) !!}
      {!! link_to('articles/' . $article->id, 'Read more', ['class' => 'btn btn-blog pull-right marginBottom10']) !!}

    </div>
    @endforeach
    @endsection