<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatLog;

class DialogflowWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Get the question from the user
        $userMessage = $request->input('queryResult.queryText');

        // Generate a response (or fetch one from Dialogflow)
        $botMessage = $request->input('queryResult.fulfillmentText');

        // Save to database
        ChatLog::create([
            'question' => $userMessage,
            'answer' => $botMessage,
        ]);

        // Respond to Dialogflow
        return response()->json([
            'fulfillmentText' => $botMessage,
        ]);
    }
}
