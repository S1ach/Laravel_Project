<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesToCommentsSeeder extends Seeder
{
    public function run()
    {
        $articles = DB::table('articles')->get();

        foreach ($articles as $article) {
            DB::table('comments')->insert([
                'title' => $article->title,
                'text' => $article->desc,
                'article_id' => $article->id,
                'datePublic' => $article->datePublic,
                'shortDesc' => $article->shortDesc,
                'desc' => $article->desc,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}