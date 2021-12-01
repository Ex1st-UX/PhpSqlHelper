<?php

require_once __DIR__ . '/vendor/autoload.php';

// Get object
$sqlHelper = \PhpSqlHelper\PhpSqlHelperCore::getInstance();

// Set mysql connection
$arParams = array(
    'host' => 'localhost',
    'user' => 'root',
    'password' => 'root',
    'database' => 'phpsqlhelper'
);

$sqlHelper->addConnection($arParams);

$isExist = $sqlHelper->isExistPost('users', 'login', 'cris');

