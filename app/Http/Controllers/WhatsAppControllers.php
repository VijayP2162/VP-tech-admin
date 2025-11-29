<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WhatsAppController extends Controller
{
    public function sendBulk()
    {
        $token = env('WHATSAPP_TOKEN');
        $phoneNumberId = env('WHATSAPP_PHONE_NUMBER_ID');

        $numbers = [
            '919876543210',
            '919812345678',
            '919801234567'
        ];

        foreach ($numbers as $number) {

            Http::withToken($token)->post(
                "https://graph.facebook.com/v18.0/$phoneNumberId/messages",
                [
                    "messaging_product" => "whatsapp",
                    "to" => $number,
                    "type" => "text",
                    "text" => ["body" => "Hi! இது Laravel bulk WhatsApp message test."]
                ]
            );
        }

        return "Bulk WhatsApp messages sent successfully!";
    }
}
