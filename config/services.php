<?php

return [
  'user' => ['base_uri' => env('USER_SERVICE_BASE_URL'),
  'secret' => env('USER_SERVICE_SECRET')],

  'inventory' => [ 'base_uri' => env('INVENTORY_SERVICE_BASE_URL' ),
  'secret' => env('INVENTORY_SERVICE_SECRET')],

  'transaction' => [ 'base_uri' => env('TRANSACTION_SERVICE_BASE_URL'),
  'secret' => env('TRANSACTION_SERVICE_SECRET')],
];



