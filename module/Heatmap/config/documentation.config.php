<?php
return [
    'Heatmap\\V1\\Rest\\Hit\\Controller' => [
        'description' => 'Create, manipulate and retrieve customer hits on pages',
        'collection' => [
            'description' => 'Manipulate lists of customer accessed pages',
            'GET' => [
                'description' => 'Retrieve a paginated result of accessed links',
                'response' => '',
            ],
            'POST' => [
                'description' => 'Create new hit',
                'request' => '',
            ],
        ],
        'entity' => [
            'description' => 'Manipulate individual customer accessed pages',
            'GET' => [
                'description' => 'Retrieve a hit link',
            ],
            'PATCH' => [
                'description' => 'Update a hit link',
            ],
            'PUT' => [
                'description' => 'Replace a hit link',
            ],
            'DELETE' => [
                'description' => 'Delete a hit link',
            ],
        ],
    ],
];
