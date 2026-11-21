<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\ChatSession;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class WhatsAppWebhookController extends Controller
{
    public function verify(Request $request): Response
    {
        $mode = $request->query('hub_mode') ?? $request->query('hub.mode');
        $token = $request->query('hub_verify_token') ?? $request->query('hub.verify_token');
        $challenge = $request->query('hub_challenge') ?? $request->query('hub.challenge');

        if ($mode === 'subscribe' && $token === config('services.whatsapp.verify_token')) {
            return response((string) $challenge, 200)
                ->header('Content-Type', 'text/plain');
        }

        return response('Forbidden', 403);
    }

    public function handle(Request $request): Response
    {
        $entries = $request->input('entry', []);

        foreach ($entries as $entry) {
            foreach ($entry['changes'] ?? [] as $change) {
                $value = $change['value'] ?? [];

                foreach ($value['messages'] ?? [] as $incomingMessage) {
                    if (($incomingMessage['type'] ?? null) !== 'text') {
                        continue;
                    }

                    $replyText = trim((string) data_get($incomingMessage, 'text.body', ''));
                    if ($replyText === '') {
                        continue;
                    }

                    $quotedWamid = data_get($incomingMessage, 'context.id');
                    $session = null;

                    if ($quotedWamid) {
                        $originalMessage = ChatMessage::where('wamid', $quotedWamid)->first();
                        if ($originalMessage) {
                            $session = $originalMessage->session;
                        }
                    }

                    // Fallback to most recently active session if not explicitly quoted
                    if (! $session) {
                        $session = ChatSession::where('status', 'active')
                            ->orderByDesc('last_active_at')
                            ->first();
                    }

                    if (! $session) {
                        Log::warning('WhatsApp webhook reply could not be matched to a ChatSession.', [
                            'quoted_wamid' => $quotedWamid,
                        ]);

                        continue;
                    }

                    ChatMessage::create([
                        'chat_session_id' => $session->id,
                        'sender' => 'admin',
                        'body' => $replyText,
                        'wamid' => $incomingMessage['id'] ?? null,
                    ]);

                    $session->update(['last_active_at' => now()]);
                }
            }
        }

        return response('EVENT_RECEIVED', 200);
    }
}