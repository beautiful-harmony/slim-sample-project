<?php
require __DIR__ . '/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . "//..//");
$dotenv->load();

$container = require __DIR__ . '/../config/dependencies.php';
assert($container instanceof Psr\Container\ContainerInterface);

\Doctrine\Common\Annotations\AnnotationReader::addGlobalIgnoredName('mixin');

$em = $container->get(\Doctrine\ORM\EntityManagerInterface::class);
assert($em instanceof \Doctrine\ORM\EntityManager);

return $em;