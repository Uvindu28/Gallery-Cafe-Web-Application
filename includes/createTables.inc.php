<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    require_once __DIR__ . '/db.inc.php';

    $newTable = mysqli_real_escape_string($conn, $_POST['newTables']);

    if (addTables($conn, $newTable)) {
        header('Location:../newTablesCrud.php');
    } else {
        header('Location:../newTables.php?error=1');
    }
    exit();
} else {
    header('Location:../newTables.php');
    exit();
}

function addTables($conn, $newTable) {
    $stmt = $conn->prepare("INSERT INTO tablecategory (tableCategory) VALUES (?)");
    $stmt->bind_param("s", $newTable);
    return $stmt->execute();
}
