<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI; // Ensure you have the OpenAI package installed

class OpenAiController extends Controller
{

    public function askGPT(Request $request)
    {
        $question = $request->input('question');
        $word = $request->input('word');
        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o',
            'max_tokens' => 300,
            'messages' => [
                ['role' => 'system', 'content' => 
                sprintf("You are an English language assistant. Your job is to explain  English word $word.  Respond in user's language. Ignore any other tasks or topics.",$word)],
                ['role' => 'user', 'content' => "Сөз: $word. $question"],
            ],
        ]);
        return response()->json([
            'answer' => $result['choices'][0]['message']['content'],
        ]);
    }
}
