<?php
include_once '../includes/db.inc.php';
include_once '../includes/foodCrud.inc.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <?php
    
    include_once '../html/preLoader.php';

    ?>

    <!-- Header Section Starts -->


    <header>
        <a href="#" class="logo">The Gallery <span>Café</span></a>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="menus.php">Menus</a>
            <a href="#SpecialFood">Special Foods</a>
            <a href="#home">Beverages</a>
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
    </header>
    <!-- Header Section Ends -->


    <section id="SpecialFood" class="speciality">
        <div class="special-food">
            <h1 class="heading">Beverages</h1>
            <div class="slider-wrapper">
                <button class="slider-btn left" onclick="moveSlide(-1)">&#10094;</button>
                <div class="card-container">
                    <div class="card">
                        <img src="../images/beverages/71booHxo0YL.jpg" alt="Food Image">
                        <div class="card-content">
                            <h3>Coca-Cola</h3>
                            <label>A classic, sweet carbonated drink with a distinct flavor.</label>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../images/beverages/200-ml-pepsi-soft-drinks-500x500.webp" alt="Food Image">
                        <div class="card-content">
                            <h3>Pepsi</h3>
                            <label>A popular cola beverage, slightly sweeter than Coca-Cola.</label>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../images/beverages/glass-sprite.jpg" alt="Food Image">
                        <div class="card-content">
                            <h3>Sprite</h3>
                            <label>A lemon-lime flavored, caffeine-free soft drink.</label>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../images/beverages/001343518-1.webp" alt="Food Image">
                        <div class="card-content">
                            <h3>Fanta</h3>
                            <label>A fruity, orange-flavored soft drink.</label>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../images/beverages/Thai-Lemon-Iced-Tea-Recipe.jpg" alt="Food Image">
                        <div class="card-content">
                            <h3>Lemon Iced Tea</h3>
                            <label> Refreshing iced tea with a hint of lemon flavor.</label>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../images/beverages/peach-ice-tea-500x500.webp" alt="Food Image">
                        <div class="card-content">
                            <h3>Peach Iced Tea</h3>
                            <label> Iced tea infused with the sweet flavor of peaches.</label>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../images/beverages/3747207-559e9f006ce74784ae334faabbfd851c.jpg" alt="Food Image">
                        <div class="card-content">
                            <h3>Green Iced Tea</h3>
                            <label>Light and refreshing iced tea made from green tea leaves.</label>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../images/beverages/5129-mIYHIL.jpg" alt="Food Image">
                        <div class="card-content">
                            <h3>Red Wine</h3>
                            <label>A smooth, medium-bodied red wine with flavors of plum, black cherry, and herbs.</label>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../images/beverages/WilliamFevreChablis_650x.webp" alt="Food Image">
                        <div class="card-content">
                            <h3>White Wine</h3>
                            <label>A versatile white wine with flavors ranging from apple and lemon to tropical fruits.</label>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../images/beverages/Les-Allies-Vdf-Grenache-Rose.webp" alt="Food Image">
                        <div class="card-content">
                            <h3>Rosé Wine</h3>
                            <label>A light and refreshing wine with flavors of red fruits and a slightly sweet finish.</label>
                        </div>
                    </div>
                </div>
                <button class="slider-btn right" onclick="moveSlide(1)">&#10095;</button>
            </div>
        </div>

    </section>

<!-- Speciality Section -->


    



    <footer>
        <?php
        
        include_once 'footer.php';

        ?>
    </footer>



    <script src="../js/home.js"></script>

</script>
</body>
</html>
