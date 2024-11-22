<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre Loader</title>
    <style>
        #preloader {
            background: #000000 url(../images/preloader.gif) no-repeat center;
            background-size: 35%;
            height: 100vh;
            width: 100%;
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1100; 
        }


        .fade-out {
        transition: opacity 1s ease; 
        opacity: 0;
        }
    </style>
</head>
<body>
    <div id="preloader"></div>

    <script>
       function hidePreloader() {
        var preloader = document.getElementById("preloader");
        preloader.classList.add("fade-out"); 
        setTimeout(function() {
            preloader.style.display = "none"; 
        }, 1000); 
    }

    setTimeout(hidePreloader, 3000);
    </script>
</body>
</html>
