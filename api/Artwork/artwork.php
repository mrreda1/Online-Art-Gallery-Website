<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../Database/database.php';
require_once '../Models/Artwork.php';

$artwork = new Artwork();

$result = $artwork->read();

$num = $result->rowCount();

if ($num > 0) {
  $artwork_arr = array();
  $artwork_arr['data'] = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $artwork_item = array(
      'id' => $id,
      'titel' => $titel,
      'artworkPath' => $artworkPath,
      'description' => $description,
      'price' => $price,
      'width' => $width,
      'heigth' => $heigth,
      'date' => $date
    );

    array_push($artwork_arr['data'], $buwork_item);
  }
  echo json_encode($artwork_arr);
} else {
  echo json_encode(
    array('message' => 'No Artwork found')
  );
}