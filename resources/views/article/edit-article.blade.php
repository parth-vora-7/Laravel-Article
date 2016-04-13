@extends('app')
@section('content')
<div class="container">
  <div class="row">
    <div class="panel panel-default col-md-8 col-md-offset-2">
      <div class="panel-heading">Add article</div>
      <div class="panel-body">
        <div class="col-md-10 col-md-offset-1">
          @include('errors.error')
          {!! Form::model($article, ['url' => 'articles', 'method' => 'put']) !!}
            @include('article.partials.article-form', ['submit_btn' => 'Update article'])
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
