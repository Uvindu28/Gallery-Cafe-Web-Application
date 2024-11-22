
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        *{
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        :root{
            /* ===colors=== */
            --body-color: #E4E9F7;
            --sidebar-color:#fff;
            --primary-color:#695cfe;
            --primary-color-light:#f6f5ff;
            --toggle-color:#ddd;
            --text-color:#707070;

            /* ===transition===*/
            --tran-02: all 0.2s ease;
            --tran-03: all 0.3s ease;
            --tran-04: all 0.4s ease;
            --tran-05: all 0.5s ease;
        }

        body{
            height: 100vh;
            background: var(--body-color);
            transition: var(--tran-04);
        }

        body.dark{
            --body-color: #18191a;
            --sidebar-color:#242526;
            --primary-color:#3a3b3c;
            --primary-color-light:#3a3b3c;
            --toggle-color:#fff;
            --text-color:#ccc;
        }

        /*===sidebr===*/
        .sidebar{
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            padding: 10px 14px;
            background: var(--sidebar-color);
            transition: var(--tran-05);
        }

        .sidebar.close{
            width: 88px;
        }

        .sidebar .text{
            font-size: 16px;
            font-weight: 500;
            color: var(--text-color);
            transition: var(--tran-03);
            white-space: nowrap;
            opacity: 1;
        }

        .sidebar.close .text{
            opacity: 0;

        }

        .sidebar .image{
            min-width: 60px;
            display: flex;
            align-items: center;
        }

        

        .sidebar li{
            height: 50px;
            margin-top: 10px;
            list-style: none;
            display: flex;
            align-items: center;
        }

        .sidebar li .icon{
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 60px;
            font-size: 20px;
        }

        .sidebar li .icon,
        .sidebar li .text{
            color: var(--text-color);
            transition: var(--tran-02);
        }

        .sidebar header{
            position: relative;

        }

        .sidebar .image-text img{
            width: 40px;
            border-radius: 6px;
        }

        .sidebar header .image-text{
            display: flex;
            align-items: center;
        }

        header .image-text .header-text{
            display: flex;
            flex-direction: column;
        }

        .header-text .name{
            font-weight: 600;
        }

        .sidebar header .toggle{
            position: absolute;
            top: 50%;
            right: -25px;
            transform: translateY(-50%) rotate(180deg);
            height: 25px;
            width: 25px;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50px;
            color: var(--sidebar-color);
            font-size: 22px;
            transition: var(--tran-03);

        }

        .sidebar.close header .toggle{
            transform: translateY(-50%);
        }

        body.dark .sidebar header .toggle{
            transform: rotate(180deg);
            color: var(--text-color);
        }

        .sidebar .search-box{
            background-color: var(--primary-color-light);
            border-radius: 6px;
            transition: var(--tran-05);
        }

        .sidebar li a{
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            text-decoration: none;
            border-radius: 6px;
            transition: var(--tran-04);
        }

        .sidebar li a:hover{
            background: var(--primary-color);

        }

        .sidebar li a:hover .icon,
        .sidebar li a:hover .text{
            color: var(--sidebar-color);

        }

        body.dark .sidebar li a:hover .icon,
        body.dark .sidebar li a:hover .text{
            color: var(--text-color);

        }

        .sidebar .menu-bar{
            height: calc(100% - 50px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-top: 20px;
        }

        .menu-bar .mode{
            position: relative;
            border-radius: 6px;
            background: var(--primary-color-light);
        }

        .menu-bar .mode .moon-sun{
            height: 50px;
            width: 60px;
            display: flex;
            align-items: center;

        }

        .menu-bar .mode i{
            position: absolute;
            transition: var(--tran-03);
        }

        .menu-bar .mode i.sun{
            opacity: 0;
        }

        body.dark .menu-bar .mode i.sun{
            opacity: 1;
        }

        body.dark .menu-bar .mode i.moon{
            opacity: 0;
        }

        .menu-bar .mode .toggle-switch{
            position: absolute;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            min-width: 60px;
            cursor: pointer;
            border-radius: 6px;
            background: var(--primary-color-light);
        }

        .toggle-switch .switch{
            position: relative;
            height: 22px;
            width: 44px;
            background: var(--toggle-color);
            border-radius: 25px;
        }

        .switch::before{
            content: '';
            position: absolute;
            height: 15px;
            width: 15px;
            border-radius: 50%;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            background: var(--sidebar-color);
            transition: var(--tran-03);
        }

        body.dark .switch::before{
            left: 24px;
        }


    </style>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../images/chef-restaurant5078.logowik.com.webp" alt="logo">
                </span>
                <div class="text header-text">
                    <span class="name">Admin</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="admin_page.php">
                            <i class='bx bxs-bowl-hot icon'></i>
                            <span class="text nav-text">Products</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="category.php">
                            <i class='bx bx-category icon'></i>
                            <span class="text nav-text">Category</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="staff.php">
                            <i class='bx bx-child icon'></i>
                            <span class="text nav-text">Staff</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="tableReservations.php">
                            <i class='bx bx-table icon'></i>
                            <span class="text nav-text">Table Resavations</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
                <li class="mode">
                    <div class="moon-sun">
                            <i class='bx bx-moon icon moon'></i>
                            <i class='bx bx-sun icon sun'></i>
                    </div>
                        <span class="mode-text text">Dark mode</span>
                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                </li>
            </div>
        </div>
    </nav>

    </div>
    <script>
        const body = document.querySelector("body"),
                sidebar = body.querySelector(".sidebar"),
                toggle = body.querySelector(".toggle"),
                searchbtn = body.querySelector(".search-box"),
                modeswitch = body.querySelector(".mode"),
                modeText = body.querySelector(".mode-text");

                toggle.addEventListener("click", ()=>{
                    sidebar.classList.toggle("close");
                });
                modeswitch.addEventListener("click", ()=>{
                    body.classList.toggle("dark");
                });

                if(body.classList.contains("dark")){
                    modeText.innerText = "Light mode";
                }else{
                    modeText.innerText = "Dark mode";
                }
    </script>
</body>
</html>