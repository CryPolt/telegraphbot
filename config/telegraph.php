<?php

use DefStudio\Telegraph\Telegraph;

return [
    'token' => env('TELEGRAPH_BOT_TOKEN'),
    'telegram_api_url' => 'https://api.telegram.org/',

    'default_parse_mode' => Telegraph::PARSE_HTML,

    'webhook' => [
        'url' => '/api/telegram/webhook',
        'handler' => DefStudio\Telegraph\Handlers\EmptyWebhookHandler::class,
        'middleware' => [],
        'report_unknown_commands' => true,
        'debug' => false,
    ],

    'http_timeout' => 30,

    'security' => [
        'allow_callback_queries_from_unknown_chats' => false,
        'allow_messages_from_unknown_chats' => false,
        'store_unknown_chats_in_db' => false,
    ],

    'models' => [
        'bot' => DefStudio\Telegraph\Models\TelegraphBot::class,
        'chat' => DefStudio\Telegraph\Models\TelegraphChat::class,
    ],

    'storage' => [
        'default' => 'file',
        'stores' => [
            'file' => [
                'driver' => \DefStudio\Telegraph\Storage\FileStorageDriver::class,
                'disk' => 'local',
                'root' => 'telegraph',
            ],
            'cache' => [
                'driver' => \DefStudio\Telegraph\Storage\CacheStorageDriver::class,
                'store' => null,
                'key_prefix' => 'tgph',
            ],
        ],
    ],

    'attachments' => [
        'thumbnail' => [
            'max_size_kb' => 200,
            'max_height_px' => 320,
            'max_width_px' => 320,
            'allowed_ext' => ['jpg'],
        ],
        'photo' => [
            'max_size_mb' => 10,
            'max_ratio' => 20,
            'height_width_sum_px' => 10000,
        ],
        'animation' => [
            'max_size_mb' => 50,
        ],
        'video' => [
            'max_size_mb' => 50,
        ],
        'audio' => [
            'max_size_mb' => 50,
        ],
        'document' => [
            'max_size_mb' => 50,
        ],
        'sticker' => [
            'max_size_mb' => 50,
        ],
    ],
];
