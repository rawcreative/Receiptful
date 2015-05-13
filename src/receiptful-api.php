<?php
return [
	'baseUrl' => 'https://app.receiptful.com/api/',
	'name' => 'Receiptful',
	'apiVersion' => 1,
	'operations' => [
		'receipts' => [
			'httpMethod' => 'GET',
            'uri' => '/v{api_version}/receipts',
            'responseModel' => 'getResponse',
            'parameters' => [
               'api_version' => [
                   'required' => true,
                   'type'     => 'string',
                   'location' => 'uri',
               ],
           ]
		],
		'receipt' => [
			'httpMethod' => 'GET',
            'uri' => '/v{api_version}/receipt/{receipt_id}',
            'responseModel' => 'getResponse',
            'parameters' => [
               'api_version' => [
                   'required' => true,
                   'type'     => 'string',
                   'location' => 'uri',
               ],
               'receipt_id' => [
                    'location' => 'uri',
                    'type' => 'string'
                ]
           ]
		],
		'coupons' => [
			'httpMethod' => 'GET',
            'uri' => '/v{api_version}/coupons',
            'responseModel' => 'getResponse',
            'parameters' => [
               'api_version' => [
                   'required' => true,
                   'type'     => 'string',
                   'location' => 'uri',
               ],
           ]
		],
		'products' => [],
		'users' => []
	],
	 'models' => [
        'getResponse' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json'
            ]
        ]
    ]
];