<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Services\TelegramService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Created by PhpStorm.
 * Filename: BotController.php
 * Project Name: internet-magazin-bot.loc
 * Author: Акбарали
 * Date: 22/06/2022
 * Time: 12:08
 * Github: https://github.com/akbarali1
 * Telegram: @akbar_aka
 * E-mail: me@akbarali.uz
 */
class BotController extends Controller
{

    protected TelegramService $telegramService;
    /**
     * @var mixed|null
     */
    protected mixed $chat_id;

    public function __construct(TelegramService $telegramService)
    {
        $this->telegramService = $telegramService;
        $this->chat_id         = $telegramService->getChatId(\request());
    }

    public function connect()
    {
        $this->telegramService->sendMessage(
            $this->chat_id,
            'Hello World!',
            'HTML',
            false,
            null,
            json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => 'Hello World!', 'web_app' => ['url' => 'https://bot.uzhackersw.uz/telegram/bot/shop']],
                        //                        ['text' => 'Bla bla!', 'web_app' => ['url' => 'https://uzhackersw.uz']],
                    ],
                    [
                        ['text' => 'Questa.uz!', 'web_app' => ['url' => 'https://questa.uz']],
                    ],
                ],
            ])
        );

        return response()->json([
            'status'  => 'success',
            'message' => 'ok',
        ]);
    }

    public function shop()
    {
        $products = [
            [
                'id'          => 1,
                'name'        => 'Test',
                'description' => 'This is a test product',
                'photo'       => 'https://megaimkon.uzwebline.com/storage/photos/all_users/%D0%9D%D0%BE%D1%83%D1%82%D0%B1%D1%83%D0%BA/HP/Athlon%203050U.png',
                'price'       => 2300000,
            ],
            [
                'id'          => 1,
                'name'        => 'Test',
                'description' => 'This is a test product',
                'photo'       => 'https://megaimkon.uzwebline.com/storage/photos/all_users/%D0%9D%D0%BE%D1%83%D1%82%D0%B1%D1%83%D0%BA/HP/Athlon%203050U.png',
                'price'       => 2300000,
            ],
            [
                'id'          => 1,
                'name'        => 'Test',
                'description' => 'This is a test product',
                'photo'       => 'https://megaimkon.uzwebline.com/storage/photos/all_users/%D0%9D%D0%BE%D1%83%D1%82%D0%B1%D1%83%D0%BA/HP/Athlon%203050U.png',
                'price'       => 2300000,
            ],
            [
                'id'          => 1,
                'name'        => 'Test',
                'description' => 'This is a test product',
                'photo'       => 'https://megaimkon.uzwebline.com/storage/photos/all_users/%D0%9D%D0%BE%D1%83%D1%82%D0%B1%D1%83%D0%BA/HP/Athlon%203050U.png',
                'price'       => 2300000,
            ],
            [
                'id'          => 1,
                'name'        => 'Test',
                'description' => 'This is a test product',
                'photo'       => 'https://megaimkon.uzwebline.com/storage/photos/all_users/%D0%9D%D0%BE%D1%83%D1%82%D0%B1%D1%83%D0%BA/HP/Athlon%203050U.png',
                'price'       => 2300000,
            ],

        ];

        return view('telegram.shop', compact('products'));
    }

}
