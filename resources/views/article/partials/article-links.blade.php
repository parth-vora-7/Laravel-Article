@include('article.partials.article-delete-confirmbox')
@can('delete-article', $article)
{!! Form::button('Delete', ['style' => 'background:none; border:none;color:red;', 'class' => 'btn btn-blog pull-right marginBottom10', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
@endcan

@can('restore-article', $article)
{!! link_to_route('articles.restore', 'Restore', $article->id, ['class' => 'btn btn-blog pull-right marginBottom10']) !!}
@endcan

@can('update-article', $article)
{!! link_to_route('articles.edit', 'Edit', $article->id, ['class' => 'btn btn-blog pull-right marginBottom10']) !!}
@endcan

@if(Request::route()->getName() !== 'articles.show')
{!! link_to('articles/' . $article->id, 'Read more', ['class' => 'btn btn-blog pull-right marginBottom10']) !!}
@endif