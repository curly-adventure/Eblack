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
    'google' => [
        'client_id' => '1000003890082-el0k1pue5v7r1d655rar78ufq82tf3ri.apps.googleusercontent.com',
        'client_secret' => 'Yc8hvhxSC0zbwDY1a_WeAMnM',
        'redirect' => 'http://4155d62251b7.ngrok.io/callback/google',
      ],
      'facebook' => [
        'client_id' => '688423352003130',
        'client_secret' => '9de3de152549fd914bda293045b21104',
        'redirect' => 'https://4155d62251b7.ngrok.io/callback/facebook',
      ],
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

];
