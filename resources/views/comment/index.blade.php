@extends('layout')

@section('content')
<div class="container">
    <h1 class="mb-3">{{ $article->title }}</h1>
    <p>{{ $article->desc }}</p>

    <h2 class="mt-5">Комментарии ({{ $comments->count() }})</h2>

    @forelse($comments as $comment)
        <div class="card mb-3">
            <div class="card-body d-flex">
                <img src="{{ asset('images/a9a7392fdbbfdb00d58ea345ca96198f.avif') }}"
                        class="rounded-circle mr-3"
                        alt="Avatar"
                        width="40"
                        height="40">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-1">{{ $comment->user->name ?? 'Аноним' }}</h5>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="mb-2">{{ $comment->text }}</p>

                    @can('comment', $comment)
                        <div>
                            <a href="{{ url('/comments/' . $comment->id . '/edit') }}" class="btn btn-sm btn-outline-primary">Редактировать</a>
                            <a href="{{ url('/comments/' . $comment->id . '/delete') }}"
                               onclick="return confirm('Удалить комментарий?')"
                               class="btn btn-sm btn-outline-danger">Удалить</a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">Комментариев пока нет.</p>
    @endforelse

    <hr>

    @auth
        <h3>Оставить комментарий</h3>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form action="{{ url('/comments') }}" method="POST" style="margin-bottom: 70px;">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">

            <div class="form-group">
                <label for="text">Комментарий:</label>
                <textarea name="text" id="text" class="form-control w-50" rows="3" style="margin-bottom: 20px;" required>{{ old('text') }}</textarea>
                @error('text') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    @else
        <p class="mt-4"><a href="{{ route('login') }}">Войдите</a>, чтобы оставить комментарий.</p>
    @endauth
</div>
@endsection