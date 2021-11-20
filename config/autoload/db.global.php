<?php

declare(strict_types=1);

return [
    'service_manager' => [
        'factories' => [
            'DbAdapter' => \Laminas\Db\Adapter\AdapterAbstractServiceFactory::class,
        ],
    ],
    'db' => [
        'adapters' => [
            'DbAdapter' => [
                'database' => 'laminas-db',
                'driver' => 'PDO_Mysql',
                'hostname' => 'db',
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'driver_options' => [
                    // Turn off persistent connections
                    PDO::ATTR_PERSISTENT => false,
                    // Enable exceptions
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    // Emulate prepared statements
                    PDO::ATTR_EMULATE_PREPARES => true,
                    // Set default fetch mode to array
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    // Set character set
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
                ],
            ],
        ],
    ],
];
