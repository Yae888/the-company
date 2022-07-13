<?php

    include_once "../classes/User.php";
    
    $uid = $_POST['user_id'];  //これらは全てveiw edit.user.phpから来ている。そこの保管先がココになっているため。
    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name'];
    $username = $_POST['username'];

    $u = new User;
    $u->updateUser($uid, $f_name, $l_name, $username);



?>