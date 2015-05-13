<?php
return [
    'baseUrl' => 'https://app.receiptful.com/',
    'name' => 'Receiptful',
    'apiVersion' => 1,
    'operations' => [
        'receipts' => [
            'httpMethod' => 'GET',
            'uri' => '/api/v{api_version}/receipts',
            'responseModel' => 'getResponse',
            'parameters' => [
                'api_version' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
            ],
        ],
        'receipt' => [
            'httpMethod' => 'GET',
            'uri' => '/api/v{api_version}/receipts/{receipt_id}',
            'responseModel' => 'getResponse',
            'parameters' => [
                'api_version' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
                'receipt_id' => [
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
            ],
        ],

        'sendReceipt' => [
            'httpMethod' => 'POST',
            'uri' => '/api/v{api_version}/receipts',
            'responseModel' => 'getResponse',
            'parameters' => [
                'api_version' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
                'reference' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'currency' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'amount' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'amountNotes' => [
                    'location' => 'json',
                    'type' => 'string',
                ],
                'to' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'from' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'date' => [
                    'location' => 'json',
                    'type' => 'string',
                ],
                'payment' => [
                    'location' => 'json',
                    'type' => 'object',
                ],
                'items' => [
                    'location' => 'json',
                    'type' => 'array',
                    'required' => true,
                ],
                'subtotals' => [
                    'location' => 'json',
                    'type' => 'array',
                ],
                'billing' => [
                    'location' => 'json',
                    'type' => 'object',
                ],
                'shipping' => [
                    'location' => 'json',
                    'type' => 'object',
                ],
                'upsell' => [
                    'location' => 'json',
                    'type' => 'object',
                ],
                'customerIp' => [
                    'location' => 'json',
                    'type' => 'string',
                ],
                'notes' => [
                    'location' => 'json',
                    'type' => 'string',
                ],
                'coupons' => [
                    'location' => 'json',
                    'type' => 'array',
                ],

            ],
        ],

        'resendReceipt' => [
            'httpMethod' => 'POST',
            'uri' => '/api/v{api_version}/receipts/{receipt_id}/send',
            'responseModel' => 'getResponse',
            'parameters' => [
                'api_version' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
                'receipt_id' => [
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
            ],
        ],

        'coupons' => [
            'httpMethod' => 'GET',
            'uri' => '/api/v{api_version}/coupons',
            'responseModel' => 'getResponse',
            'parameters' => [
                'api_version' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
            ],
        ],

        'coupon' => [
            'httpMethod' => 'GET',
            'uri' => '/api/v{api_version}/coupons/{coupon_id}',
            'responseModel' => 'getResponse',
            'parameters' => [
                'api_version' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
                'coupon_id' => [
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
            ],
        ],

        'deleteCoupon' => [
            'httpMethod' => 'DELETE',
            'uri' => '/api/v{api_version}/coupons/{coupon_id}',
            'responseModel' => 'getResponse',
            'parameters' => [
                'api_version' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
                'coupon_id' => [
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
            ],
        ],

        'useCoupon' => [
            'httpMethod' => 'PUT',
            'uri' => '/api/v{api_version}/coupons/{coupon_id}/use',
            'responseModel' => 'getResponse',
            'summary' => 'Mark a coupon as used.',
            'parameters' => [
                'api_version' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
                'coupon_id' => [
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ],
                'reference' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
                'amount' => [
                    'location' => 'json',
                    'type' => 'numeric',
                    'required' => true,
                ],
                'currency' => [
                    'location' => 'json',
                    'type' => 'string',
                    'required' => true,
                ],
            ],
        ],

        'products' => [],

        'currentUser' => [
            'httpMethod' => 'GET',
            'uri' => '/api/v{api_version}/users/current',
            'responseModel' => 'getResponse',
            'summary' => 'Retrieve current API user info.',
            'parameters' => [
                'api_version' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
            ],
        ],
    ],
    'models' => [
        'getResponse' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
        ],
    ],
];
