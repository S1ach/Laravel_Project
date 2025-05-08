<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $articles = json_decode(file_get_contents(public_path() . '/articles.json'), true);
        return view('main/hello', ['articles' => $articles]);
    }

    public function show($full_image){
        return view('main/page', ['image' => $full_image]);
    }
}