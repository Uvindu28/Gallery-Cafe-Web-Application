<?php
include_once '../includes/db.inc.php';
include_once '../includes/foodCrud.inc.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$products = getProducts($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        ul, li{
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .container-crud {
            width: 80%;
            background-color: #ffffff;
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

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <?php
    
    include_once '../html/preLoader.php';

    ?>



<header>
        <a href="#" class="logo">The Gallery <span>Café</span></a>
        <nav class="navbar">
            <a href="../html/index.php">Home</a>
            <a href="menus.php">Menus</a>
            <a href="../html/index.php#SpecialFood">Special Foods</a>
            <a href="#home">Beverages</a>
            <a href="../html/index.php#aboutus">About Us</a>
        </nav>
        <div class="profile">
            <?php
            
            if(isset($_SESSION['Uname'])){
                echo '<div class="cusInfo">
                        <a href="../html/bookAtable.php"><button id="bookBtn">Book A Table</button></a>
                        <a href="#"><span id="name">Welcome, ' . $_SESSION['Uname'] . '</span></a>
                        <a href="../includes/logout.inc.php"><button id="logoutBtn">Log Out</button></a>
                    </div>';
                 }else{
                    echo
                    '<div class="cusLogin">
                        <a href="customerLogin.php"><button id="loginBtn">Login</button></a>
                        <a href="customerSignup.php"><button id="signupBtn">Sign Up</button></a>
                    </div>';
                }
            
            ?>
            
        </div>
    </header>

    <div class="customer">
        <?php
        
        include_once '../html/editCustomer.php';
        
        ?>
    </div>
    <div class="container-crud">
        <div class="header">
            <h2>Table Reservations</h2>
        </div>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>No of Adults</th>
                    <th>No of Children</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tableReservations";
                $result = $conn->query($sql);
                if (!$result) {
                    die("Invalid query!" . $conn->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['noOfAdults']}</td>
                            <td>{$row['noOfChildren']}</td>
                            <td>{$row['phoneNumber']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['time']}</td>
                            <td>
                                <center><a class='btn btn-delete' href='../includes/delete.inc.php?id={$row['id']}'>Delete</a></center>
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