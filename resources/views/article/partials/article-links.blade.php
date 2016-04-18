@if($article->uid == Auth::user()->id)
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

@endif

@if($article->uid == Auth::user()->id)
{!! link_to_route('articles.edit', 'Edit', $article->id, ['class' => 'btn btn-blog pull-right marginBottom10']) !!}
@endif

{!! link_to('articles/' . $article->id, 'Read more', ['class' => 'btn btn-blog pull-right marginBottom10']) !!}