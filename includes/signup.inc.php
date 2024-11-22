<?php

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $cpwd = $_POST["cpassword"];
    
    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    $emptyInput = emptyInputsSignUp($name, $email, $pwd, $cpwd);
    $invalidUid = invalidUid($name);
    $inavalidEmail = invalidEmail($email);
    $pwdMatch = pwdMacth($pwd, $cpwd);
    $UidExists = uidExistsRegister($conn, $name, $email);

    if($emptyInput !==false){
        header("Location:../register.php?error=emptyinput");
        exit();
    }
    if($invalidUid !==false){
        header("Location:../register.php?error=invalidUsername");
        exit();
    }
    if($inavalidEmail !==false){
        header("Location:../register.php?error=invalidemail");
        exit();
    }
    if($pwdMatch !==false){
        header("Location:../register.php?error=psswordDoNotMatch");
        exit();
    }
    if($UidExists !==false){
        header("Location:../register.php?error=usernameAlreadyExists");
        exit();
    }

    createUser($conn, $name, $email, $pwd);

}else{
    header('Location:../login.php');
    exit();
}