<?php
include_once '../includes/db.inc.php';
include_once '../includes/foodCrud.inc.php';

$products = getProducts($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Reset some basic styles */
        body, h3, input, form {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Basic body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        /* Message styling */
        .message {
            display: block;
            padding: 1.5rem 1rem;
            font-size: 2rem;
            color: black;
            margin-bottom: 2rem;
            text-align: center;
            background-color: #ffdfdf;
            border: 1px solid #ff0000;
            border-radius: 5px;
        }

        /* Container styling */
        .product-container {
            width: 100%;
            max-width: 800px;
            margin-left: 350px;
            margin-top: 150px;
        }

        /* Form container styling */
        .admin-product-form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .admin-product-form-container h3 {
            text-transform: uppercase;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            font-size: 2rem;
        }

        /* Input field styling */
        .admin-product-form-container input[type="text"],
        .admin-product-form-container input[type="number"],
        .admin-product-form-container input[type="file"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Submit button styling */
        .admin-product-form-container .btn {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Submit button hover effect */
        .admin-product-form-container .btn:hover {
            background-color: #4cae4c;
        }


    </style>
</head>
<body>
    <?php if (isset($message)) {
        foreach ($message as $message) {
            echo '<span class="message">' . $message . '</span>';
        }
    } ?>
    <div class="product-container">
        <div class="admin-product-form-container">
            <form action="../includes/foodCrud.inc.php" method="post" enctype="multipart/form-data">
                <h3>Add New Product</h3>
                <input type="text" placeholder="Enter product name" name="product_name" required>
                <input type="number" placeholder="Enter product price" name="product_price" required>
                <input type="text" placeholder="Enter product discription" name="product_dis" required>
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" required>
                <input type="submit" class="btn" name="submit" value="Add">
            </form>
        </div>
    </div>
</body>
</html>
