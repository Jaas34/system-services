<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Mehtods: POST");

//json format data converted to associative array
$data = json_decode(file_get_contents("php://input"), TRUE);

$name           = $data['name'];
$type           = $data['type'];
$adviser_id     = $data['adviser_id'];
$executive_id   = $data['executive_id'];
$platform       = isset($data['platform']) ? 1 : 0;
$catalog        = isset($data['catalog']) ? 1 : 0;
$content        = isset($data['content']) ? 1 : 0;
$other          = isset($data['other']) ? 1 : 0;

require_once '../../config/dbConnect.php';

$query = "INSERT INTO clients (name, type, platform, catalog, content, other, adviser_id, executive_id, created_at) 
    VALUES('{$name}','{$type}','{$platform}','{$catalog}','{$content}','{$other}',{$adviser_id},{$executive_id}, now())";

if (mysqli_query($connection, $query)) {
	echo json_encode(['success' => true, 'message' => "Record saved"]);
} else{
	echo json_encode(['success' => false, 'message' => "Record not saved"]);
}
?>
