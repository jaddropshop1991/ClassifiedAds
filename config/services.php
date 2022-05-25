<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook'=> [
        'client_id'=>'587396752525682',
        'client_secret'=>'61fe2c15ff77038f4dcbabff8d792140',
        'redirect'=>'http://localhost:8000/auth/facebook/callback'
    ]

    // 'facebook' => [
    //     'client_id' => '3402853389825442',
    //     'client_secret' => '079c9e6622fa14ad7b8a7d1496a3a490',
    //     'redirect' => 'http://localhost:8000/auth/facebook/callback',
    // ],

];
