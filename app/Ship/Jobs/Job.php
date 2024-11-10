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
            'text' => 'Привет, Я ботик',
        ]);
    }
}
