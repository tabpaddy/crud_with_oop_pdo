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
        $this->db->bind(':phone', $data['phone']);

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //  fetch all users from database
    public function read(){
        $this->db->query('SELECT * FROM users ORDER BY id DESC');

        // execute
        $result = $this->db->resultSet();

        if($this->db->rowCount() > 0){
            return $result;
        }else{
            return false;
        }
    }

    // fetch single user from database
    public function editUser($id){
        $this->db->query('SELECT * FROM users WHERE id = :id');

        // bind value
        $this->db->bind(':id', $id);

        // execute
        $result = $this->db->single();

        if($this->db->rowCount() > 0){
            return $result;
        }else{
            return false;
        }
    }

    // Update single User
    public function updateUser($data){
        $this->db->query('UPDATE users SET first_name = :fname, last_name=:lname, email=:email, phone=:phone where id=:id');

        // bindvalue
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':fname', $data['fname']);
        $this->db->bind(':lname', $data['lname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Delete user from database
    public function deleteUser($id){
        $this->db->query('DELETE FROM users WHERE id =:id');

        // bindvalue
        $this->db->bind(':id', $id);

        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}