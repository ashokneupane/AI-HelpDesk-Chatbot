<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      @class(['dark' => ($appearance ?? 'system') == 'dark'])>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'AI Helpdesk') }}</title>

    <link rel="icon" href="/chatbot.png" sizes="any">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Dialogflow Messenger -->
    <link rel="stylesheet"
          href="https://www.gstatic.com/dialogflow-console/fast/df-messenger/prod/v1/themes/df-messenger-default.css">
    <script src="https://www.gstatic.com/dialogflow-console/fast/df-messenger/prod/v1/df-messenger.js"></script>
</head>

<body class="font-sans antialiased bg-gray-100">

<!-- MAIN PAGE CONTENT -->
<div class="min-h-screen p-6">
    <div class="max-w-7xl mx-auto bg-white rounded-xl shadow p-8">

        <h1 class="text-3xl font-bold mb-2">🤖 AI Helpdesk Support</h1>
        <p class="text-gray-600 max-w-3xl">
            Get quick help with your IT issues using our AI-powered assistant.
            Use the chat button at the bottom-right to start a conversation.
        </p>

        <!-- FEATURES -->
        <h2 class="text-xl font-semibold mt-8 mb-4">
            What can I help with?
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="border rounded-lg p-4 bg-gray-50">
                <h3 class="font-semibold mb-1">🔐 Password & Account</h3>
                <p class="text-sm text-gray-600">
                    Password reset, email login, account unlock.
                </p>
            </div>

            <div class="border rounded-lg p-4 bg-gray-50">
                <h3 class="font-semibold mb-1">💻 Software Access</h3>
                <p class="text-sm text-gray-600">
                    Install or request access to company software.
                </p>
            </div>

            <div class="border rounded-lg p-4 bg-gray-50">
                <h3 class="font-semibold mb-1">🌐 Network Issues</h3>
                <p class="text-sm text-gray-600">
                    Wi-Fi, VPN, and internet connectivity.
                </p>
            </div>

            <div class="border rounded-lg p-4 bg-gray-50">
                <h3 class="font-semibold mb-1">🖨️ Hardware Support</h3>
                <p class="text-sm text-gray-600">
                    PC, printer, and device troubleshooting.
                </p>
            </div>
        </div>

        <!-- HOW IT WORKS -->
        <h2 class="text-xl font-semibold mt-8 mb-4">
            How it works
        </h2>

        <ol class="list-decimal list-inside space-y-2 text-gray-700">
            <li>Click the chat icon at the bottom-right</li>
            <li>Select one of the provided options</li>
            <li>Follow the guided steps to resolve your issue</li>
        </ol>

        <!-- CONTACT -->
        <div class="mt-8 pt-4 border-t text-sm text-gray-600 flex flex-col sm:flex-row gap-6">
            <span>📧 it-support@company.com</span>
            <span>📞 Extension: 1234</span>
        </div>
    </div>
</div>

<!-- DIALOGFLOW CHATBOT -->
<df-messenger
    location="australia-southeast1"
    project-id={{ env('DIALOGFLOW_PROJECT_ID') }}
    agent-id="{{ env('DIALOGFLOW_AGENT_ID') }}"
    language-code="en"
    max-query-length="-1">

    <df-messenger-chat-bubble
        chat-title="AI-Chatbot-Helpdesk-Agent">
    </df-messenger-chat-bubble>

</df-messenger>

<!-- CHATBOT STYLING -->
<style>
    df-messenger {
        z-index: 999;
        position: fixed;
        bottom: 16px;
        right: 16px;

        --df-messenger-font-family: 'Instrument Sans', sans-serif;
        --df-messenger-font-color: #000;
        --df-messenger-chat-background: #f3f6fc;
        --df-messenger-message-user-background: #d3e3fd;
        --df-messenger-message-bot-background: #ffffff;
    }
</style>

</body>
</html>
