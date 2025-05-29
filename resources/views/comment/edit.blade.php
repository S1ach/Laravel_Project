@extends('layout')

@section('content')

<h1 class="text-center mt-5">Комментарии</h1>
<div class="container">
    <form action="/comments/{{ $comment->id }}" method="POST" class="mb-3">
        @csrf
        @method('PUT') {{-- <-- ключевая строка для обновления --}}
        
        <div class="mb-3">
            <label for="text" class="form-label">Текст</label>
            <textarea class="form-control" id="text" name="text" placeholder="Ваш текст" required>{{ $comment->text }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Обновить комментарий</button>
    </form>
</div>

@endsection