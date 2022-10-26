<?php
include('db/coffee-repository.php');

header("Content-Type: application/json; charset=UTF-8");
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode(CoffeeRepository::read());
        break;
    case 'POST':
        $newCoffee = json_decode(file_get_contents('php://input'));
        CoffeeRepository::create($newCoffee->name, $newCoffee->price);
        break;
    case 'PUT':
        $newCoffee = json_decode(file_get_contents('php://input'));
        echo CoffeeRepository::update($newCoffee->id, $newCoffee->name, $newCoffee->price);
        break;
    case 'DELETE':
        $oldCoffee = json_decode(file_get_contents('php://input'));
        echo CoffeeRepository::delete($oldCoffee->id);
        break;
}
?>