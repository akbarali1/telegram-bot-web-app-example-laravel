<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Http\Request;


/**
 * Created by PhpStorm.
 * Filename: TelegramService.php
 * Project Name: internet-magazin-bot.loc
 * Author: Акбарали
 * Date: 22/06/2022
 * Time: 12:09
 * Github: https://github.com/akbarali1
 * Telegram: @akbar_aka
 * E-mail: me@akbarali.uz
 */
class TelegramService
{
    protected mixed $api_key;

    public function __construct()
    {
        $this->api_key = env('TELEGRAM_BOT_API_KEY');
    }

    public function sendTelegram($array, $sending = 'sendMessage'): \Psr\Http\Message\StreamInterface
    {
        $client = new Client(['base_uri' => 'https://api.telegram.org/bot'.$this->api_key.'/']);

        $response = $client->post(
            $sending,
            [
                'query' => $array,
            ]
        );

        return $response->getBody();
    }

    public function sendMessage(
        $chat_id,
        $text,
        $parse_mode = 'HTML',
        $disable_notification = false,
        $reply_to_message_id = null,
        $reply_markup = null
    ): \Psr\Http\Message\StreamInterface {
        return $this->sendTelegram(
            [
                'chat_id'              => $chat_id,
                'text'                 => $text,
                'parse_mode'           => $parse_mode,
                'disable_notification' => $disable_notification,
                'reply_to_message_id'  => $reply_to_message_id,
                'reply_markup'         => $reply_markup,
                'protect_content'      => false,
            ]
        );
    }

    public function getUsersInfo($request): array
    {
        $array      = $request;
        $chat_id    = (isset($array['message']['chat']['id'])) ? $array['message']['chat']['id'] : null;
        $first_name = (isset($array['message']['chat']['first_name'])) ? $array['message']['chat']['first_name'] : null;
        $last_name  = (isset($array['message']['chat']['last_name'])) ? $array['message']['chat']['last_name'] : null;

        return [
            'chat_id'    => $chat_id,
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'full_name'  => $first_name.' '.$last_name,
        ];

    }

    public function getChatId($request)
    {
        $array = $request->all();

        return (isset($array['message']['chat']['id'])) ? $array['message']['chat']['id'] : null;
    }

}
