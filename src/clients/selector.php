<?php
  require_once '../../config/dbConnect.php';

  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: GET");

  const ROLE_ADVISER_ID = 1;
  const ROLE_EXECUTIVE_ID = 2;

  $queryAdvisers = "select u.id, concat(u.name, ' ', u.last_name) as name from users u
    inner join role_users us on us.user_id = u.id 
    where us.role_id = ". ROLE_ADVISER_ID;

  $queryExecutives = "select u.id, concat(u.name, ' ', u.last_name) as name from users u
    inner join role_users us on us.user_id = u.id 
    where us.role_id = ". ROLE_EXECUTIVE_ID;

  $advisers = mysqli_query($connection, $queryAdvisers) or die("Clients selector adviser: SQL Query Failed");
  $executives = mysqli_query($connection, $queryExecutives) or die("Clients selector executive: SQL Query Failed");
  
  $outputAdvisers = mysqli_fetch_all($advisers, MYSQLI_ASSOC);
  $outputExecutives = mysqli_fetch_all($executives, MYSQLI_ASSOC);
  echo json_encode(['success' => true, 'data' => ['advisers' => $outputAdvisers, 'executives' => $outputExecutives]]);
?>