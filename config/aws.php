<?php


return [
    'credentials' => [
        'key'    => env('AWS_KEY', 'Laravel'),
        'secret' => env('AWS_SECRET', 'Laravel'),
    ],
    'region' => env('AWS_REGION', 'Laravel'),
    'version' => 'latest',

    // You can override settings for specific services
    'Ses' => [
        'region' => env('AWS_REGION', 'Laravel'),
    ],
];
