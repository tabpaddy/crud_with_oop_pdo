<?php

require_once '../modal/db.php';
require_once '../util.php';

class User {
    private $userModal;
    private $util;

    public function __construct() {
        $this->userModal = new Database;
        $this->util = new Util;
    }

    // Handle add new user AJAX request
    public function insert() {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        $data = [
            'fname' => $this->util->textInput($_POST['fname']),
            'lname' => $this->util->textInput($_POST['lname']),
            'email' => $this->util->textInput($_POST['email']),
            'phone' => $this->util->textInput($_POST['phone']),
        ];

        if($this->userModal->insert($data)) {
            echo $this->util->showMessage('success', 'User is inserted successfully!');
        } else {
            echo $this->util->showMessage('danger', 'Not successfully inserted');
        }
    }
}

$init = new User;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['add'])){
        $init->insert();
    }
}
