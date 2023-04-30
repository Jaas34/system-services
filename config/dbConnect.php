<?php

// DB config
$server = "localhost";
$user = "root";
$password = "";
$database = "system_services";

$connection = mysqli_connect($server, $user, $password, $database) or die('MySQL connect failed. ' . mysqli_connect_error());

?>