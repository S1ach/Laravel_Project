
@extends('layout')
@section('content')

<div style="margin-top: 20px; margin-bottom: 40px;">
    <div class="card" style="width: 38rem; margin-left: auto; margin-right: auto;">
      <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $article->shortDesc }}</h6>
        <p class="card-text">{{ $article->desc }}</p>
        <div class="btn-group" role="group" aria-label="Basic example">
          <form action="{{ route('article.update', $article->id) }}" method="post">
              @csrf
              @method('PUT')
              <button class="btn btn-primary" type="submit">Обновить</button>
          </form>
          <form action="{{ route('article.destroy', $article->id) }}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Удалить</button>
          </form>
        </div>
      </div>
    </div>
</div>

@endsection