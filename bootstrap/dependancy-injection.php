<?php

use DI\ContainerBuilder;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder;
$container = $containerBuilder->build();

return $container;
