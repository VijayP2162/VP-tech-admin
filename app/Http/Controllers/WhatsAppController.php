<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatsAppController extends Controller
{
    public function send(Request $request)
    {
        // Get numbers from request or use default array
        $numbers = $request->get('phones', ['918489852162','918667007244','916379577307']);
        $templateName = $request->get('template', 'v2'); // approved template
        $languageCode = $request->get('language', 'en_US');

        $url = env('WHATSAPP_API_URL') . '/' . env('WHATSAPP_PHONE_ID') . '/messages';

        $results = [];

        foreach ($numbers as $phone) {
            $response = Http::withToken(env('WHATSAPP_TOKEN'))
                ->post($url, [
                    'messaging_product' => 'whatsapp',
                    'to' => $phone,
                    'type' => 'template',
                    'template' => [
                        'name' => $templateName,
                        'language' => ['code' => $languageCode]
                    ]
                ]);

            $results[$phone] = $response->json();
        }

        return response()->json([
            'status' => 'completed',
            'results' => $results
        ]);

       
    }
}
