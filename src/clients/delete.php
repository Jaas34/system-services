<?php
    header("Content-Type: application/json"); 
    header("Access-Control-Allow-Origin: *"); 
    header("Access-Control-Allow-Mehtods: DELETE");

    $data = json_decode(file_get_contents("php://input"), TRUE); 

    $client_id = $data['id'];

    require_once '../../config/dbConnect.php';

    $if_exists = "SELECT * FROM clients WHERE id={$client_id}";
    $exists = mysqli_query($connection, $if_exists) or die("SQL Query Failed: Check record");

    if (mysqli_num_rows($exists) > 0) {
        $query = "UPDATE clients SET deleted_at = now() WHERE id={$client_id}";

        if (mysqli_query($connection, $query)) {
            echo json_encode(['success' => true, 'message' => "Record deleted"]); 
        } else {
            echo json_encode(['success' => false, 'message' => "Record not deleted"]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => "Record does not exist"]);
    }
?>