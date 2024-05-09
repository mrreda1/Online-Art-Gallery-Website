<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../Database/database.php';
require_once '../Models/Request.php';

$request = new Request();

$result = $request->read();

$num = $result->rowCount();

if ($num > 0) {
  $request_arr = array();
  $request_arr['data'] = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $request_item = array(
      'id' => $id,
      'username' => $username,
      'email' => $email,
      'passwd' => $passwd,
      'counter' => $counter,
      'pfp' => $pfp,
      'bio' => $bio
    );

    array_push($request_arr['data'], $request_item);
  }
  echo json_encode($request_arr);
} else {
  echo json_encode(
    array('message' => 'No request found')
  );
}