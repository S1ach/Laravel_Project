<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $articles = json_decode(file_get_contents(public_path() . '/articles.json'), true);
        return view('main/hello', ['articles' => $articles]);
    }

    public function show($number)
{
    $articles = json_decode(file_get_contents(public_path() . '/articles.json'), true);

    $article = collect($articles)->firstWhere('number', $number);

    if (!$article) {
        abort(404);
    }

    return view('main.galery', [
        'articles' => $articles,
        'image' => $article['full_image'],
        'name' => $article['name'],
        'desc' => $article['desc'],
        'number' => $article['number'],
    ]);
}
}
