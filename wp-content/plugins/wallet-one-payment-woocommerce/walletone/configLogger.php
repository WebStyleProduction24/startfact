<?php
$path = dirname(str_replace('\\', '/', __DIR__)).'/../';

return [
  'rootLogger' => [
    'appenders' => ['default'],
  ],
  'appenders' => [
    'default' => [
      'class' => 'LoggerAppenderFile',
      'layout' => [
        'class' => 'LoggerLayoutPattern',
        'conversionPattern' => '%date [%logger] %message%newline'
      ],
      'params' => [
        'file' => $path . 'log/w1PaymentSystem.log',
        'append' => true
      ]
    ]
  ]
];

