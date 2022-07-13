<?php

include_once "Database.php";

class User extends Database { //Database.phpのconstructがこの中には含まれている

    public function createUser($f_name,$l_name,$username,$password){
        $sql = "insert into users(first_name,last_name,username,password)
                values('$f_name','$l_name','$username','$password')";

        if($this->conn->query($sql)){
            header("location: ../views"); //views/index.php
            exit;
        }else{
            die("Error adding user: ".$this->conn->error);
        }
    }

    public function login($username, $password){
        //get user from database where username = $username
        $sql = "select * from users where username = '$username'";

        $result = $this->conn->query($sql);

        //check that username is found
        if($result->num_rows == 1){
            $user_details = $result->fetch_assoc();

            //if found, check password is correct
            if(password_verify($password, $user_details['password'])){
                //if password correct, start session

                session_start();
                $_SESSION['user_id'] = $user_details['id'];
                $_SESSION['username'] = $user_details['username'];

                header("location: ../views/dashboard.php");
                exit;

            }else{
                die("Password incorrect");
            }
        }else{
            die("User not found");
        }
    
    }
    public function getUsers(){
        $sql = "SELECT * FROM users";

        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("Error retrieving users: ".$this->conn->error);
        }
    }

    public function getUser($user_id){
        $sql = "SELECT * FROM users where ID=$user_id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die("Error retrieving user: ".$this->conn->error);
        }
    }

    public function updateUser($uid, $first_name, $last_name,$username){
        $sql = "UPDATE users SET
            first_name = '$first_name',
            last_name = '$last_name',
            username = '$username'
            WHERE id = $uid";

        if($this->conn->query($sql)){
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error updating user: ".$this->conn->error);
        }


    }

    public function deleteUser($id){
        $sql = "DELETE FROM users WHERE id=$id";

        if($this->conn->query($sql)){
            
            session_start();
            if($_SESSION['user_id'] == $id){
                session_unset();
                session_destroy();

            }

            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error deleting user: ".$this->conn->error);
        }
    }
    public function uploadPhoto($id, $filename, $tmp_name){
        $sql = "UPDATE users SET 
                photo = '$filename'
                WHERE id=$id";

        if($this->conn->query($sql)){
            //save image to "images" folder
            $destination = "../images/$filename";
            if(move_uploaded_file($tmp_name, $destination)){
                header("location: ../views/profile.php");
                exit;
            }else{
                die("Error moving file: ");
            }
        }else{
            die("Error updating user: ".$this->conn->error);
        }
    }

}

?>