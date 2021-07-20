<?php

use app\core\AppExtract;

session_start();

require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

/* try { */


/* } catch (Throwable $throw) {

    formatException($throw);
} */

$app = new AppExtract;

$controller = $app->controller();
$method = $app->method();
$params = $app->params();

$controller = new $controller;
$controller->$method($params);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (!isset($controller->data)) {

        throw new Exception('A propriedade data é obrigatória!');
    }

    if (!array_key_exists('title', $controller->data)) {

        throw new Exception('A propriedade title é obrigatória em data!');
    }

    extract($controller->data);

    require '../app/views/index.php';
}
