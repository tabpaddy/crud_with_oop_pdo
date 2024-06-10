<?php

require_once '../database/config.php';

class Database{
    private $db;

    public function __construct()
    {
        $this->db = new Config;
    }

    //  insert User Into database
    public function insert($data){
        $this->db->query('INSERT INTO users (first_name, last_name, email, phone) VALUES (:fname, :lname, :email, :phone)');

        // bind value
        $this->db->bind(':fname', $data['fname']);
        $this->db->bind(':lname', $data['lname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['email']);

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}