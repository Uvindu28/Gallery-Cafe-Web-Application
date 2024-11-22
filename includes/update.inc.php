<?php
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
        }else{

            $id = $_SESSION['id'];
            $query = mysqli_query($conn,"SELECT * FROM customer WHERE id='$id'");

            while($result = mysqli_fetch_assoc($query)){
                $res_uname = $result['Uname'];
                $res_email = $result['email'];
            }
        }
