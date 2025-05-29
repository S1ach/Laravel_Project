<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentMail;
use App\Models\Article;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|max:256',
        ]);

        $articleId = $request->article_id;
        $article = Article::findOrFail($articleId);

        $comment = new Comment;
        $comment->title = '';
        $comment->text = $request->text;
        $comment->user_id = auth()->id();
        $comment->article_id = $articleId;

        if ($comment->save()) {
            Mail::to('sarp2014timur@mail.ru')->send(new CommentMail($comment, $article));
        }

        return redirect("/article/{$articleId}/comment")
               ->with('status', 'Добавлен новый комментарий');
    }

    public function delete(Comment $comment)
    {
        Gate::authorize('comment', $comment);

        $articleId = $comment->article_id;
        $comment->delete();

        return redirect("/article/{$articleId}/comment")
               ->with('save', 'Комментарий был удалён');
    }

    public function edit(Comment $comment)
    {
        Gate::authorize('comment', $comment);
        return view('comment.edit', ['comment' => $comment]);
    }

    public function update(Comment $comment, Request $request)
    {
        Gate::authorize('comment', $comment);

        $request->validate([
            'text' => 'required|max:256',
        ]);

        $comment->text = $request->text;
        $comment->save();

        $articleId = $comment->article_id;

        return redirect("/article/{$comment->article_id}/comment")->with('save', 'Комментарий обновлён');
    }

    public function showForArticle($id)
    {
        $article = Article::findOrFail($id);
        $comments = $article->comments()->latest()->get();

        return view('comment.index', compact('article', 'comments'));
    }
}