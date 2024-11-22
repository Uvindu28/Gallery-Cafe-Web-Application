<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once '../includes/db.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff List</title>
    <style>
        body, ul, li{
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .container-crud {
            width: 80%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-left: 150px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            color: #fff;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-add {
            background-color: #28a745;
        }

        .btn-add:hover {
            background-color: #218838;
        }

        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        .styled-table th {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #343a40;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        .btn-edit {
            background-color: #007bff;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .navbar{
            background-color: #333;
            padding: 10px 20px;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-container {
            display: flex;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .navbar-logo {
            color: #fff;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-menu {
            display: flex;
        }

        .navbar-item {
            margin-left: 20px;
        }

        .navbar-link {
            color: #f2f2f2;
            text-decoration: none;
            font-size: 1rem;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .navbar-link:hover {
            background-color: #575757;
            color: #fff;
        }       

    </style>
</head>
<body>
    <?php
    
    include_once '../html/dashboard.php';

    ?>
    <div class="container-crud">
        <div class="header">
            <h2>Category List</h2>
            <a class="btn btn-add" href="addCategory.php">ADD</a>
        </div>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM category";
                $result = $conn->query($sql);
                if (!$result) {
                    die("Invalid query!" . $conn->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['categoryName']}</td>
                            <td>
                                <a class='btn btn-edit' href='edit.php?id={$row['id']}'>Edit</a>
                                <a class='btn btn-delete' href='../includes/delete.inc.php?id={$row['id']}'>Delete</a>
                            </td>
                        </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
