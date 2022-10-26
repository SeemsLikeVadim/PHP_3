<?php
include('database.php');
class Order{
    public $id;
    public $name;
    public $price;

    function __construct($d_name, $d_price,$d_id=0) {
        $this->id =$d_id;
        $this->name = $d_name;
        $this->price = $d_price;
    }
}
class OrderRepository{

    public static function create($name, $price) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("INSERT INTO orders (name, price) VALUES ('$name', '$price')");
    }

    public static function read() {
        $response = [];
        $mysqli = ConnectionDB::getInstance();
        $result = $mysqli->query("SELECT * FROM orders");
        foreach ($result as $row){
            $response[count($response)] = new Order($row['name'], $row['price'], $row['ID']);
        }
        return $response;
    }

    public static function update($id, $name, $price) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("UPDATE orders SET name = '$name', price = '$price' WHERE id = '$id'");
    }

    public static function delete($id) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("DELETE FROM orders where id = '$id'");
    }
}
?>