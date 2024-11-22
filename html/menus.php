<?php
include_once '../includes/db.inc.php';
include_once '../includes/foodCrud.inc.php';

session_start();
$search = isset($_GET['search']) ? $_GET['search'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$products = getProducts($conn, $search, $category);

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = 1;

    $cart_item = array(
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => $product_quantity
    );

    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], 'id');
        if (!in_array($product_id, $item_array_id)) {
            $_SESSION['cart'][] = $cart_item;
        } else {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['id'] == $product_id) {
                    $_SESSION['cart'][$key]['quantity'] += 1; 
                }
            }
        }
    } else {
        $_SESSION['cart'][] = $cart_item;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=..., initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200..1000&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Playwrite+ES:wght@100..400&display=swap');

        @font-face {
            font-family: Mak;
            src: url(font/Mak.otf);
        }

        :root {
            --red: #ff3838;
        }

        * {
            font-family: 'Nunito', sans-serif;
            margin: 0; padding: 0;
            box-sizing: border-box;
            outline: none; border: none;
            text-decoration: none;
            text-transform: capitalize;
            transition: all .2s linear;
        }

        *::selection {
            background: var(--red);
            color: #fff;
        }
        /* section{
            padding: 2rem 9%;
        } */

        html {
            font-size: 62.5%;
            overflow-y: auto;
            scroll-behavior: smooth;
            scroll-padding-top: 6rem;
        }


        section {
            padding: 2rem 9%;
            background-color: #fffcf2;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            /* padding: 2rem 9%; */
            padding: 10px 30px 10px 40px;
            transition: 0.25 ease tranform;
            /* background: linear-gradient(to bottom,white,transparent); */
        }


        header .logo {
            font-size: 3.5rem;
            font-weight: 200;
            color: #000000;
            font-family: Mak;
            text-transform: lowercase;
        }

        header .logo span {
            color: #000000;
            font-weight: 1000;
        }

        header .navbar a {
            font-size: 18px;
            margin-left: 1.5rem;
            color:  #000000;
            margin: 15px;
            font-weight: 400;
            font-family: "Nunito", sans-serif;
        }

        header .navbar a:hover {
            color: #ffba08;
        }

        .cusLogin{
            width: 250px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .cusLogin a{
            font-size: 1.5rem;
            margin-left: 1.5rem;
            color:  #000000;
            margin: 15px;
            font-weight: 400;
            font-family: "Nunito", sans-serif;
        }

        .cusLogin button{
            font-weight: 600;
            border-radius: 8px;
            background: #000000;
            color: white;
        }

        #signupBtn{

            padding: 10px 15px;
            
        }
        #loginBtn{
            padding: 10px 15px;
            
        }

        .cusLogin button:hover{
            background: #ffba08;
        }

        .cusInfo{
            width: 350px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .cusInfo button{
            font-weight: 600;
            border-radius: 8px;
            background: #000000;
            color: white;

        }

        #bookBtn{
            padding: 10px 15px;
        }

        #logoutBtn{
            padding: 10px 15px;
        }

        .cusInfo button:hover{
            background: #ffba08;
        }

        .cusInfo span{
            font-size: 15px;
            font-weight: 700;
            color: #000000;
        }



        .hidden{
            transform: translateY(-100%);
        }


        .content {
            text-align: center;
        }

        .container .content h1 {
            font-size: 100px;
            font-weight: 100;
            color: #fffcf2;
            display: flex;
            justify-content: center;
            padding: 235px;
            font-family: "Playwrite ES", cursive;
        }

        .box-container {
            display: inline-block;
        }

        .box-container .content p {
            font-size: 2rem;
            font-weight: 300;
            color: #000000;
            margin: 20px;
            text-align: left;
        }

        .speciality h1 {
            font-size: 5rem;
            letter-spacing: 10px;
            border-right: 5px solid;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            font-weight: 300;
            animation: typing 7s, cursor .4s step-end infinite;
            font-family: "Playwrite ES", cursive;;
        }

        .aboutus{
            padding: 2rem 9%;
            margin-top: 500px;
            background-color: #fffcf2;
        }

        .special-food{
            padding: 2rem 9%;
        }


        .card-container {
            display: grid;
            gap: 20px;
            padding: 20px;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            max-width: 1200px;
            margin: 0 auto;
            margin-top: 150px;
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
        .card-container button{
            width: 100%;
            padding:10px 15px;
            font-size: 17px;
            margin:8px 0;
            background: #ef233c;
            border-radius: 5px;
            color:black;
            font-size: 20px;
            cursor: pointer;
        }

        .card-container button:hover{
            background: #ffba08;
            color:#fff;
        }

        .cartbtn a{
            font-size: 1.5rem;
            margin-left: 1.5rem;
            color:  #000000;
            margin: 15px;
            font-weight: 600;
            margin-right: 50px;
            font-family: "Nunito", sans-serif;

        }
        .search-section {
            background-color: #ef233c;
            padding: 2rem 9%;
            margin-top: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-section form {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .search-section input[type="text"] {
            padding: 0.8rem 1.2rem;
            font-size: 1.6rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 250px;
            margin-top: 80px;
        }

        .search-section select {
            padding: 0.8rem 1.2rem;
            font-size: 1.6rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 80px;
        }

        .search-section button {
            padding: 0.8rem 1.5rem;
            font-size: 1.6rem;
            background-color: #000000;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            margin-top: 80px;
        }

        .search-section button:hover {
            background-color: #ffba08;
            color: #fff;
        }

    </style>
</head>
<body>
    <!-- Header Section Starts -->
    <header>
    <a href="#" class="logo">The Gallery <span>Café</span></a>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="menus.php">Menus</a>
            <a href="index.php#SpecialFood">Special Foods</a>
            <a href="beverages.php">Beverages</a>
            <a href="index.php#aboutus">About Us</a>
        </nav>
        <div class="profile">
            <?php
            
            if(isset($_SESSION['Uname'])){
                echo '<div class="cusInfo">
                        <a href="../html/bookAtable.php"><button id="bookBtn">Book A Table</button></a>
                        <a href="../html/customerCrud.php"><span id="name">Welcome, ' . $_SESSION['Uname'] . '</span></a>
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
        <div class="cartbtn">
            <a href="cart.php">View Cart</a>
        </div>
        
    </header>
    <!-- Header Section Ends -->
    <section class="search-section">
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search food..." value="<?php echo htmlspecialchars($search); ?>">
            <select name="category">
                <option value="">All Categories</option>
                <option value="Category1" <?php echo $category == 'Category1' ? 'selected' : ''; ?>>Category1</option>
                <option value="Category2" <?php echo $category == 'Category2' ? 'selected' : ''; ?>>Category2</option>
                <!-- Add more categories as needed -->
            </select>
            <button type="submit">Search</button>
        </form>
    </section>

    <div class="card-container">
        <?php foreach ($products as $product): ?>
            <div class="card">
                <img src="<?php echo htmlspecialchars('/login/uploaded_img/' . basename($product['image'])); ?>" alt="Food Image">
                <div class="card-content">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <label>$<?php echo number_format($product['price'], 2); ?></label>
                    <p><?php echo htmlspecialchars($product['discription']); ?></p>
                    <form method="POST" action="">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
</body>
</html>
