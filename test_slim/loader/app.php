<?php

session_start();

require  __DIR__ . '/../vendor/autoload.php';
/*$user = new App\Models\User;
var_dump($user);*/

//настройки Системы


/*
 * конфигуратор slim
 */

$app = new \Slim\App (
    [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'debug' => true,

        //конфиг БД
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'warehouse',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix' => '',
        ]
// Renderer settings
        /*'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],*/
    ],

]);

$container = $app->getContainer();

//используем Laravel's Eloquent ORM
$capsule = new \Illuminate\Database\Capsule\Manager($capsule);
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();


$container['db'] = function($container) use ($capsule) {
    //\Illuminate\Database\Eloquent\Model::setConnectionResolver($container);////WTF!!!!!!!!!!! FUUUUUUUUUUUU!!!!!!!!!
    return $capsule;
};


$container['view'] = function ($container) {
    $view = new Slim\Views\Twig(__DIR__ . '/../resources/views' , [
        'cache' => false,
    ]);

    //добавляем раширение
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    return $view;
};


$container['HomeController'] = function($container){

  return new \App\Controllers\HomeController($container);

};

require __DIR__ . '/../app/routes.php';