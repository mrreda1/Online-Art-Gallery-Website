<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../Database/database.php';
require_once '../Models/Feedback.php';

$feedback = new Feedback();

$result = $feedback->read();

$num = $result->rowCount();

if ($num > 0) {
  $feedback_arr = array();
  $feedback_arr['data'] = array();

  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $feedback_item = array(
      'id' => $id,
      'details' => $details,
      'date' => $date,
      'state' => $state
    );

    array_push($feedback_arr['data'], $feedback_item);
  }
  echo json_encode($feedback_arr);
} else {
  echo json_encode(
    array('message' => 'No feedback found')
  );
}