@extends('app')
@section('content')
<div class="container">
    @if($articles->all())
    <div id="blog" class="row class="col-md-10 col-md-offset-1 blogShort"> 
         @foreach($articles as $article)
         <div>
            <h1>{{ $article->title }}</h1>
            <em>Posted on: {{ $article->created_at }}</em>
            <article>{{ $article->text }}</article>
            {!! Form::open(['route' => ['articles.destroy' , $article->id], 'method' => 'delete']) !!}
            @if($delete)
            {!! Form::submit('Delete', ['style' => 'background:none; border:none;color:red;', 'class' => 'btn btn-blog pull-right marginBottom10']) !!}
            @else
            {!! Form::submit('Trash', ['style' => 'background:none; border:none;color:red;', 'class' => 'btn btn-blog pull-right marginBottom10']) !!}
            @endif
            {!! Form::close() !!}
            @if($delete)
            {!! link_to_route('articles.restore', 'Restore', $article->id, ['class' => 'btn btn-blog pull-right marginBottom10']) !!}
            @endif
            {!! link_to_route('articles.edit', 'Edit', $article->id, ['class' => 'btn btn-blog pull-right marginBottom10']) !!}
            {!! link_to('articles/' . $article->id, 'Read more', ['class' => 'btn btn-blog pull-right marginBottom10']) !!}
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