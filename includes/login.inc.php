<?php

if(isset($_POST["submit"])){
    $username = $_POST['email'];
    $pwd = $_POST['password'];
    
    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    LoginUser($conn, $username, $pwd);

}else{
    header('Location:../html/login.php');
    exit();
}
