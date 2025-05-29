@extends('layout')
@section('content')


<table class="table">
  <thead>
    <tr>
      <th scope="col">Название</th>
      <th scope="col">Дата</th>
      <th scope="col">Короткое описание</th>
      <th scope="col">Описание</th>
      <th scope="col">Автор</th>
    </tr>
  </thead>
  <tbody>
      @foreach($articles as $article)
      <tr>
        <th>
            <div>
                    <a href="{{ url('article/' . $article->id . '/comment') }}">{{ $article->title ?? ' ' }}</a>
            </div>
            @can('article')
                <div>
                    <a href="{{ route('article.edit', $article->id) }}">Изменить</a>
                </div>
            @endcan
        </th>
        <th scope="row">{{ $article->datePublic  ?? ' ' }}</th>
        <td>{{ $article->shortDesc  ?? ' ' }}</td>
        <td>{{ $article->desc  ?? ' ' }}</td>
        <td>{{ $article->user ? $article->user->name : 'Неизвестный автор' }}</td>
      </tr>
      @endforeach
  </tbody>
</table>
{!! $articles->links('pagination::bootstrap-5') !!}
@endsection
