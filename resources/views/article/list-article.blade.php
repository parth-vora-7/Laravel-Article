@extends('app')
@section('content')
<div class="container">
    @if($articles->all())
    <div id="blog" class="row class="col-md-10 col-md-offset-1 blogShort"> 
         @foreach($articles as $article)
         <div>
            <h1>{!! link_to('articles/' . $article->id, $article->title) !!}</h1>
            <div>
                <em>Posted by: {{ \App\User::find($article->uid)->name }}</em> |
                <em>Posted on: {{ $article->created_at }}</em>
            </div>
            <article>{{ $article->text }}</article>
            <div>
                @include('article/partials/article-links')
            </div>
            
        </div>
        @endforeach
        <div class="pagination">
            {!! $articles->links() !!}
        </div>
    </div>
    @else
    <div><h4>No articles to display</h4></div>
    @endif
</div>
@endsection