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
    <title>Product Gallery</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&family=Mate:ital@0;1&display=swap');
        /* Reset some default browser styles */
        body, ul, li {
            margin: 0;
            padding: 0;
            list-style: none;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }


        .addbtn-container {
            text-align: center;
            margin: 20px 0;
        }

        .addbtn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            background-color: #28a745;
            transition: background-color 0.3s ease;
        }

        .addbtn:hover {
            background-color: #218838;
        }

        .card-container {
            display: grid;
            gap: 20px;
            padding: 20px;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 15px;
            text-align: center;
        }

        .card-content h3 {
            font-size: 1.5rem;
            color: #333;
            margin: 0;
            margin-bottom: 10px;
            font-family:"Mate", serif;
        }

        .card-content label {
            display: block;
            color: #666;
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .card-content .btn {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 50%;
            font-size: 1rem;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .card-content .edit-btn {
            background-color: #5bc0de;
        }

        .card-content .edit-btn:hover {
            background-color: #31b0d5;
        }

        .card-content .delete-btn {
            background-color: #d9534f;
        }

        .card-content .delete-btn:hover {
            background-color: #c9302c;
        }

        .btn i {
            text-align: center;


        }

        .card-content p{
            text-align: center;
            color: #707070;
            font-family: "Mate", serif;

        }
    </style>
</head>
<body>
    <?php
    
    include_once 'dashboard.php';

    ?>

    <div class="addbtn-container">
        <a class='addbtn' href='foodCrud.php'>Add Products</a>
    </div>

    <div class="card-container">
        <?php foreach ($products as $product): ?>
        <div class="card">
            <img src="<?php echo htmlspecialchars('/login/uploaded_img/' . basename($product['image'])); ?>" alt="Food Image">
            <div class="card-content">
                <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                <label>$<?php echo number_format($product['price'], 2); ?></label>
                <p><?php echo htmlspecialchars($product['discription']); ?></p>
                <a href="edit.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn edit-btn"><i class='bx bxs-edit'></i></a>
                <a href="../includes/deleteFood.inc.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn delete-btn"><i class='bx bx-x'></i></a>

            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
