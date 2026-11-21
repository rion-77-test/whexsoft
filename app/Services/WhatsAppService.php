<?php

namespace App\Services;

use App\Models\ChatMessage;
use App\Models\ChatSession;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    public function sendVisitorMessageToAdmin(ChatSession $session, ChatMessage $message): ?string
    {
        $token = config('services.whatsapp.token');
        $phoneNumberId = config('services.whatsapp.phone_number_id');
        $adminPhone = config('services.whatsapp.admin_phone');
        $version = config('services.whatsapp.graph_version', 'v21.0');

        if (! $token || ! $phoneNumberId || ! $adminPhone) {
            Log::warning('WhatsApp configuration incomplete; skipping outbound send.', [
                'chat_message_id' => $message->id,
            ]);

            return null;
        }

        $text = sprintf(
            "New Chat Message\nFrom: %s (%s)\nSession: #%d\n\n%s\n\n(Swipe to reply to this message to respond on the website)",
            $session->visitor_name,
            $session->visitor_phone,
            $session->id,
            $message->body
        );

        $url = "https://graph.facebook.com/{$version}/{$phoneNumberId}/messages";

        $response = Http::withToken($token)
            ->acceptJson()
            ->post($url, [
                'messaging_product' => 'whatsapp',
                'recipient_type' => 'individual',
                'to' => preg_replace('/\D+/', '', (string) $adminPhone),
                'type' => 'text',
                'text' => [
                    'preview_url' => false,
                    'body' => $text,
                ],
            ]);

        if (! $response->successful()) {
            Log::error('WhatsApp Cloud API send failed.', [
                'status' => $response->status(),
                'body' => $response->body(),
                'chat_message_id' => $message->id,
            ]);

            return null;
        }

        return $response->json('messages.0.id');
    }
}