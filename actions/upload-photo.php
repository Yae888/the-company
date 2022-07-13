<?php

include_once "../classes/User.php";

session_start();

$id = $_SESSION['user_id'];
$filename = $_FILES['photo']['name']; //profileのnameより
$tmp_name = $_FILES['photo']['tmp_name'];

$u = new User;
$u->uploadPhoto($id, $filename,$tmp_name);

?>