<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../Database/database.php';
require_once '../Models/Artist.php';

$artfair = new Artfair();

$result = $artfair->read();

$num = $result->rowCount();

if ($num > 0) {
  $artfair_arr = array();
  $artfair_arr['data'] = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $artfair_item = array(
      'id' => $id,
      'titel' => $titel,
      'location' => $location,
      'description' => $description,
      'date' => $date
    );

    array_push($artfair_arr['data'], $artfair_item);
  }
  echo json_encode($artfair_arr);
} else {
  echo json_encode(
    array('message' => 'No Artfair found')
  );
}