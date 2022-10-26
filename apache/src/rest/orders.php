<?php
include('db/order-repository.php');

// необходимые HTTP-заголовки
header("Content-Type: application/json; charset=UTF-8");
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode(OrderRepository::read());
        break;
    case 'POST':
        $newOrder = json_decode(file_get_contents('php://input'));
        OrderRepository::create($newOrder->name, $newOrder->price);
        break;
    case 'PUT':
        $newOrder = json_decode(file_get_contents('php://input'));
        echo OrderRepository::update($newOrder->id, $newOrder->name, $newOrder->price);
        break;
    case 'DELETE':
        $oldOrder = json_decode(file_get_contents('php://input'));
        echo OrderRepository::delete($oldOrder->id);
        break;
}
?>