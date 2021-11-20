<?php

declare(strict_types=1);

namespace Heatmap;

use Laminas\ApiTools\DbConnectedResourceAbstractFactory;

return [
    'service_manager' => [
        'aliases' => [
        ],
        'factories' => [
            V1\Rest\Hit\HitResource::class => DbConnectedResourceAbstractFactory::class,
            V1\Db\TableGateway\HitTableGateway::class => V1\Db\TableGateway\HitTableGatewayFactory::class,
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
            'listener' => V1\Rest\Hit\HitResource::class,
//            'listener' => \Heatmap\V1\Rest\Hit\HitResource::class,
            'route_name' => 'heatmap.rest.hit',
            'route_identifier_name' => 'hit_id',
            'collection_name' => 'hit',
            'entity_http_methods' => ['GET', 'PATCH', 'PUT', 'DELETE',],
            'collection_http_methods' => ['GET', 'POST',],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => V1\Rest\Hit\HitEntity::class,
            'collection_class' => V1\Rest\Hit\HitCollection::class,
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
            V1\Rest\Hit\HitEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'heatmap.rest.hit',
                'route_identifier_name' => 'hit_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            V1\Rest\Hit\HitCollection::class => [
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
                'required' => false,
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\Date::class,
                        'options' => [
                            'format' => DATE_RFC3339,
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\DateTimeFormatter::class,
                        'options' => [
                            'format' => DATE_RFC3339
                        ],
                    ],
                ],
                'name' => 'accessed_at',
                'description' => 'access timestamp',
            ],
        ],
    ],
    'api-tools-mvc-auth' => [
        'authorization' => [
            'Heatmap\\V1\\Rest\\Hit\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
    'api-tools' => [
        'db-connected' => [
            V1\Rest\Hit\HitResource::class => [
                'adapter_name' => 'DbAdapter',
                'table_name' => 'hits',
                'hydrator_name' => \Laminas\Hydrator\ArraySerializableHydrator::class,
                'controller_service_name' => 'Heatmap\\V1\\Rest\\Hit\\Controller',
                'entity_identifier_name' => 'id',
                'resource_class' => V1\Rest\Hit\HitResource::class,
//                'table_service' => 'Heatmap\\V1\\Rest\\Hit\\HitResource\\Table',
                'table_service' => V1\Db\TableGateway\HitTableGateway::class,
            ],
        ],
    ],
];
