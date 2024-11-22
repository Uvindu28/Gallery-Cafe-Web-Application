<?php

    
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        include_once '../includes/db.inc.php';
        include_once '../includes/functions.inc.php';

        deleteStaff($conn, $id);

    }else{
        header('Location:../html/staff.php');
        exit();
    }


?>