<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure id is an integer

    include_once '../includes/db.inc.php';

    deleteFood($conn, $id);
} else {
    header('Location: ../html/admin_php.php');
    exit();
}

function deleteFood($conn, $id) {
    $sql = "DELETE FROM cart WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("i", $id);

    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    header("Location: ../html/admin_page.php");
    exit();
}
?>
