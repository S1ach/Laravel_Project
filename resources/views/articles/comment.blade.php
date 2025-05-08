@extends('layout')
@section('content')

<h1>{{ $article->title }}</h1>
<p>{{ $article->desc }}</p>

<h2>Комментарии</h2>
<ul>
    @foreach($comments as $comment)
        <li>
            <strong>{{ $comment->title }}</strong>: {{ $comment->text }}
        </li>
    @endforeach
</ul>

@endsection