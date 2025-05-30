<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ArticleView;

class LogArticleView
{
    public function handle(Request $request, Closure $next)
    {
        ArticleView::create([
            'url' => $request->fullUrl(),
            'ip_address' => $request->ip(),
        ]);

        return $next($request);
    }
}

