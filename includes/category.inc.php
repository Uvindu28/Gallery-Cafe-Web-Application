<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    require_once __DIR__ . '../db.inc.php';

    $category = mysqli_real_escape_string($conn, $_POST['categoryName']);

    if (addCategory($conn, $category)) {
        header('Location:../html/category.php');
    } else {
        header('Location:../html/addCategory.php?error=1');
    }
    exit();
} else {
    header('Location:../html/addCategory.php');
    exit();
}

function addCategory($conn, $category) {
    $stmt = $conn->prepare("INSERT INTO category (categoryName) VALUES (?)");
    $stmt->bind_param("ss", $category);
    return $stmt->execute();
}
