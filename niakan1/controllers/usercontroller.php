<?php

function user_controller_index(){
   require_once(MODEL_DIR."/user.php");
   $data = user_select();
   return render("user/index.php", $data);
}

function user_controller_create(){
   return render("user/create.php");
}

function user_controller_store($_request){
   if($_SERVER['REQUEST_METHOD'] != 'POST'){
      header('location:?controller=user');
      exit();
   }
   require_once(MODEL_DIR."/user.php");
   $name = $_request['name'];
   $email = $_request['email'];
   $birth_date = $_request['birth_date'];
   $password = $_request['password'];
   $confirm_password = $_request['confirm_password'];

   if ($password !== $confirm_password) {
       session_start();
       $_SESSION['error_msg'] = "Passwords do not match!";
       header('Location: ?controller=user&function=create');
       exit();
   }

   $user = user_select_by_email($email);
   if ($user) {
      session_start();
      $_SESSION['error_msg'] = "Duplicate Email!";
      header('Location: ?controller=user&function=create');
      exit();
   }

   $hashed_password = password_hash($password, PASSWORD_BCRYPT);
   $data = user_insert(['name' => $name,'email' => $email,'birth_date' => $birth_date,'password' => $hashed_password]);
   if ($data) {
      header('location:?controller=user&function=index');
   } else {
      echo "Error: Could not register user.";
   }
}

function user_controller_show($_request){
   $id=$_request['id'];
   require_once(MODEL_DIR."/user.php");
   $data = user_select_id($id);
   return render("user/show.php", $data);
}

function user_controller_edit($_request){

   $id = isset($_request['id']) ? $_request['id'] : (isset($_POST['id']) ? $_POST['id'] : null);
   if ($id === null){ 
   header('Location: ?controller=user&function=edit');
   exit();    
   }

   require_once(MODEL_DIR."/user.php");
   $id=$_request['id'];
   $user = user_select_id($id);
   $data = array('user'=>$user);
   return render("user/edit.php", $data);
   }

function user_controller_update($_request){
   if($_SERVER['REQUEST_METHOD'] != 'POST'){
      header('location:?controller=user');
      exit();
   }
   require_once(MODEL_DIR."/user.php");
   $id = $_request['id'];
   $name = $_request['name'];
   $email = $_request['email'];
   $birth_date = $_request['birth_date'];
   $password = $_request['password'];
   $confirm_password = $_request['confirm_password'];

   if ($password !== $confirm_password) {
       session_start();
       $_SESSION['error_msg'] = "Passwords do not match!";
       header('Location: ?controller=user&function=edit&id=' . $_POST['id']);
       exit();
   }
   $user = user_select_by_email($email);
   if ($user && (int)$id !== (int)$user['id']) {
      session_start();
      $_SESSION['error_msg'] = "Duplicate Email!";
      header('Location: ?controller=user&function=edit&id=' . $_POST['id']);
   }
   $password = password_hash($password, PASSWORD_BCRYPT);
   $data = user_update(['id' => $id,'name' => $name,'email' => $email,'birth_date' => $birth_date,'password' => $password]);
   if ($data) {
      header('location:?controller=user&function=index');
   } else {
      echo "Error: Could not register user.";
   }
}

function user_controller_delete($_request){
   if($_SERVER['REQUEST_METHOD'] != 'POST'){
      header('location:?controller=user');
    }
   require_once(MODEL_DIR."/user.php");
   $id = $_request['id'];
   $data = user_delete($id);
   if($data){
      header('location:?controller=user');
   }else{
      echo "error";
   }
}

// controllers/usercontroller.php
function user_controller_login() {
    return render('user/login.php');
}

function user_controller_logout() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    session_destroy();
    header('Location: ?controller=user&function=login');
    exit();
}

// Authenticate user logic (login)
function user_controller_authenticate($_request) {
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}
$email = $_POST['username'];
$password = $_POST['password'];
if (!$email || !$password) {
   session_start();
   $_SESSION['error_msg'] = "User Name and password Must not be empty";
   header('Location: ?controller=user&function=login');
   exit();
}
    require_once(MODEL_DIR . "/user.php");
    $user = user_select_by_email($email);
    if ($user && password_verify($password, $user['password'])) {
        session_start();
        session_regenerate_id();
        $_SESSION['userid'] = $user['id'];
        $_SESSION['username'] = $user['name'];
        header('Location: ?controller=article&function=index');
        exit();
    } else {
        session_start();
        $_SESSION['error_msg'] = "Incorrect Username or Password";
        header('Location: ?controller=user&function=login');
        exit();
    }
}

?>
