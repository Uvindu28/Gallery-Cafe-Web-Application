<?php

function emptyInputsSignUp($name, $email, $pwd, $cpwd){
    $result = false;
    if(empty($name) || empty($email) || empty($pwd) || empty($cpwd)){
        $result = true;

    }else{
        $result = false;
    }
    return $result;
} 

function invalidUid($name){
    $result = false;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $name)){
        $result = true;

    }else{
        $result = false;
    }
    return $result;
} 
function invalidEmail($email){
    $result = false;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;

    }else{
        $result = false;
    }
    return $result;
} 
function pwdMacth($pwd, $cpwd){
    $result = false;
    if($pwd !== $cpwd){
        $result = true;

    }else{
        $result = false;
    }
    return $result;
} 

function uidExists($conn, $name, $email){
    $sql = "SELECT * FROM user WHERE id=? OR email=?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
}

function uidExistsRegister($conn, $name, $email){
    $sql = "SELECT * FROM staff WHERE id=? OR email=?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
}

function uidExistsCustomer($conn, $name, $email){
    $sql = "SELECT * FROM customer WHERE id=? OR email=?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../html/customerSignup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
} 

function createUser($conn, $name, $email, $pwd){
    $sql = "INSERT INTO staff (name, email, password) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../html/register.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../html/staff.php?error=none");
    exit();
}

function createCustomer($conn, $name, $email, $pwd){
    $sql = "INSERT INTO customer (Uname, email, password) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../html/customerSignup.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../html/customerLogin.php?error=none");
    exit();
}


function emptyInputsLogin($name,  $pwd){
    $result = false;
    if(empty($name) || empty($pwd)){
        $result = true;

    }else{
        $result = false;
    }
    return $result;
} 

function LoginUser($conn, $name, $pwd){
    $uidExists = uidExists($conn, $name, $name);
    if($uidExists === false){
        header("Location:../html/login.php?error=wronglogin");
        exit();
    }
    $pwdhashed = $uidExists['password'];
    $checkpwd = password_verify($pwd, $pwdhashed);
    if($checkpwd === false){
        header("Location:../html/login.php?error=wronglogin");
        exit();
    }elseif($checkpwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["id"];
        $_SESSION["name"] = $uidExists["name"];
        header("Location:../html/admin_page.php");
        exit();
    }
}

function uidExistStaff($conn, $name, $email){
    $sql = "SELECT * FROM staff WHERE id=? OR email=?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../staff_login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
}

function staffLogin($conn, $name, $pwd){
    $uidExists = uidExistStaff($conn, $name, $name);
    if($uidExists === false){
        header("Location:../html/staff_login.php?error=wronglogin");
        exit();
    }
    $pwdhashed = $uidExists['password'];
    $checkpwd = password_verify($pwd, $pwdhashed);
    if($checkpwd === false){
        header("Location:../html/staff_login.php?error=wronglogin");
        exit();
    }elseif($checkpwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["id"];
        $_SESSION["name"] = $uidExists["name"];
        header("Location:../html/staff_dashboard.php");
        exit();
    }
}

function customerLogin($conn, $name, $pwd){
    $uidExists = uidExistsCustomer($conn, $name, $name);
    if($uidExists === false){
        header("Location:../html/customerLogin.php?error=wronglogin");
        exit();
    }
    $pwdhashed = $uidExists['password'];
    $checkpwd = password_verify($pwd, $pwdhashed);
    if($checkpwd === false){
        header("Location:../html/customerLogin.php?error=wronglogin");
        exit();
    }elseif($checkpwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["id"];
        $_SESSION["Uname"] = $uidExists["Uname"];
        header("Location:../html/index.php");
        exit();
    }
}


function getReservations($conn) {
    $sql = "SELECT * FROM tableReservations";
    $result = $conn->query($sql);
    $reservation = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reservation[] = $row;
        }
    }
    return $reservation;
}



function deleteStaff($conn, $id){
    $sql = "DELETE FROM staff WHERE id=$id";
    $conn->query($sql);
    header("Location:../staff.php");
    exit();
}

function deleteReservation($conn, $reservation_id) {
    $sql = "DELETE FROM tableReservations WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../html/tableReservations.php?error=sqlerror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $reservation_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../html/tableReservations.php?delete=success");
    exit();
}



