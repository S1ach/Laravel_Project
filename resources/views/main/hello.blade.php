@extends('layout')

@section('content')

@if(session('status'))
  <div class="alert alert-success">{{ session('status') }}</div>
@endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">Дата</th>
      <th scope="col">Название</th>
      <th scope="col">Короткое описание</th>
      <th scope="col">Описание</th>
      <th scope="col">Картинка</th>
    </tr>
  </thead>
  <tbody>
      @foreach($articles as $article)
      <tr>
        <th scope="row">{{ $article['date'] ?? ' ' }}</th>
        <td><a href="/galery/{{$article['number']}}">{{ $article['name'] ?? ' ' }}</a></td>
        <td>{{ $article['shortDesc'] ?? ' ' }}</td>
        <td>{{ $article['desc'] ?? ' ' }}</td>
        <td><a href="/galery/{{$article['number']}}"><img src="{{URL::asset('/images/'.$article['preview_image']) ?? ' ' }}" alt="" height='200' width='250'></a></td>
      </tr>
      @endforeach
  </tbody>
</table>

@endsection
