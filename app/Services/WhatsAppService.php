<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppService
{
    protected $token;
    protected $phoneId;
    protected $apiUrl;

    public function __construct()
    {
        $this->token = env('WHATSAPP_TOKEN');
        $this->phoneId = env('WHATSAPP_PHONE_ID');
        $this->apiUrl = env('WHATSAPP_API_URL');
    }

    public function sendTextMessage($to, $message)
    {
        $url = $this->apiUrl . '/' . $this->phoneId . '/messages';

        $payload = [
            "messaging_product" => "whatsapp",
            "to" => $to,
            "type" => "text",
            "text" => ["body" => $message]
        ];

        $response = Http::withToken($this->token)
            ->post($url, $payload);

        return $response->json();
    }


    public function sendTemplateMessage($to, $templateName = 'hello_world', $language = 'en_US')
{
    $url = $this->apiUrl . '/' . $this->phoneId . '/messages';

    $payload = [
        "messaging_product" => "whatsapp",
        "to" => $to,
        "type" => "template",
        "template" => [
            "name" => $templateName,
            "language" => ["code" => $language]
        ]
    ];

    $response = Http::withToken($this->token)
        ->post($url, $payload);

    return $response->json();
}




}
