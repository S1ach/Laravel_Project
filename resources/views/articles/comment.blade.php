<!-- @extends('layout')

@section('content')

<h1>{{ $article->title }}</h1>
<p>{{ $article->desc }}</p>

<h2>Комментар21ии</h2>
<ul>
    @forelse($comments as $comment)
        <li>
            <strong>{{ $article->user->name }}</strong>: {{ $comment->text }}

            @can('comment', $comment)
                <div>
                    <a href="{{ url('/comments/' . $comment->id . '/edit') }}">Редактировать</a> |
                    <a href="{{ url('/comments/' . $comment->id . '/delete') }}"
                       onclick="return confirm('Удалить комментарий?')">Удалить</a>
                </div>
            @endcan
        </li>
    @empty
        <li>Комментариев пока нет.</li>
    @endforelse
</ul>

<hr>

@auth
    <h3>Оставить комментарий</h3>

    @if (session('status'))
        <p style="color: green;">{{ session('status') }}</p>
    @endif

    <form action="{{ url('/comments') }}" method="POST">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">

        <!-- <div>
            <label for="title">Заголовок:</label><br>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            @error('title') <p style="color:red">{{ $message }}</p> @enderror
        </div> -->

        <div>
            <label for="text">Комментарий:</label><br>
            <textarea name="text" id="text" rows="4" required>{{ old('text') }}</textarea>
            @error('text') <p style="color:red">{{ $message }}</p> @enderror
        </div>

        <button type="submit">Отправить</button>
    </form>
@else
    <p><a href="{{ route('login') }}">Войдите</a>, чтобы оставить комментарий.</p>
@endauth

@endsection -->