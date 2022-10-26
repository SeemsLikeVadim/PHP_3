<?php
include('database.php');
class Coffee{
    public $id;
    public $name;
    public $price;

    function __construct($p_name, $p_price,$p_id=0) {
        $this->id =$p_id;
        $this->name = $p_name;
        $this->price = $p_price;
    }
}
class CoffeeRepository{

    public static function create($name, $price) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("INSERT INTO products (name , price) VALUES ('$name', '$price')");
    }

    public static function read() {
        $response = [];
        $mysqli = ConnectionDB::getInstance();
        $result = $mysqli->query("SELECT * FROM products");
        foreach ($result as $row){
            $response[count($response)] = new Coffee($row['name'], $row['price'], $row['ID']);
        }
        return $response;
    }

    public static function update($id, $name, $price) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("UPDATE products SET name = '$name', price = '$price' WHERE id = '$id'");
    }

    public static function delete($id) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("DELETE FROM products where id = '$id'");
    }
}
?>
