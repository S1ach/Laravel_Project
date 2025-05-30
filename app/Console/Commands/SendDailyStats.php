<?php

namespace App\Console\Commands;

use App\Mail\DailyStatsMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Models\ArticleView;
use App\Models\Comment;
use Carbon\Carbon;

class SendDailyStats extends Command
{
    protected $signature = 'daily:send-stats';
    protected $description = 'Отправка ежедневной статистики на почту';

    public function handle()
    {
        $today = Carbon::today();

        $viewsCount = ArticleView::whereDate('created_at', $today)->count();
        $commentsCount = Comment::whereDate('created_at', $today)->count();

        Mail::to('sarp2014timur@mail.ru')->send(new DailyStatsMail($viewsCount, $commentsCount));

        $this->info('Статистика отправлена успешно!');
    }
}

