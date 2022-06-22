<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Services\TelegramService;
use Closure;
use Illuminate\Http\Request;

class TelegramAuthMiddleware
{

    public function handle(Request $request, Closure $next, ...$guards)
    {
        $array = (new TelegramService())->getUsersInfo($request->toArray());

        $chat_id   = $array['chat_id'];
        $full_name = $array['full_name'];

        $user = User::query()->where('telegram_id', $chat_id)->first();

        if (!$user) {
            $user = User::query()->create([
                'telegram_id' => $chat_id,
                'name'        => $full_name,
                'email'       => $chat_id.'@uzhackersw.uz',
                'password'    => bcrypt($chat_id),
            ]);
        }
        auth()->user($user);

        return $next($request);

    }
}
