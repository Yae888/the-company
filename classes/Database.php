<?php

class Database {
    private $server_name = "localhost";
    private $db_name = "the_company";
    private $user_name = "root";
    private $password = "";
    

    protected $conn;

    public function __construct(){ //construct は全てのbaseを含めて１度のみ
        $this->conn = new mysqli($this->server_name,$this->user_name,$this->password,$this->db_name);

        if($this->conn->connect_error){
            die("Unable to connect to: ".$this->db_name. " ".$this->conn->connect_error);
        }
    }
}




?>