@extends('layout')
@section('content')

<h1 class="text-center mt-5">Комментарии</h1>
<div class="container">
<form action="/comment/{{$comment->id}}" method=POST  class="mb-3">
    @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Загловоки</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Введите ваш заголовок" value="{{$comment->title}}">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Текст</label>
    <textarea type="text" class="form-control" id="text" name="text" placeholder="Ваш текст">{{$comment->text}}</textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Обновить Комментарии</button>
</form>
</div>
@endsection