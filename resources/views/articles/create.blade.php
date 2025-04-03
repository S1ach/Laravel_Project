@extends('layout')
@section('content')


    <form action="/article" method="post">
        @csrf
        <div class="form-group">
            <label for="datePublic" class="form-label">Дата публикации</label>
            <input name="datePublic" type="date" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input name="title" type="text" class="form-control" id="title">
        </div>
        <div class="form-group">
            <label for="shortDesc">Краткое описание</label>
            <input name="shortDesc" type="text" class="form-control" id="shortDesc">
        </div>
        <div class="form-group">
            <label for="desc">Описание</label>
            <textarea name="desc" class="form-control" id="desc"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top: 20px" >Создать</button>
    </form>
@endsection