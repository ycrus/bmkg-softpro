<?php

namespace App\Http\Controllers;

use App\Models\Chatlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function index()
    {
        $results = DB::select('select question, count(question) as count 
        from chatlogs 
        group by question 
        order by count DESC
        limit 10');

        $data = [
            'title' => 'Sewa Alat',
            'permohonan' => $results,
        ];

        return view('pages.admin.history-megabot.index', $data);
    }
}
