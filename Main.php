<?php

use main\Service\DateHandler;
use main\Service\EmployeeHandler;
use main\Service\FileHandler;
use Pimple\Container;

require __DIR__.'/vendor/autoload.php';


$container = new Container();

$container['$dateHandler'] = function () {
    return new DateHandler();
};

$container['employee_handler'] = function ($c) {
    return new EmployeeHandler($c['$dateHandler']);
};

$container['file_handler'] = function ($c) {
    return new FileHandler($c['employee_handler'], $c['$dateHandler']);
};

$fileHandler = $container['file_handler'];
$employeeHandler = $container['employee_handler'];


$fileHandler->generateTravelCompensationAsCsv($employeeHandler->getEmployees());
