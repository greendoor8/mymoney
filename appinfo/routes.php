<?php
/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> OCA\MyMoney\Controller\PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */
return [
  'resources' => [
  	'account' => ['url' => '/accounts'],
  	'account_api' => ['url' => '/api/0.1/accounts']
  	],
  'routes' => [
    ['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],
    ['name' => 'account_api#preflighted_cors', 'url' => '/api/0.1/{path}',
     'verb' => 'OPTIONS', 'requirements' => ['path' => '.+']]
  ]
];
