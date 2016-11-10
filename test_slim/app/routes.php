<?php

// роутинг
//echo ' до роутер ';
$app->get('/', 'App\Controllers\HomeController:index');
//echo 'posle roitinga ';
//var_dump($app);