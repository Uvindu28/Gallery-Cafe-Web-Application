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
    $UidExists = uidExistsCustomer($conn, $name, $email);

    if($emptyInput !==false){
        header("Location:../html/customerSignup.php?error=emptyinput");
        exit();
    }
    if($invalidUid !==false){
        header("Location:../html/customerSignup.php?error=invalidUsername");
        exit();
    }
    if($inavalidEmail !==false){
        header("Location:../html/customerSignup.php?error=invalidemail");
        exit();
    }
    if($pwdMatch !==false){
        header("Location:../html/customerSignup.php?error=psswordDoNotMatch");
        exit();
    }
    if($UidExists !==false){
        header("Location:../html/customerSignup.php?error=usernameAlreadyExists");
        exit();
    }

    createCustomer($conn, $name, $email, $pwd);

}else{
    header('Location:../html/customerLogin.php');
    exit();
}