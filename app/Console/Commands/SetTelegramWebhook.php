<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SetTelegramWebhook extends Command
{
    protected $signature = 'telegram:set-webhook';
    protected $description = 'Set webhook for Telegram bot';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $token = config('telegraph.token');
        $webhookUrl = config('telegraph.webhook.url');

        // Убедитесь, что URL вебхука корректен и доступен
        $this->info("Setting webhook to: {$webhookUrl}");

        $response = Http::post("https://api.telegram.org/bot{$token}/setWebhook", [
            'url' => $webhookUrl,
        ]);

        if ($response->successful()) {
            $this->info('Webhook set successfully.');
        } else {
            $this->error('Failed to set webhook. Response: ' . $response->body());
        }
        Log::info("Webhook set successfully.");
        Log::info($response->body());
    }
}
