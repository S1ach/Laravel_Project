<!DOCTYPE html>
<html>
<head>
    <title>Новая статья</title>
</head>
<body>
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->shortDesc }}</p>
    <p>{{ $article->desc }}</p>
    <p>Дата публикации: {{ $article->datePublic }}</p>
</body>
</html>