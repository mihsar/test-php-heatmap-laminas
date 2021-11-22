<?php

declare(strict_types=1);

namespace Heatmap;

return [
    'service_manager' => [
        'factories' => [
            \Heatmap\V1\Db\TableGateway\HitTableGateway::class => \Heatmap\V1\Db\TableGateway\HitTableGatewayFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'heatmap.rest.hit' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/hit[/:hit_id]',
                    'constraints' => [
                        'hit_id' => '\\d+',
                    ],
                    'defaults' => [
                        'controller' => 'Heatmap\\V1\\Rest\\Hit\\Controller',
                    ],
                ],
            ],
            'heatmap.rest.hit-link-count' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/hit-link-count[/start-:start[/end-:end]]',
                    'constraints' => [
                        'start' => '\\d{4}-\\d{2}-\\d{2}',
                        'end' => '\\d{4}-\\d{2}-\\d{2}',
                    ],
                    'defaults' => [
                        'controller' => 'Heatmap\\V1\\Rest\\Hit\\LinkCount\\Controller',
                    ],
                ],
            ],
            'heatmap.rest.hit-link-type-count' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/hit-link-type-count[/start-:start[/end-:end]]',
                    'constraints' => [
                        'start' => '\\d{4}-\\d{2}-\\d{2}',
                        'end' => '\\d{4}-\\d{2}-\\d{2}',
                    ],
                    'defaults' => [
                        'controller' => 'Heatmap\\V1\\Rest\\Hit\\LinkTypeCount\\Controller',
                    ],
                ],
            ],
            'heatmap.rest.customer-journey' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/customer-journey/:customer_id',
                    'constraints' => [
                        'customer_id' => '\\d+',
                    ],
                    'defaults' => [
                        'controller' => 'Heatmap\\V1\\Rest\\Hit\\CustomerJourney\\Controller',
                    ],
                ],
            ],
            'heatmap.rest.customer-same-journey' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/customer-same-journey/:customer_id',
                    'constraints' => [
                        'customer_id' => '\\d+',
                    ],
                    'defaults' => [
                        'controller' => 'Heatmap\\V1\\Rest\\Hit\\CustomerSameJourney\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'heatmap.rest.hit',
            1 => 'heatmap.rest.hit-link-count',
            2 => 'heatmap.rest.hit-link-type-count',
            3 => 'heatmap.rest.customer-journey',
            4 => 'heatmap.rest.customer-same-journey',
        ],
    ],
    'api-tools-rest' => [
        'Heatmap\\V1\\Rest\\Hit\\Controller' => [
            'listener' => \Heatmap\V1\Rest\Hit\Resource::class,
            'route_name' => 'heatmap.rest.hit',
            'route_identifier_name' => 'hit_id',
            'collection_name' => 'hit',
            'entity_http_methods' => [
                0 => 'GET',
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
        'Heatmap\\V1\\Rest\\Hit\\LinkCount\\Controller' => [
            'listener' => \Heatmap\V1\Rest\Hit\LinkCount\Resource::class,
            'route_name' => 'heatmap.rest.hit-link-count',
            'route_identifier_name' => '',
            'collection_name' => 'hit-link-count',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Heatmap\V1\Rest\Hit\LinkCount\LinkCountEntity::class,
            'collection_class' => \Heatmap\V1\Rest\Hit\LinkCount\LinkCountCollection::class,
            'service_name' => 'LinkCount',
        ],
        'Heatmap\\V1\\Rest\\Hit\\LinkTypeCount\\Controller' => [
            'listener' => \Heatmap\V1\Rest\Hit\LinkTypeCount\Resource::class,
            'route_name' => 'heatmap.rest.hit-link-type-count',
            'route_identifier_name' => '',
            'collection_name' => 'hit-link-type-count',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Heatmap\V1\Rest\Hit\LinkTypeCount\LinkTypeCountEntity::class,
            'collection_class' => \Heatmap\V1\Rest\Hit\LinkTypeCount\LinkTypeCountCollection::class,
            'service_name' => 'LinkTypeCount',
        ],
        'Heatmap\\V1\\Rest\\Hit\\CustomerJourney\\Controller' => [
            'listener' => \Heatmap\V1\Rest\Hit\CustomerJourney\Resource::class,
            'route_name' => 'heatmap.rest.customer-journey',
            'route_identifier_name' => '',
            'collection_name' => 'link',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Heatmap\V1\Rest\Hit\CustomerJourney\LinkEntity::class,
            'collection_class' => \Heatmap\V1\Rest\Hit\CustomerJourney\LinkCollection::class,
            'service_name' => 'CustomerJourney',
        ],
        'Heatmap\\V1\\Rest\\Hit\\CustomerSameJourney\\Controller' => [
            'listener' => \Heatmap\V1\Rest\Hit\CustomerSameJourney\Resource::class,
            'route_name' => 'heatmap.rest.customer-same-journey',
            'route_identifier_name' => '',
            'collection_name' => 'customer',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Heatmap\V1\Rest\Hit\CustomerSameJourney\CustomerEntity::class,
            'collection_class' => \Heatmap\V1\Rest\Hit\CustomerSameJourney\CustomerCollection::class,
            'service_name' => 'CustomerSameJourney',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'Heatmap\\V1\\Rest\\Hit\\Controller' => 'HalJson',
            'Heatmap\\V1\\Rest\\Hit\\LinkCount\\Controller' => 'HalJson',
            'Heatmap\\V1\\Rest\\Hit\\LinkTypeCount\\Controller' => 'HalJson',
            'Heatmap\\V1\\Rest\\Hit\\CustomerJourney\\Controller' => 'HalJson',
            'Heatmap\\V1\\Rest\\Hit\\CustomerSameJourney\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Heatmap\\V1\\Rest\\Hit\\Controller' => [
                0 => 'application/vnd.heatmap.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Heatmap\\V1\\Rest\\Hit\\LinkCount\\Controller' => [
                0 => 'application/vnd.heatmap.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Heatmap\\V1\\Rest\\Hit\\LinkTypeCount\\Controller' => [
                0 => 'application/vnd.heatmap.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Heatmap\\V1\\Rest\\Hit\\CustomerJourney\\Controller' => [
                0 => 'application/vnd.heatmap.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Heatmap\\V1\\Rest\\Hit\\CustomerSameJourney\\Controller' => [
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
            'Heatmap\\V1\\Rest\\Hit\\LinkCount\\Controller' => [
                0 => 'application/vnd.heatmap.v1+json',
                1 => 'application/json',
            ],
            'Heatmap\\V1\\Rest\\Hit\\LinkTypeCount\\Controller' => [
                0 => 'application/vnd.heatmap.v1+json',
                1 => 'application/json',
            ],
            'Heatmap\\V1\\Rest\\Hit\\CustomerJourney\\Controller' => [
                0 => 'application/vnd.heatmap.v1+json',
                1 => 'application/json',
            ],
            'Heatmap\\V1\\Rest\\Hit\\CustomerSameJourney\\Controller' => [
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
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Heatmap\V1\Rest\Hit\HitCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'heatmap.rest.hit',
                'route_identifier_name' => 'hit_id',
                'is_collection' => true,
            ],
            \Heatmap\V1\Rest\Hit\LinkCount\LinkCountEntity::class => [
                'entity_identifier_name' => 'link',
                'route_name' => 'heatmap.rest.hit-link-count',
                'route_identifier_name' => 'link',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Heatmap\V1\Rest\Hit\LinkCount\LinkCountCollection::class => [
                'entity_identifier_name' => 'link',
                'route_name' => 'heatmap.rest.hit-link-count',
                'route_identifier_name' => 'link',
                'is_collection' => true,
            ],
            \Heatmap\V1\Rest\Hit\LinkTypeCount\LinkTypeCountEntity::class => [
                'entity_identifier_name' => 'link_type',
                'route_name' => 'heatmap.rest.hit-link-type-count',
                'route_identifier_name' => '',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Heatmap\V1\Rest\Hit\LinkTypeCount\LinkTypeCountCollection::class => [
                'entity_identifier_name' => 'link_type',
                'route_name' => 'heatmap.rest.hit-link-type-count',
                'route_identifier_name' => '',
                'is_collection' => true,
            ],
            \Heatmap\V1\Rest\Hit\CustomerJourney\LinkEntity::class => [
                'entity_identifier_name' => 'link',
                'route_name' => 'heatmap.rest.customer-journey',
                'route_identifier_name' => '',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Heatmap\V1\Rest\Hit\CustomerJourney\LinkCollection::class => [
                'entity_identifier_name' => 'link',
                'route_name' => 'heatmap.rest.customer-journey',
                'route_identifier_name' => '',
                'is_collection' => true,
            ],
            \Heatmap\V1\Rest\Hit\CustomerSameJourney\CustomerEntity::class => [
                'entity_identifier_name' => 'id_customer',
                'route_name' => 'heatmap.rest.customer-same-journey',
                'route_identifier_name' => '',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Heatmap\V1\Rest\Hit\CustomerSameJourney\CustomerCollection::class => [
                'entity_identifier_name' => 'id_customer',
                'route_name' => 'heatmap.rest.customer-same-journey',
                'route_identifier_name' => '',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools-content-validation' => [
        'Heatmap\\V1\\Rest\\Hit\\Controller' => [
            'input_filter' => 'Heatmap\\V1\\Rest\\Hit\\Validator',
        ],
        'Heatmap\\V1\\Rest\\Hit\\LinkCount\\Controller' => [
            'input_filter' => 'Heatmap\\V1\\Rest\\Hit\\LinkCount\\Validator',
        ],
        'Heatmap\\V1\\Rest\\Hit\\LinkTypeCount\\Controller' => [
            'input_filter' => 'Heatmap\\V1\\Rest\\Hit\\LinkTypeCount\\Validator',
        ],
        'Heatmap\\V1\\Rest\\Hit\\CustomerJourney\\Controller' => [
            'input_filter' => 'Heatmap\\V1\\Rest\\Hit\\CustomerJourney\\Validator',
        ],
        'Heatmap\\V1\\Rest\\Hit\\CustomerSameJourney\\Controller' => [
            'input_filter' => 'Heatmap\\V1\\Rest\\Hit\\CustomerSameJourney\\Validator',
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
                            'haystack' => [
                                0 => 'product',
                                1 => 'category',
                                2 => 'static-page',
                                3 => 'checkout',
                                4 => 'homepage',
                            ],
                            'messages' => [
                                'notInArray' => 'Field value can only be one of the values: [\'product\', \'category\', \'static-page\', \'checkout\', \'homepage\']',
                            ],
                        ],
                    ],
                ],
                'filters' => [],
                'name' => 'link_type',
                'description' => 'Can be one of the values: [\'product\', \'category\', \'static-page\', \'checkout\', \'homepage\']',
                'field_type' => 'string',
            ],
            2 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\Digits::class,
                        'options' => [],
                    ],
                ],
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
                            'format' => 'Y-m-d\\TH:i:sP',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\DateTimeFormatter::class,
                        'options' => [
                            'format' => 'Y-m-d\\TH:i:sP',
                        ],
                    ],
                ],
                'name' => 'accessed_at',
                'description' => 'access timestamp (ISO format)',
                'field_type' => \DateTime::class,
            ],
        ],
        'Heatmap\\V1\\Rest\\Hit\\LinkCount\\Validator' => [
            0 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'link',
                'field_type' => 'string',
                'description' => 'link accessed by customer',
            ],
            1 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'hits_count',
                'field_type' => 'int',
                'description' => 'Number of hits the link has',
            ],
        ],
        'Heatmap\\V1\\Rest\\Hit\\LinkTypeCount\\Validator' => [
            0 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'link_type',
                'description' => 'The type of link a customer accessed. Can be one of the values: [\'product\', \'category\', \'static-page\', \'checkout\', \'homepage\']',
                'field_type' => 'string',
            ],
            1 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'hits_count',
                'description' => 'Number of hits the link type has',
                'field_type' => 'int',
            ],
        ],
        'Heatmap\\V1\\Rest\\Hit\\CustomerJourney\\Validator' => [
            0 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'link',
                'field_type' => 'string',
                'description' => 'link accessed by customer',
            ],
        ],
        'Heatmap\\V1\\Rest\\Hit\\CustomerSameJourney\\Validator' => [
            0 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'id_customer',
                'description' => 'Customer identifier',
                'field_type' => 'int',
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
            'Heatmap\\V1\\Rest\\Hit\\LinkCount\\Controller' => [],
            'Heatmap\\V1\\Rest\\Hit\\LinkTypeCount\\Controller' => [],
            'Heatmap\\V1\\Rest\\Hit\\CustomerJourney\\Controller' => [],
            'Heatmap\\V1\\Rest\\Hit\\CustomerSameJourney\\Controller' => [],
        ],
    ],
    'api-tools' => [
        'db-connected' => [
            \Heatmap\V1\Rest\Hit\Resource::class => [
                'adapter_name' => 'DbAdapter',
                'table_name' => 'hits',
                'hydrator_name' => \Laminas\Hydrator\ArraySerializableHydrator::class,
                'controller_service_name' => 'Heatmap\\V1\\Rest\\Hit\\Controller',
                'entity_identifier_name' => 'id',
                'resource_class' => \Heatmap\V1\Rest\Hit\Resource::class,
                'table_service' => \Heatmap\V1\Db\TableGateway\HitTableGateway::class,
            ],
            \Heatmap\V1\Rest\Hit\LinkCount\Resource::class => [
                'adapter_name' => 'DbAdapter',
                'table_name' => 'hits',
                'hydrator_name' => \Laminas\Hydrator\ArraySerializableHydrator::class,
                'controller_service_name' => 'Heatmap\\V1\\Rest\\Hit\\LinkCount\\Controller',
                'entity_identifier_name' => 'link',
                'resource_class' => \Heatmap\V1\Rest\Hit\LinkCount\Resource::class,
                'table_service' => \Heatmap\V1\Db\TableGateway\HitTableGateway::class,
            ],
            \Heatmap\V1\Rest\Hit\LinkTypeCount\Resource::class => [
                'adapter_name' => 'DbAdapter',
                'table_name' => 'hits',
                'hydrator_name' => \Laminas\Hydrator\ArraySerializableHydrator::class,
                'controller_service_name' => 'Heatmap\\V1\\Rest\\Hit\\LinkTypeCount\\Controller',
                'entity_identifier_name' => 'link',
                'resource_class' => \Heatmap\V1\Rest\Hit\LinkTypeCount\Resource::class,
                'table_service' => \Heatmap\V1\Db\TableGateway\HitTableGateway::class,
            ],
            \Heatmap\V1\Rest\Hit\CustomerJourney\Resource::class => [
                'adapter_name' => 'DbAdapter',
                'table_name' => 'hits',
                'hydrator_name' => \Laminas\Hydrator\ArraySerializableHydrator::class,
                'controller_service_name' => 'Heatmap\\V1\\Rest\\Hit\\CustomerJourney\\Controller',
                'entity_identifier_name' => 'link',
                'resource_class' => \Heatmap\V1\Rest\Hit\CustomerJourney\Resource::class,
                'table_service' => \Heatmap\V1\Db\TableGateway\HitTableGateway::class,
            ],
            \Heatmap\V1\Rest\Hit\CustomerSameJourney\Resource::class => [
                'adapter_name' => 'DbAdapter',
                'table_name' => 'hits',
                'hydrator_name' => \Laminas\Hydrator\ArraySerializableHydrator::class,
                'controller_service_name' => 'Heatmap\\V1\\Rest\\Hit\\CustomerSameJourney\\Controller',
                'entity_identifier_name' => 'id_customer',
                'resource_class' => \Heatmap\V1\Rest\Hit\CustomerSameJourney\Resource::class,
                'table_service' => \Heatmap\V1\Db\TableGateway\HitTableGateway::class,
            ],
        ],
    ],
];
