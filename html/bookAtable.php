<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            outline: none; border:none;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        body{
            background: #e4e9f7;
        }

        .container{
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding:20px;
            padding-bottom: 60px;
            background: #eee;
        }

        .container form{
            padding:20px;
            border-radius: 20px;
            box-shadow: 0 5px 10px rgba(0,0,0,.1);
            background: #fff;
            text-align: center;
            width: 500px;
        }

        .container form h3{
            font-size: 30px;
            text-transform: uppercase;
            margin-bottom: 10px;
            color:#333;
        }
        .container form input,
        .container button{
            width: 100%;
            padding:10px 15px;
            font-size: 17px;
            margin:8px 0;
            background: #eee;
            border-radius: 5px;
            color:black;
            text-transform: capitalize;
            font-size: 20px;
            cursor: pointer;
        }

        .container button:hover{
        background: #ffba08;
        color:#fff;
        }

        .container form p{
        margin-top: 10px;
        font-size: 20px;
        color:#333;
        }

        .container form p a{
        color:#ffba08;
        }

    </style>
</head>
<body>

    <div id="form" class="container">
        <form name="form" method="POST" action="../includes/bookAtable.inc.php">
           <h3>Book A Table</h3>
           <input type="text" name="name" placeholder="Name">
           <input type="email" name="email" placeholder="Email">
           <input type="number" name="phone" placeholder="Phone number">
           <input type="date" name="date" placeholder="Booking date">
           <input type="time" name="time" placeholder="Time">
           <input type="number" name="adults" placeholder="Number of Adults">
           <input type="number" name="children" placeholder="Number of Children">
           <button type="submit" name="submit" value="Booking">Reserve</button>
        </form>       
    </div>
    
</body>
</html>