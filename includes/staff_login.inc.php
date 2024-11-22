<?php

if(isset($_POST["submit"])){
    $username = $_POST['email'];
    $pwd = $_POST['password'];
    
    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    staffLogin($conn, $username, $pwd);

}else{
    header('Location:../html/staff_login.php');
    exit();
}
