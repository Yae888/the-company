<?php

    include_once "../classes/User.php";

    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $u = new User();
    $u->createUser($f_name,$l_name,$username,$password);


    

?>