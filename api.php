<?php

include_once 'Order.php';

$order = new Order();
$orders = [];

if (isset($_GET['company']) || isset($_GET['date'])) {
    $column = isset($_GET['company']) ? 'company' : 'date';
    $data = isset($_GET['company']) ? $_GET['company'] : $_GET['date'];
    $result = $order->getBy($column, $data);
} else {
    $result = $order->get();
}


if ($result->rowCount()) {
    while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
        $order = [
            'id' => $row['id_order'],
            'date' => $row['date'],
            'company' =>  $row['company'],
            'qty' => $row['qty']
        ];

        array_push($orders, $order);
    }

    echo json_encode($orders);
} else {
    echo 'ERROR!';
}
