<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Log;

class DialogFlowController extends Controller
{

     public function handle(Request $request)
    {
        $parameters = $request->input('sessionInfo.parameters');

        // Fetch answer from DB
        $responseText = $this->getAnswer($parameters);

        // Return response to Dialogflow
        return response()->json([
            "fulfillment_response" => [
                "messages" => [
                    [
                        "text" => [
                            "text" => [$responseText]
                        ]
                    ],
                    [
                        "text" => [
                            "text" => ["Did this response solve your issue?"]
                        ]
                    ]
                ]
            ]
        ]);
    }

     private function getAnswer($details)
    {
        $faq = Faq::where('category', $details['category']??null)
                    ->where('issue_type',$details['issue_type']??null)
                    ->where('system',$details['system']??null)
                    ->where('platform',$details['platform']??null)
                    ->first();

        return $faq
            ? $faq->response_text
            : $faq->count().''."Sorry, I couldn't find the answer. Please contact IT support.";
    }

    public function createTicket(Request $request)
    {
        $parameters = $request->input('sessionInfo.parameters');
        Log::info($parameters);

        $ticket = Ticket::create($parameters);
        $ticket->ticket_code = 'IT-' . str_pad($ticket->id, 4, '0', STR_PAD_LEFT);
        $ticket->save();

        // Return response to Dialogflow
        return response()->json([
            "fulfillment_response" => [
                "messages" => [
                    [
                        "text" => [
                            "text" => ["✅ Your IT support ticket has been created"]
                        ]
                        ],
                         [
                        "text" => [
                            "text" => ["Ticket ID: {$ticket->ticket_code}"]
                        ]
                    ],
                     [
                        "text" => [
                            "text" => ["Issue: {$ticket->category} {$ticket->issue_type} ({$ticket->platform} {$ticket->system})"]
                        ]
                    ],
                         [
                        "text" => [
                            "text" => ["⏱️ Our IT team will contact you within 24 hours."]
                        ]
                        ],
                        [
                        "text" => [
                            "text" => ["Is there anything else I can help you with today?"]
                        ]
                    ]
                    ]
                    ],
                ]);
    }
}
