<?php

return [
  'paymentUrl' => 'https://wl.walletone.com/checkout/checkout/Index',
  'settings' => [
    'requiredFields' => [
      0 => 'merchantId',
      1 => 'signature',
      2 => 'signatureMethod',
      3 => 'currencyId',
    ],
    'fieldsPreg' => [
      'merchantId' => '/[0-9]{10,15}$/ui',
      'signature' => '/[a-z0-9]{3,250}$/ui',
      'signatureMethod' => '/(md5|sha1)$/ui',
      'currencyId' => '/[0-9]{3,4}$/ui',
      'currencyDefault' => '/[a-z0-9]{1,5}$/ui',
      'orderStatusSuccess' => '/[a-z0-9\s\-_.,]{1,250}$/ui',
      'orderStatusWaiting' => '/[a-z0-9\s\-_.,]{1,250}$/ui',
      'paymentSystemEnabled' => '/[a-z0-9]{3,250}$/ui',
      'paymentSystemDisabled' => '/[a-z0-9]{3,250}$/ui',
    ],
    'fieldsName' => [
      'merchantId' => w1SettingsMerchant,
      'signatureMethod' => w1SettingsSignatureMethod,
      'signature' => w1SettingsSignature,
      'currencyId' => w1SettingsCurrency,
      'orderStatusSuccess' => w1SettingsOrderStatusSuccess,
      'orderStatusWaiting' => w1SettingsOrderStatusWaiting,
      'currencyDefault' => w1SettingsCurrencyDefault,
      'paymentSystemEnabled' => w1SettingsPtenabled,
      'paymentSystemDisabled' => w1SettingsPtdisabled,
    ]
  ],
  'invoce' => [
    'requiredFields' => [
      0 => 'orderId',
      1 => 'summ',
      2 => 'currencyId',
    ],
    'fieldsPreg' => [
      'orderId' => '/[0-9a-zа-яё_\-]{1,550}$/ui',
      'summ' => '/[0-9\s\,\.]{1,250}$/ui',
      'currencyId' => '/[0-9]{3,4}$/ui',
      'firstNameBuyer' => '/^[a-zа-яё\s\-]{1,250}$/ui',
      'lastNameBuyer' => '/^[a-zа-яё\s\-]{1,250}$/ui',
      'emailBuyer' => '/^[a-z0-9а-яё\s\-_\.@\+]{1,500}$/ui',
    ],
    'fieldsName' => [
      'orderId' => w1orderId,
      'summ' => w1summ,
      'currencyId' => w1currencyId,
      'firstNameBuyer' => w1firstNameBuyer,
      'lastNameBuyer' => w1lastNameBuyer,
      'emailBuyer' => w1emailBuyer,
    ]
  ],
  'payment' => [
    'cms' => 0,
    'cms_netcat' => 2,
    'cms_wordpress' => 10,
    'cms_opencart' => 15,
    'cms_joomlavm' => 17,
    'cms_prestashop' => 20,
    'cms_simpla' => 24,
    'cms_diafan' => 25,
    'cms_drupalCommerce' => 26,
    'cms_shopkeeper' => 28,
    'cms_readyscript' => 31,
    'cms_amiro' => 32,
    'cms_minishop' => 33,
    'cms_ecwid' => 34,
    'cms_shopScript7' => 35,
    'requiredFields' => [
      0 => 'successUrl',
      1 => 'failUrl',
    ],
    'fieldsPreg' => [
      'siteName' => '/[a-zа-яё0-9\:\;\/.\-_« » \„\“\"\"\?\!\@\$\&\*\+\\,\=\^\№\`\~]{3,3000}$/ui',
      'successUrl' => '/[a-zа-яё0-9\:\/.\-_\?\&\=]{3,3000}$/ui',
      'failUrl' => '/[a-zа-яё0-9\:\/.\-_\?\&\=]{3,3000}$/ui',
    ],
    'fieldsName' => [
      'siteName' => w1siteName,
      'successUrl' => w1successUrl,
      'failUrl' => w1failUrl,
    ],
  ],
  'result' => [
    'requiredFields' => [
      0 => 'orderPaymentId',
      1 => 'orderState',
      2 => 'orderId',
      3 => 'summ'
    ],
    'fieldsPreg' => [
      'orderPaymentId' => '/[0-9]{1,15}$/ui',
      'orderState' => '/[a-z]{1,10}$/ui',
      'paymentType' => '/[a-z0-9\s_\-,.]{1,250}$/ui',
      'orderId' => '/[0-9a-z\s\-_.а-яё]{1,550}$/ui',
      'summ' => '/[0-9\s\,\.]{1,250}$/',
    ],
    'fieldsName' => [
      'orderPaymentId' => w1orderPaymentId,
      'orderState' => w1orderState,
      'orderId' => w1orderId,
      'paymentType' => w1paymentType,
      'summ' => w1summ
    ]
  ],
  'currencyCode' => [
    643 => 'RUB',
    710 => 'ZAR',
    840 => 'USD',
    978 => 'EUR',
    980 => 'UAH',
    398 => 'KZT',
    974 => 'BYR',
    972 => 'TJS',
    985 => 'PLN',
    981 => 'GEL',
	944 => 'AZN'
  ],
  'currencyName' => [
    0 => w1SettingsCurrency_0,
    643 => w1SettingsCurrency_643,
    710 => w1SettingsCurrency_710,
    840 => w1SettingsCurrency_840,
    978 => w1SettingsCurrency_978,
    980 => w1SettingsCurrency_980,
    398 => w1SettingsCurrency_398,
    974 => w1SettingsCurrency_974,
    972 => w1SettingsCurrency_972,
    985 => w1SettingsCurrency_985,
    981 => w1SettingsCurrency_981,
    944 => w1SettingsCurrency_944
  ],
  'currencyDefault' => 'no',
  'signatureMethodDefault' => 'MD5',
  'signatureMethod' => [
    '0' => w1SettingsSignatureMethod_0,
    'md5' => 'MD5',
    'sha1' => 'SHA1'
  ],
  'logoUrl' => 'https://www.walletone.com/logo/provider/',
  'cultureDefault' => 'ru-RU',
  'cultureArray' => [
    0 => w1SettingsCulture_0,
    'ru-RU' => w1SettingsCulture_ru,
    'az-Latn-AZ' => w1SettingsCulture_az,
    'en-US' => w1SettingsCulture_en,
    'uk-UA' => w1SettingsCulture_uk,
    'ka-GE' => w1SettingsCulture_ka,
    'pl-PL' => w1SettingsCulture_pl
  ],
  'cultureName' => [
    0 => w1SettingsCulture_0,
    1 => w1SettingsCulture_ru,
    2 => w1SettingsCulture_az,
    3 => w1SettingsCulture_en,
    4 => w1SettingsCulture_uk,
    5 => w1SettingsCulture_ka,
    6 => w1SettingsCulture_pl
  ],
  'cultureCode' => [
    0 => 0,
    1 => 'ru-RU',
    2 => 'az-Latn-AZ',
    3 => 'en-US',
    4 => 'uk-UA',
    5 => 'ka-GE',
    6 => 'pl-PL'
  ]
];

