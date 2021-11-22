<?php
return [
    'Heatmap\\V1\\Rest\\Hit\\LinkTypeCount\\Controller' => [
        'description' => 'Retrieve hits count grouped by link type, optionally filtered by a date interval',
        'collection' => [
            'GET' => [
                'response' => '{
   "_links": {
       "self": {
           "href": "/hit-link-type-count[/start-:start[/end-:end]]"
       },
       "first": {
           "href": "/hit-link-type-count[/start-:start[/end-:end]]?page={page}"
       },
       "prev": {
           "href": "/hit-link-type-count[/start-:start[/end-:end]]?page={page}"
       },
       "next": {
           "href": "/hit-link-type-count[/start-:start[/end-:end]]?page={page}"
       },
       "last": {
           "href": "/hit-link-type-count[/start-:start[/end-:end]]?page={page}"
       }
   }
   "_embedded": {
       "hit-link-type-count": [
           {
               "_links": {
                   "self": {
                       "href": "/hit-link-type-count[/start-:start[/end-:end]]"
                   }
               }
              "link_type": "The type of link a customer accessed. Can be one of the values: [\'product\', \'category\', \'static-page\', \'checkout\', \'homepage\']",
              "hits_count": "Number of hits the link type has"
           }
       ]
   }
}',
            ],
        ],
    ],
    'Heatmap\\V1\\Rest\\Hit\\Controller' => [
        'description' => 'Create, manipulate and retrieve customer hits on pages',
        'collection' => [
            'description' => 'Manipulate lists of customer accessed pages',
            'GET' => [
                'description' => 'Retrieve a paginated result of accessed links',
                'response' => '{
   "_links": {
       "self": {
           "href": "/hit"
       },
       "first": {
           "href": "/hit?page={page}"
       },
       "prev": {
           "href": "/hit?page={page}"
       },
       "next": {
           "href": "/hit?page={page}"
       },
       "last": {
           "href": "/hit?page={page}"
       }
   }
   "_embedded": {
       "hit": [
           {
               "_links": {
                   "self": {
                       "href": "/hit[/:hit_id]"
                   }
               }
              "link": "Accessed link url of max 500 length",
              "link_type": "Can be one of the values: [\'product\', \'category\', \'static-page\', \'checkout\', \'homepage\']",
              "id_customer": "Customer identifier",
              "accessed_at": "access timestamp (ISO format)"
           }
       ]
   }
}',
            ],
            'POST' => [
                'description' => 'Create new page access hit',
                'request' => '{
   "link": "Accessed link url of max 500 length",
   "link_type": "Can be one of the values: [\'product\', \'category\', \'static-page\', \'checkout\', \'homepage\']",
   "id_customer": "Customer identifier",
   "accessed_at": "access timestamp (ISO format)"
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/hit[/:hit_id]"
       }
   }
   "link": "Accessed link url of max 500 length",
   "link_type": "Can be one of the values: [\'product\', \'category\', \'static-page\', \'checkout\', \'homepage\']",
   "id_customer": "Customer identifier",
   "accessed_at": "access timestamp (ISO format)"
}',
            ],
        ],
        'entity' => [
            'description' => 'Manipulate individual customer accessed pages',
            'GET' => [
                'description' => 'Retrieve a hit link',
                'response' => '{
   "_links": {
       "self": {
           "href": "/hit[/:hit_id]"
       }
   }
   "link": "Accessed link url of max 500 length",
   "link_type": "Can be one of the values: [\'product\', \'category\', \'static-page\', \'checkout\', \'homepage\']",
   "id_customer": "Customer identifier",
   "accessed_at": "access timestamp (ISO format)"
}',
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
    'Heatmap\\V1\\Rest\\Hit\\LinkCount\\Controller' => [
        'description' => 'Retrieve hits count grouped by link, optionally filtered by a date interval',
        'entity' => [
            'description' => 'Link hits count',
        ],
        'collection' => [
            'description' => 'Links hits count',
            'GET' => [
                'response' => '{
   "_links": {
       "self": {
           "href": "/hit-link-count[/start-:start[/end-:end]]"
       },
       "first": {
           "href": "/hit-link-count[/start-:start[/end-:end]]?page={page}"
       },
       "prev": {
           "href": "/hit-link-count[/start-:start[/end-:end]]?page={page}"
       },
       "next": {
           "href": "/hit-link-count[/start-:start[/end-:end]]?page={page}"
       },
       "last": {
           "href": "/hit-link-count[/start-:start[/end-:end]]?page={page}"
       }
   }
   "_embedded": {
       "hit-link-count": [
           {
               "_links": {
                   "self": {
                       "href": "/hit-link-count[/start-:start[/end-:end]]"
                   }
               }
              "link": "link accessed by customer",
              "hits_count": "Number of hits the link has"
           }
       ]
   }
}',
            ],
        ],
    ],
    'Heatmap\\V1\\Rest\\Hit\\CustomerSameJourney\\Controller' => [
        'description' => 'Same journey as a customer, list of customers who accessed the same list of links one customer accessed',
        'collection' => [
            'GET' => [
                'response' => '{
   "_links": {
       "self": {
           "href": "/customer-same-journey/:customer_id"
       },
       "first": {
           "href": "/customer-same-journey/:customer_id?page={page}"
       },
       "prev": {
           "href": "/customer-same-journey/:customer_id?page={page}"
       },
       "next": {
           "href": "/customer-same-journey/:customer_id?page={page}"
       },
       "last": {
           "href": "/customer-same-journey/:customer_id?page={page}"
       }
   }
   "_embedded": {
       "customer-journey-customers": [
           {
               "_links": {
                   "self": {
                       "href": "/customer-same-journey/:customer_id"
                   }
               }
              "id_customer": "Customer identifier"
           }
       ]
   }
}',
            ],
        ],
    ],
    'Heatmap\\V1\\Rest\\Hit\\CustomerJourney\\Controller' => [
        'description' => 'Customer journey, list of links the customer accessed',
        'collection' => [
            'GET' => [
                'response' => '{
   "_links": {
       "self": {
           "href": "/customer-journey/:customer_id"
       },
       "first": {
           "href": "/customer-journey/:customer_id?page={page}"
       },
       "prev": {
           "href": "/customer-journey/:customer_id?page={page}"
       },
       "next": {
           "href": "/customer-journey/:customer_id?page={page}"
       },
       "last": {
           "href": "/customer-journey/:customer_id?page={page}"
       }
   }
   "_embedded": {
       "customer-journey-link": [
           {
               "_links": {
                   "self": {
                       "href": "/customer-journey/:customer_id"
                   }
               }
              "link": "link accessed by customer"
           }
       ]
   }
}',
            ],
        ],
    ],
];
