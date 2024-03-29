<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
   
    'supportsCredentials' => false,
    'allowedOrigins' => ['http://localhost:8080', 'http://localhost:8080/'],
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => ['content-type', 'Authorization'],
    'allowedMethods' => ['GET', 'POST'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
