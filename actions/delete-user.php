<?php

include_once "../classes/User.php";

$id = $_POST['user_id'];

$u = new User;
$u->deleteUser($id);

?>