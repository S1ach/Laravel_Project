@extends('layout')
@section('content')


<form action="/auth/signIn" method="post">
    @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Введите почту</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Войти</button>
</form>
@endsection
