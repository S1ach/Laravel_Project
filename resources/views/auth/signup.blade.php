@extends('layout')
@section('content')

<form action="{{ url('/auth/signUp') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Введите имя</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Введите почту</label>
        <input type="email" class="form-control" id="email" name="email" required>
        <div id="emailHelp" class="form-text">Мы никогда не передадим вашу электронную почту кому-либо еще.</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>

@endsection
