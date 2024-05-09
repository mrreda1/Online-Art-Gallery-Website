<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../Database/database.php';
require_once '../Models/order.php';

$order = new Order();

$result = $order->read();

$num = $result->rowCount();

if ($num > 0) {
  $order_arr = array();
  $order_arr['data'] = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $order_item = array(
      'id' => $id,
      'promotion' => $promotion,
      'address' => $address,
      'state' => $state,
      'buyerPhone' => $buyerPhone
    );

    array_push($order_arr['data'], $order_item);
  }
  echo json_encode($order_arr);
} else {
  echo json_encode(
    array('message' => 'No order found')
  );
}