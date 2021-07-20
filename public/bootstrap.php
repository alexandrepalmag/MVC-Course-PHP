<?php

session_start();

require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use app\core\AppExtract;
use app\core\Myapp;

$myapp = new MyApp(new AppExtract);
$myapp->controller();
$myApp->view();
