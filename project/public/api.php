<?php

require_once '../vendor/autoload.php';

$config = new \Doctrine\DBAL\Configuration();

$connectionParams = [
    'driver' => 'pdo_sqlite',
    'url'    => 'sqlite:///' . __DIR__ . '/../test.sqlite'
];
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$conn->exec('CREATE TABLE IF NOT EXISTS main.user (
id INTEGER PRIMARY KEY,
username TEXT NOT NULL
)');
$conn->insert('user', ['username' => mt_rand()]);

$uri = $_SERVER['REQUEST_URI'];

function apiResponse($data) {
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    return json_encode($data);
}

// список таблиц
if ($uri == '/api/v1/table') {
    $data = [
        ['name' => 'users', 'columns' => [['name' => 'fio', 'type' => 'string']]],
        ['name' => 'books', 'columns' => [['name' => 'pages', 'type' => 'number']]],
    ];
    echo apiResponse($data);
}

// получение таблицы по имени
if (preg_match('#/api/v1/table/(\w)+#', $uri, $matches)) {
    $id = $matches[1];
}