<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ArticleMail;
use App\Models\Comment;
use App\Jobs\VeryLongJob;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('user')->latest()->paginate(10);
        return view('articles/show', ['articles' => $articles]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'datePublic' => 'required|date',
            'title' => 'required|string|max:255',
            'shortDesc' => 'required|string|max:255',
            'desc' => 'required|string',
        ]);

        $data['user_id'] = auth()->id(); 

        $article = Article::create($data); 

        if ($article) {
            Mail::send(new ArticleMail($article));
        }

        return redirect(route('article.index'))->with('status', 'Статья успешно создана!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view( 'articles/edit', ['article'=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles/edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'datePublic' => 'required|date',
            'title' => 'required|string|max:255',
            'shortDesc' => 'required|string|max:255',
            'desc' => 'required|string',
        ]);
    
        $article->datePublic = $request->datePublic;
        $article->title = $request->title;
        $article->shortDesc = $request->shortDesc;
        $article->desc = $request->desc;
        $article->save();

        return redirect()->route('article.index')
        ->with('status', 'Статья успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('article.index'))
            ->with('status', 'Статья успешно удалена!');
    }

    public function comment($id)
    {
        $article = Article::findOrFail($id);
        $comments = $article->comments; // или другой способ получить комментарии

        return view('articles.comment', compact('article', 'comments'));
    }
}