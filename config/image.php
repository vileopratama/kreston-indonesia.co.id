<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',
    'full_size'   => env('UPLOAD_FULL_SIZE', public_path('img/full_size/')),
    'icon_size'   => env('UPLOAD_ICON_SIZE', public_path('img/icon_size/')),

);
