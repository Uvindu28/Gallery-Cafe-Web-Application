<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <style>
        @font-face {
            font-family: Mak;
            src: url(font/Mak.otf);
        }
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            justify-content: space-between;
            margin: 0;
        }

        footer {
            width: 100%;
            background: #343a40;
            padding: 20px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        footer .social-icons,
        footer .menu {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0;
        }

        footer .social-icons li,
        footer .menu li {
            list-style: none;
            margin: 0 10px;
        }

        footer .social-icons li a,
        footer .menu li a {
            font-size: 2em;
            color: #fff;
            display: inline-block;
            transition: transform 0.5s;
        }

        footer .social-icons li a:hover,
        footer .menu li a:hover {
            transform: translateY(-5px);
        }

        footer p {
            font-family: "Mak";
            text-transform: lowercase;
            font-size: 1em;
            margin-top: 15px;
            margin-bottom: 10px;
        }

        footer p span {
            font-weight: 1000;
        }
    </style>

</head>
<body>

    <footer>
        <ul class="social-icons">
            <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
        </ul>
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="#">Teams</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <p>The gallery <span>Café</span></p>
    </footer>
    

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    
</body>
</html>