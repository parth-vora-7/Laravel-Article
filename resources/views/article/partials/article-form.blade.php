<div class="form-group">
  {!! Form::label('title', 'Title') !!}
  {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Enter title']) !!}
</div>

<div class="form-group">
  {!! Form::label('text', 'Text') !!}
  {!! Form::textarea('text', null, ['class' => 'form-control', 'id' => 'text', 'placeholder' => 'Enter text']) !!}
</div>

<div class="form-group">
  {!! Form::label('publish_at', 'Publish on') !!}
  {!! Form::date('published_at', null, ['class' => 'form-control', 'id' => 'publish_at']) !!}
</div>
{!! Form::submit($submit_btn, ['class' => 'btn btn-submit']) !!}