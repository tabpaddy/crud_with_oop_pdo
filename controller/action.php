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

    // handle fetch all users Ajax request
    public function fetch(){
        $users = $this->userModal->read();
        $output = '';
        if($users){
            foreach ($users as $row) {
                # code...
                $output .= '<tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['first_name'].'</td>
                <td>'.$row['last_name'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['phone'].'</td>
                <td>
                    <a href="" id="'.$row['id'].'" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-bs-toggle="modal" data-bs-target="#editUserModal">Edit</a>
                    <a href="" id="'.$row['id'].'" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
                </td>
            </tr>';
            }
            echo $output;
        }else{
            echo '<tr>
                    <td colspan="6">No Users Found in The database!</td>            
            </tr>';
        }
    }

    // Handle Edit User Ajax Request
    public function edit(){
        $id = $_GET['id'];

        $user = $this->userModal->editUser($id);
        echo json_encode($user);

    }

    // handle update user
    public function update(){
        // sanitize post

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        // print_r($_POST);

        $data = [
            'id' => $this->util->textInput($_POST['id']),
            'fname' => $this->util->textInput($_POST['fname']),
            'lname' => $this->util->textInput($_POST['lname']),
            'email' => $this->util->textInput($_POST['email']),
            'phone' => $this->util->textInput($_POST['phone']),
        ];

        if($this->userModal->updateUser($data)){
            echo $this->util->showMessage('success', 'User updated successfully!');
        } else {
            echo $this->util->showMessage('danger', 'Not successfully updated');
        }

    }

    // handle delete user ajax request
    public function delete(){
        $id = $_GET['id'];

        if($this->userModal->deleteUser($id)){
            echo $this->util->showMessage('success', 'User deleted successfully!');
        } else {
            echo $this->util->showMessage('danger', 'Something went wrong');
        }
    }
}


$init = new User;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['add'])){
        $init->insert();
    }elseif(isset($_POST['update'])){
        $init->update();
    }
}elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['read'])){
        $init->fetch();
    }elseif(isset($_GET['edit'])){
        $init->edit();
    }elseif(isset($_GET['delete'])){
        $init->delete();
    }
}
