@extends('app')
@section('content')

<div class="container">
    <div class="row">
        @include('errors.error')
        {!! Form::open(['url' => 'articles', 'method' => 'post']) !!}
        <div class="form-group">
            <label for="title">Title</label>
            {!! Form::text('title', '', ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Enter title']) !!}
        </div>
        
        <div class="form-group">
            <label for="text">Text</label>
            {!! Form::textarea('text', '', ['class' => 'form-control', 'id' => 'text', 'placeholder' => 'Enter text']) !!}
        </div>
        
        <div class="form-group">
            <label for="publish_at">Publish on</label>
            {!! Form::date('published_at', '', ['class' => 'form-control', 'id' => 'publish_at']) !!}
        </div>
        {!! Form::submit('Add article', ['class' => 'btn btn-submit']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection



