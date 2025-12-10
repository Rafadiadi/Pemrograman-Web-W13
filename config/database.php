<?php

return [
    'default' => env('DB_CONNECTION', 'sqlite'),
    
    'migrations' => 'migrations',
    
    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'database' => database_path('database.sqlite'),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],
        
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'ecommerce_db'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', '/tmp/mysql.sock'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
    ],
];
