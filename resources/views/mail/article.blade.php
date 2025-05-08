<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $article->title }}</title>
</head>
<body>
    <div class="container" style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <div class="card" style="border: 1px solid #ddd; border-radius: 8px; padding: 20px;">
            <div class="card-body">
                <h1 class="card-title"><strong>Заголовок: </strong>{{ $article->title }}</h1>
                <hr>
                <p class="card-text"><strong>Краткое описание: </strong>{{ $article->shortDesc }}</p>
                <p><strong>Описание: </strong>{{ $article->desc }}</p>
                <p><strong>Дата публикации: </strong> {{ $article->datePublic }}</p>
                <p><strong>Автор: <strong>{{ $article->user->name }}</p>
                <a href="{{ route('article.show', $article->id) }}" class="btn btn-primary"><div class="card" style="border: 1px solid #ddd; border-radius: 8px; padding: 5px;">Перейти к статье</div></a>
            </div>
        </div>
    </div>
</body>
</html>
