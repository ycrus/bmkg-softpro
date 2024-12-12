<?php

namespace App\Http\Controllers;

use App\Models\Chatlog;
use Illuminate\Http\Request;

class DialogflowWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Get the question from the user
        $userMessage = $request->input('queryResult.queryText');

        // Generate a response (or fetch one from Dialogflow)
        $botMessage = $request->input('queryResult.fulfillmentText');

        // Save to database
        Chatlog::create([
            'question' => $userMessage,
            'answer' => $botMessage,
        ]);

        // Respond to Dialogflow
        return response()->json([
            'fulfillmentText' => $botMessage,
        ]);
    }
}
