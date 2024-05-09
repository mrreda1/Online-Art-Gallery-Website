<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../Database/database.php';
require_once '../Models/Artist.php';

$artist = new Artist();

$result = $artist->read();

$num = $result->rowCount();

if ($num > 0) {
  $artist_arr = array();
  $artist_arr['data'] = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $artist_item = array(
      'id' => $id,
      'username' => $username,
      'email' => $email,
      'passwd' => $passwd,
      'counter' => $counter,
      'pfp' => $pfp,
      'bio' => $bio
    );

    array_push($artist_arr['data'], $buyer_item);
  }
  echo json_encode($artist_arr);
} else {
  echo json_encode(
    array('message' => 'No Artist found')
  );
}