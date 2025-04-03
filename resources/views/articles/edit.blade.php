@extends('layout')
@section('content')


    <form action="/article/{{$article->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="datePublic" class="form-label">Дата публикации</label>
            <input name="datePublic" type="date" class="form-control" id="datePublic" value="{{$article->datePublic}}">
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input name="title" type="text" class="form-control" id="title" value="{{$article->title}}">
        </div>
        <div class="form-group">
            <label for="shortDesc">Краткое описание</label>
            <input name="shortDesc" type="text" class="form-control" id="shortDesc" value="{{$article->shortDesc}}">
        </div>
        <div class="form-group">
            <label for="desc">Описание</label>
            <textarea name="desc" class="form-control" id="desc">{{$article->desc}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top: 20px" >Обновить</button>
        <form action="{{ route('article.destroy', $article->id) }}" method="post" >
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit" style="margin-top: 20px">Удалить</button>
        </form>
    </form>
@endsection