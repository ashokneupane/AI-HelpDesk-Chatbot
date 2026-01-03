<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DialogFlowController extends Controller
{
    public function handle(Request $request)
    {
        // 1. Read intent tag
        $intentTag = $request->input('fulfillmentInfo.tag');

        // 2. Read parameters (entities)
        $parameters = $request->input('sessionInfo.parameters');
        $accountType = $parameters['account_type'] ?? null;

        // 3. Fetch answer from DB
        $answer = $this->getAnswer($intentTag, $accountType);

        // 4. Return response to Dialogflow
        return response()->json([
            "fulfillment_response" => [
                "messages" => [
                    [
                        "text" => [
                            "text" => [$answer]
                        ]
                    ]
                ]
            ]
        ]);
    }

     private function getAnswer($intent, $accountType)
    {
        $faq = DB::table('faqs')
            ->where('intent', $intent)
            ->when($accountType, function ($query) use ($accountType) {
                $query->where('account_type', $accountType);
            })
            ->first();

        return $faq
            ? $faq->answer
            : "Sorry, I couldn't find the answer. Please contact IT support.";
    }
}
