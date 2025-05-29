<x-mail::message>
Для статьи
# "{{$article->title}}"
Был добавлен комментарий с текстом:
{{$comment->text}}

<x-mail::button :url="$url">
Просмотр статьи
</x-mail::button>

</x-mail::message>