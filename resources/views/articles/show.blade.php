@extends('layout')
@section('content')


<table class="table">
  <thead>
    <tr>
      <th scope="col">Дата</th>
      <th scope="col">Название</th>
      <th scope="col">Короткое описание</th>
      <th scope="col">Описание</th>
    </tr>
  </thead>
  <tbody>
      @foreach($articles as $article)
      <tr>
        <th scope="row">{{ $article->datePublic  ?? ' ' }}</th>
        <th>@can('article')<a href="{{ route('article.edit', $article->id) }}">@endcan{{ $article->title ?? ' ' }}@can('article')</a>@endcan</th>
        <td>{{ $article->shortDesc  ?? ' ' }}</td>
        <td>{{ $article->desc  ?? ' ' }}</td>
      </tr>
      @endforeach
  </tbody>
</table>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        {!! $articles->links('pagination::bootstrap-5') !!}
    </ul>
</nav>
@endsection
