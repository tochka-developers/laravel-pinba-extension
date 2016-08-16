<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Pinba settings
     |--------------------------------------------------------------------------
     |
     | Pinba is enabled by default, when debug is set to true in app.php.
     | You can override the value by setting enable to true or false instead of null.
     |
     */
    'enabled' => env('pinba.enabled', null),
    /*
     |--------------------------------------------------------------------------
     | Pinba server address
     |--------------------------------------------------------------------------
     |
     | This is hostname:port string for pinba UDP packets
     |
     */
    'server' => env('pinba.server', '127.0.0.1:30002'),
];
