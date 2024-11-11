<?php
namespace App\Ship\Jobs;

use App\Ship\Parents\Jobs\Job as ParentJob;
use Telegram\Bot\Api;
use Illuminate\Support\Facades\Log;

class Job extends ParentJob
{
    public function __construct()
    {
    }

    public function handle(): void
    {
        $telegram = new Api(config('services.telegram.bot_token'));

        $telegram->sendMessage([
            'chat_id' => config('services.telegram.chat_id'),
            'text' => 'Бу испугался? не бойся я друг я тебя не обижу иди сюда иди ко мне сядь рядом со мной посмотри мне в глаза ты видишь меня я тоже тебя вижу давай смотреть друг на друга до тех пор пока наши глаза не устанут ты не хочешь почему что-то не так',
        ]);
    }
}
