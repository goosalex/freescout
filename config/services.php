<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'laravelpassport' => [
        'client_id' => env('OAUTH2_KEY'),
        'client_secret' => env('OAUTH2_SECRET'),
        'redirect' => env('OAUTH2_REDIRECT_URI'),
        'host' => env('OAUTH2_HOST'),
        'authorize_uri' => env('OAUTH2_AUTHORIZE_URI'),
        'token_uri' => env('OAUTH2_TOKEN_URI'),
        'userinfo_uri' => env('OAUTH2_USERINFO_URI'),
        'userinfo_key' => env('OAUTH2_USERINFO_KEY'),
        'user_id'   => env('OAUTH2_USER_ID'),
        'user_name'   => env('OAUTH2_USER_NAME'),
        'user_nickname'   => env('OAUTH2_USER_NICKNAME'),
        'user_email'   => env('OAUTH2_USER_EMAIL'),
        'user_avatar'   => env('OAUTH2_USER_AVATAR')
    ],
];
