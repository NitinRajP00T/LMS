<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AIAssistantController extends Controller
{
    /**
     * Handle incoming chat requests and communicate with OpenAI.
     */
    public function chat(Request $request)
    {
        $apiKey = config('services.gemini.key') ?: config('services.openai.key');
        $model = config('services.gemini.model') ?: config('services.openai.model', 'gpt-4o-mini');

        if (!$apiKey) {
            return response()->json([
                'error' => 'API key is missing. Please add GEMINI_API_KEY or OPENAI_API_KEY to your .env file.'
            ], 500);
        }

        // Detect if key is a Gemini API key (starts with AIzaSy)
        $isGemini = str_starts_with($apiKey, 'AIzaSy');
        $endpoint = 'https://api.openai.com/v1/chat/completions';

        if ($isGemini) {
            $endpoint = 'https://generativelanguage.googleapis.com/v1beta/openai/chat/completions';
            // If an OpenAI model name slipped through, replace it with a valid Gemini model
            if (str_starts_with($model, 'gpt-')) {
                $model = 'gemini-2.5-flash';
            }
        }

        $request->validate([
            'messages' => 'required|array',
            'messages.*.role' => 'required|string|in:user,assistant,system',
            'messages.*.content' => 'required|string',
        ]);

        $incomingMessages = $request->input('messages');

        // Prepend system prompt to guide the AI
        $systemPrompt = [
            'role' => 'system',
            'content' => 'You are a helpful and knowledgeable learning assistant on EduLearn, a premium online Learning Management System (LMS). Your goal is to explain concepts clearly, answer student queries, provide summaries of courses/lessons, and help students succeed in their education. Keep answers educational, friendly, and structured.'
        ];

        // Combine system prompt and incoming conversation history
        $apiMessages = array_merge([$systemPrompt], $incomingMessages);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])
            ->when(app()->environment('local'), function ($http) {
                return $http->withoutVerifying();
            })
            ->timeout(30)->post($endpoint, [
                'model' => $model,
                'messages' => $apiMessages,
                'temperature' => 0.7,
            ]);

            if ($response->failed()) {
                $errorData = $response->json();
                $errorMessage = $errorData['error']['message'] ?? ($isGemini ? 'Failed to communicate with Gemini API.' : 'Failed to communicate with OpenAI API.');
                Log::error('AI API request failed: ' . json_encode($errorData));

                return response()->json([
                    'error' => $errorMessage
                ], $response->status());
            }

            $responseData = $response->json();
            $reply = $responseData['choices'][0]['message']['content'] ?? '';

            return response()->json([
                'reply' => $reply
            ]);

        } catch (\Exception $e) {
            Log::error('AI Assistant exception: ' . $e->getMessage());
            return response()->json([
                'error' => 'An unexpected error occurred while communicating with the AI assistant: ' . $e->getMessage()
            ], 500);
        }
    }
}
