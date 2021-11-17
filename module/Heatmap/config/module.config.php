<?php

declare(strict_types=1);

namespace Heatmap;

return [
    'service_manager' => [
        'aliases' => [
        ],
        'factories' => [
            \Heatmap\V1\Rest\Hit\HitResource::class => \Heatmap\V1\Rest\Hit\HitResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'heatmap.rest.hit' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/hit[/:hit_id]',
                    'defaults' => [
                        'controller' => 'Heatmap\\V1\\Rest\\Hit\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'heatmap.rest.hit',
        ],
    ],
    'api-tools-rest' => [
        'Heatmap\\V1\\Rest\\Hit\\Controller' => [
            'listener' => \Heatmap\V1\Rest\Hit\HitResource::class,
            'route_name' => 'heatmap.rest.hit',
            'route_identifier_name' => 'hit_id',
            'collection_name' => 'hit',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Heatmap\V1\Rest\Hit\HitEntity::class,
            'collection_class' => \Heatmap\V1\Rest\Hit\HitCollection::class,
            'service_name' => 'Hit',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'Heatmap\\V1\\Rest\\Hit\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Heatmap\\V1\\Rest\\Hit\\Controller' => [
                0 => 'application/vnd.heatmap.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Heatmap\\V1\\Rest\\Hit\\Controller' => [
                0 => 'application/vnd.heatmap.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            \Heatmap\V1\Rest\Hit\HitEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'heatmap.rest.hit',
                'route_identifier_name' => 'hit_id',
                'hydrator' => \Laminas\Hydrator\ObjectPropertyHydrator::class,
            ],
            \Heatmap\V1\Rest\Hit\HitCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'heatmap.rest.hit',
                'route_identifier_name' => 'hit_id',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools-content-validation' => [
        'Heatmap\\V1\\Rest\\Hit\\Controller' => [
            'input_filter' => 'Heatmap\\V1\\Rest\\Hit\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Heatmap\\V1\\Rest\\Hit\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\Uri::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'max' => '500',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'link',
                'description' => 'Accessed link url of max 500 length',
                'field_type' => 'string',
            ],
            1 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\InArray::class,
                        'options' => [
                            'haystack' => ['product', 'category', 'static-page', 'checkout', 'homepage'],
                            'messages' => [
                                \Laminas\Validator\InArray::NOT_IN_ARRAY =>
                                    'Field value can only be one of the values: [\'product\', \'category\', \'static-page\', \'checkout\', \'homepage\']',
                            ],
                        ],
                    ],
                ],
                'filters' => [],
                'name' => 'link_type',
                'description' => 'Can be one of the values: [\'product\', \'category\', \'static-page\', \'checkout\', \'homepage\']',
                'field_type' => 'enum',
            ],
            2 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'id_customer',
                'description' => 'Customer identifier',
                'field_type' => 'int',
            ],
            3 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\Digits::class,
                        'options' => [],
                    ],
                ],
                'filters' => [],
                'name' => 'timestamp',
                'description' => 'access timestamp',
            ],
        ],
    ],
    'api-tools-mvc-auth' => [
        'authorization' => [
            'Heatmap\\V1\\Rest\\Hit\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false, //true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false, //true,
                    'PATCH' => false, //true,
                    'DELETE' => false, //true,
                ],
            ],
        ],
    ],
];
