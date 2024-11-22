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
    <title>Card Slider</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .slider-wrapper {
            position: relative;
            overflow: hidden;
            max-width: 1200px;
            margin: 0 auto;
        }
        .card-container {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .card {
            min-width: 250px;
            margin: 10px;
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
            font-family: "Mate", serif;
        }
        .card-content label {
            display: block;
            color: #666;
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        .slider-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
        .slider-btn.left {
            left: 10px;
        }
        .slider-btn.right {
            right: 10px;
        }
        .slider-btn:disabled {
            background-color: rgba(0, 0, 0, 0.2);
            cursor: not-allowed;
        }
    </style>
</head>
<body>
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
                    <a href="edit.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn edit-btn"><i class='bx bxs-edit'></i></a>
                    <a href="includes/deleteFood.inc.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn delete-btn"><i class='bx bx-x'></i></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <button class="slider-btn right" onclick="moveSlide(1)">&#10095;</button>
    </div>

    <script>
    let currentIndex = 0;
    const slides = document.querySelectorAll('.card-container .card');
    const totalSlides = slides.length;
    const slideWidth = slides[0].clientWidth + 20; // include gap between cards
    const cardContainer = document.querySelector('.card-container');
    const leftButton = document.querySelector('.slider-btn.left');
    const rightButton = document.querySelector('.slider-btn.right');
    let intervalId;

    function updateButtons() {
        leftButton.disabled = currentIndex === 0;
        rightButton.disabled = currentIndex === totalSlides - 1;
    }

    function moveSlide(step) {
        currentIndex += step;
        if (currentIndex < 0) {
            currentIndex = totalSlides - 1; // loop to end if at the beginning
        } else if (currentIndex >= totalSlides) {
            currentIndex = 0; // loop to beginning if at the end
        }
        cardContainer.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        updateButtons();
    }

    function autoplaySlides() {
        intervalId = setInterval(() => {
            moveSlide(1); // move to the next slide
        }, 3000); // adjust timing as needed (3000ms = 3 seconds)
    }

    // Start autoplay
    autoplaySlides();

    // Pause autoplay on mouseover
    cardContainer.addEventListener('mouseenter', () => {
        clearInterval(intervalId);
    });

    // Resume autoplay on mouseout
    cardContainer.addEventListener('mouseleave', () => {
        autoplaySlides();
    });
</script>

</body>
</html>
