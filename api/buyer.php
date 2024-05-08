<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../Database/database.php';
require_once '../Models/Buyer.php';

$buyer = new Buyer();

$result = $buyer->read();

$num = $result->rowCount();

if ($num > 0) {
  $buyers_arr = array();
  $buyers_arr['data'] = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $buyer_item = array(
      'id' => $id,
      'username' => $username,
      'email' => $email,
      'passwd' => $passwd
    );

    array_push($buyers_arr['data'], $buyer_item);
  }
  echo json_encode($buyers_arr);
} else {
  echo json_encode(
    array('message' => 'No Buyers found')
  );
}
