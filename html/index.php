<?php
include_once '../includes/db.inc.php';
include_once '../includes/foodCrud.inc.php';

session_start();
$products = getProducts($conn);
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
            <a href="#">Home</a>
            <a href="menus.php">Menus</a>
            <a href="#SpecialFood">Special Foods</a>
            <a href="beverages.php">Beverages</a>
            <a href="#aboutus">About Us</a>
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

    <div class="container">
        <div class="content ">
            <div class="book">
                <h1>Sweets of the taste.</h1>
            </div>
             
        </div>    
    </div>

    <section id="SpecialFood" class="speciality">
        <div class="special-food">
            <h1 class="heading">Special Food</h1>
            <div class="slider-wrapper">
                <button class="slider-btn left" onclick="moveSlide(-1)">&#10094;</button>
                <div class="card-container">
                    <?php foreach ($products as $product): ?>
                    <div class="card">
                        <img src="<?php echo htmlspecialchars('/login/uploaded_img/' . basename($product['image'])); ?>" alt="Food Image">
                        <div class="card-content">
                            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            <label>$<?php echo number_format($product['price'], 2); ?></label>
                            <p><?php echo htmlspecialchars($product['discription']); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <button class="slider-btn right" onclick="moveSlide(1)">&#10095;</button>
            </div>
        </div>

    </section>


 <div class="gallerymain">

    <div class="gallery">
        <div class="gallery-content">
            <img src="../images/gallery1.jpg">
            <img src="../images/gallery2.jpg">
            <img src="../images/gallery3.jpg">
            <img src="../images/gallery4.jpg">
            <img src="../images/gallery8.jpg">
            <img src="../images/gallery5.jpg">
            <img src="../images/gallery6.jpg">
            <img src="../images/gallery7.jpg">
            

        </div>

    </div>

 </div>
 

    <!-- Speciality Section -->
    <div class="aboutusMain">
        <div class="aboutus">
            <section id="aboutus" class="speciality">
                <h1 class="heading" data-value="About Us">About Us</h1>
                <div class="box-container">
                    <div class="content reveal">
                        <p>We are a CASAMATA restaurant in Los Angeles' Arts District serving contemporary cuisine rooted in Mexican culture. Inspired by the Pacific coasts' culinary traditions, while celebrating seasonal Californian produce. Damian's beverage program focuses on artisanal spirits and mirrors its cuisine, letting the high-quality ingredients shine.</p>
                    </div>
                </div>
            </section>
        </div>
    </div>

    



    <footer>
        <?php
        
        include_once 'footer.php';

        ?>
    </footer>



    <script src="../js/home.js"></script>

</script>
</body>
</html>
