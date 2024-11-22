<?php

include_once '../includes/db.inc.php';
include_once '../includes/functions.inc.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $foodname = mysqli_real_escape_string($conn, $_POST['product_name']);
    $price = $_POST['product_price'];
    $discription = $_POST['product_dis'];
    $image = $_FILES['product_image']['name'];
    $image_size = $_FILES['product_image']['size'];
    $image_tmp_name = $_FILES['product_image']['tmp_name'];
    $image_folder ='C:/xampp/htdocs/login/uploaded_img/' . $image;

    if (!is_dir('C:/xampp/htdocs/login/uploaded_img/')) {
        mkdir('C:/xampp/htdocs/login/uploaded_img/', 0777, true);
    }

    $imageFileType = strtolower(pathinfo($image_folder, PATHINFO_EXTENSION));
    $check = getimagesize($image_tmp_name);
    $uploadOk = 1;
if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    } elseif ($image_size > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    } elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
       
        $select_product_name = mysqli_query($conn, "SELECT name FROM cart WHERE name = '$foodname'") or die('Query failed');

        if (mysqli_num_rows($select_product_name) > 0) {
            echo "Product name already added.";
        } else {
            // Add product to database
            if (addProduct($conn, $foodname, $price, $discription, $image_folder)) {
                // Move uploaded file
                if (move_uploaded_file($image_tmp_name, $image_folder)) {
                   header('Location:../html/admin_page.php');
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Error adding product to database.";
            }
        }
    }
}


function addProduct($conn, $foodname, $price, $discription, $image_path) {
    $stmt = $conn->prepare("INSERT INTO cart (name, price, discription, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $foodname, $price, $discription, $image_path);
    return $stmt->execute();
}

function getProducts($conn, $search = '', $category = '') {
    $sql = "SELECT * FROM cart WHERE 1=1";
    
    if (!empty($search)) {
        $sql .= " AND name LIKE ?";
        $search = "%$search%";
    }
    
    if (!empty($category)) {
        $sql .= " AND category = ?";
    }
    
    $stmt = $conn->prepare($sql);
    
    if (!empty($search) && !empty($category)) {
        $stmt->bind_param('ss', $search, $category);
    } elseif (!empty($search)) {
        $stmt->bind_param('s', $search);
    } elseif (!empty($category)) {
        $stmt->bind_param('s', $category);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    
    $products = array();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    
    return $products;
}


?>



































