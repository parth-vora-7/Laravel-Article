@extends('app')
@section('content')
<div class="container">
  @include('message')
  @if($articles->all())
  <div class="row article-container">
    @include('article.partials.article-delete-confirmbox')
    @foreach($articles as $article)
    <div class="col-lg-4 article">
      <div class="panel panel-info">
        <div class="panel-heading"><h4>{!! link_to('articles/' . $article->id, $article->title) !!}</h4></div>
        <div class="panel-body">
          <div>
            <p><em>Posted by: {{ \App\User::find($article->uid)->name }}</em></p>
            <p><em>Posted on: {{ $article->created_at }}</em></p>
          </div>
          <div>{{ substr($article->text, 0, rand(100, 400)) }}</div>
          <div>@include('article/partials/article-links')</div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div>
    {!! $articles->links() !!}
  </div>
  @else
  <div><h4>No articles to display</h4></div>
  @endif
</div>
@endsection