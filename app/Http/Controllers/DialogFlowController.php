<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class DialogFlowController extends Controller
{

     public function handle(Request $request)
    {
        $parameters = $request->input('sessionInfo.parameters');


        // 3. Fetch answer from DB
        $responseText = $this->getAnswer($parameters);

        // 4. Return response to Dialogflow
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
}
