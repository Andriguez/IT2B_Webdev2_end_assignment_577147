<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<nav class="navbar d-flex flex-nowrap py-1">
    <div class="container px-0">
        <div class="col-3 d-flex">
        </div>
        <div class="col-6 d-flex justify-content-center">
        <a class="navbar-brand py-0" href="#">
            <img src="/media/KNOW-IT-ALL_logo.png" alt="logo" width="100" height="70">
        </a>
        </div>
        <div class="col-3 d-flex flex-nowrap justify-content-end">
            <a class="nav-link py-3 px-5" href="#">Login</a>
            <a class="nav-link py-3 px-5" href="#">Admin</a>

            <div class="dropdown">
            <a class="nav-link" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/media/user_icon.png" height="70" alt="icon">
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><h5 class="px-3">Hello, Player</h5></li>
                <li><a class="dropdown-item" href="#">view profile</a></li>
                <li><a class="dropdown-item" href="#">edit profile</a></li>
                <li><a class="dropdown-item" href="#">log out</a></li>

            </ul>
            </div>
        </div>
    </div>
</nav>



</body>
</html>
<style>
.navbar{
    background-color: #B590DA;
}
.nav-link{
    font-weight: bolder;
    font-size: 20px;
    color: #47008F;
    text-decoration: underline;
}

.nav-link:hover{
    color: #A8DF7D;
    text-shadow:
            -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
}

.dropdown-menu{
    background-color: #A8DF7D;

    a{
        color: #47008F;
        text-decoration: underline;
        font-weight: bold;
    }

    h5{
        color: #A8DF7D;
        text-shadow:
                -1px -1px 0 #47008F,
                1px -1px 0 #47008F,
                -1px 1px 0 #47008F,
                1px 1px 0 #47008F !important;
    }

    .dropdown-item:hover{
        background-color: #B590DA;
    }
}
body{
    font-family: 'Quicksand', sans-serif;
    background-color: #D6C8E4;
}
</style>