<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #e4e9f7;
        }

        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            padding-bottom: 60px;
            background: #eee;
        }

        .container form {
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            background: #fff;
            text-align: center;
            width: 500px;
        }

        .container form h3 {
            font-size: 30px;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #333;
        }

        .container form input,
        .container button {
            width: 100%;
            padding: 10px 15px;
            font-size: 17px;
            margin: 8px 0;
            background: #eee;
            border-radius: 5px;
            color: black;
            font-size: 20px;
            cursor: pointer;
        }

        .container button:hover {
            background: #ffba08;
            color: #fff;
        }

        .container form p {
            margin-top: 10px;
            font-size: 20px;
            color: #333;
        }

        .container form p a {
            color: #ffba08;
        }

        .container form .error-msg {
            margin: 10px 0;
            display: block;
            background: green;
            color: #fff;
            border-radius: 5px;
            font-size: 20px;
            padding: 10px;
        }

    </style>
</head>
<body>

    <div id="form" class="container">
    <?php 
    include '../includes/db.inc.php';

    // Initialize variables to avoid undefined variable error
    $res_uname = '';
    $res_email = '';

    if(isset($_POST['submit'])){
        $username = $_POST['Name'];
        $email = $_POST['Email'];

        $id = $_SESSION['id'];

        $edit_query = mysqli_query($conn,"UPDATE customer SET Uname='$username', Email='$email' WHERE id='$id'") or die("error occurred");

        if($edit_query){
            echo "<script>alert('Profile Updated!');</script>
                <div class='message'>
                    <p>Profile Updated!</p>
                    <a href='user.php'><button class='BackBtn'>Go Back</button></a>
                </div> <br>";
        }
    } else {
        $id = $_SESSION['id'];
        $query = mysqli_query($conn,"SELECT * FROM customer WHERE id='$id'");

        if($result = mysqli_fetch_assoc($query)){
            $res_uname = $result['Uname'];
            $res_email = $result['Email'];
        } else {
            echo "<div class='error-msg'>Customer not found!</div>";
        }
    }
    ?>
        <form name="form" method="POST" action="">
           <h3>Edit</h3>
           <input type="text" name="Name" value="<?php echo htmlspecialchars($res_uname); ?>" placeholder="Name">
           <input type="email" name="Email" value="<?php echo htmlspecialchars($res_email); ?>" placeholder="Email">
           <button type="submit" name="submit" value="Update">Update</button>
        </form>       
    </div>
    
</body>
</html>
