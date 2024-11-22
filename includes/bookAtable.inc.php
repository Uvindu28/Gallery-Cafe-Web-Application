<?php
include_once '../includes/db.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email =  $_POST['email'];
    $phoneNumber =  $_POST['phone'];
    $date =  $_POST['date'];
    $time =  $_POST['time'];
    $no_of_adults =  $_POST['adults'];
    $no_of_children =  $_POST['children'];

    $select_name = mysqli_query($conn, "SELECT name FROM tablereservations WHERE name = '$name'") or die('Query failed');

    if (mysqli_num_rows($select_name) > 0) {
        echo "Product name already added.";
    } else {
        // Add product to database
        if (addtableres($conn, $name, $email, $phoneNumber, $date, $time, $no_of_adults, $no_of_children)) {
            header('Location:../html/index.php');
        } else {
            echo "Error adding product to database.";
        }
    }
}







function addtableres($conn, $name, $email, $phoneNumber, $date, $time, $no_of_adults, $no_of_children) {
    $stmt = $conn->prepare("INSERT INTO tablereservations (name, email, phoneNumber, date, time, noOfAdults, noOfChildren ) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $phoneNumber, $date, $time, $no_of_adults, $no_of_children);
    return $stmt->execute();
}

?>