<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\ChatSession;
use App\Services\WhatsAppService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function start(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'min:6', 'max:30'],
            'session_token' => ['nullable', 'string', 'max:64'],
        ]);

        $session = null;

        if (! empty($validated['session_token'])) {
            $session = ChatSession::where('session_token', $validated['session_token'])
                ->where('status', 'active')
                ->first();
        }

        if (! $session) {
            $session = ChatSession::create([
                'session_token' => Str::random(64),
                'visitor_name' => trim($validated['name']),
                'visitor_phone' => trim($validated['phone']),
                'status' => 'active',
                'last_active_at' => now(),
            ]);
        } else {
            $session->update([
                'visitor_name' => trim($validated['name']),
                'visitor_phone' => trim($validated['phone']),
                'last_active_at' => now(),
            ]);
        }

        $messages = $session->messages()
            ->orderBy('id')
            ->get(['id', 'sender', 'body', 'created_at']);

        return response()->json([
            'session_token' => $session->session_token,
            'visitor_name' => $session->visitor_name,
            'visitor_phone' => $session->visitor_phone,
            'messages' => $messages,
        ]);
    }

    public function send(Request $request, WhatsAppService $whatsApp): JsonResponse
    {
        $validated = $request->validate([
            'session_token' => ['required', 'string', 'max:64'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $session = ChatSession::where('session_token', $validated['session_token'])
            ->where('status', 'active')
            ->firstOrFail();

        $session->update(['last_active_at' => now()]);

        $message = ChatMessage::create([
            'chat_session_id' => $session->id,
            'sender' => 'visitor',
            'body' => trim($validated['message']),
        ]);

        $wamid = $whatsApp->sendVisitorMessageToAdmin($session, $message);

        if ($wamid) {
            $message->update(['wamid' => $wamid]);
        }

        return response()->json([
            'message' => [
                'id' => $message->id,
                'sender' => $message->sender,
                'body' => $message->body,
                'created_at' => $message->created_at,
            ],
        ], 201);
    }

    public function messages(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'session_token' => ['required', 'string', 'max:64'],
            'after_id' => ['nullable', 'integer', 'min:0'],
        ]);

        $session = ChatSession::where('session_token', $validated['session_token'])
            ->where('status', 'active')
            ->firstOrFail();

        $query = $session->messages()->orderBy('id');

        if (! empty($validated['after_id'])) {
            $query->where('id', '>', (int) $validated['after_id']);
        }

        $messages = $query->get(['id', 'sender', 'body', 'created_at']);

        return response()->json([
            'messages' => $messages,
        ]);
    }
}