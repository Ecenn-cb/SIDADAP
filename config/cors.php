<?php

return [

    /*
    | Laravel CORS Options
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | The options here determine the allowed HTTP requests for this application.
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false, // Ubah ke true jika Anda menggunakan autentikasi cookie/session (Sanctum)

];