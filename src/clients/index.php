<?php
  require_once '../../config/dbConnect.php';

  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: GET");

  $query = "select c.*, concat(ad.name, ' ', ad.last_name) as adviser, concat(ex.name, ' ', ex.last_name) as executive from clients c
    inner join users ad on ad.id = c.adviser_id 
    inner join users ex on ex.id = c.executive_id
    where c.deleted_at is null";

  $result = mysqli_query($connection, $query) or die("Clients index: SQL Query Failed");
  
  if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode(['success' => true, 'data' => $output]);
  } else {
    echo json_encode(["success" => false, "message" => "No Records Found"]);
  }
?>