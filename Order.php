<?php
include_once 'DBconn.php';

class Order extends DBconn{

    public function get(){
        $sql = 'SELECT * FROM orders';
        $result = $this->connect()->query($sql);
        $this->disconnect();
        return $result;
    }

    public function getBy($column, $data){
        $sql = 'SELECT * FROM orders WHERE ' . $column . ' LIKE ' . '"' . $data . '"';
        $result = $this->connect()->query($sql);
        $this->disconnect();
        return $result;
    }

    public function insert($params){
        $sql = 'INSERT INTO orders VALUES (NULL,"'.$params["date"].'","'.$params["company"].'","'.$params["qty"].'")';
        $result = $this->connect()->query($sql);
        $this->disconnect();
        return $result;
    }
}
