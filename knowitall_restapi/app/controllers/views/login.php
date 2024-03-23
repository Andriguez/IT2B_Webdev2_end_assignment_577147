<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Chewy&display=swap" rel="stylesheet">
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
        </div>
    </div>
    </div>
</nav>

<main style="text-align: center">
    <img class="py-2" src="/media/do-you-know-it-all.png" width="30%" height="15%">
    <div class="container d-flex justify-content-center" style="width: 700px">
        <form>
            <div class="form-floating py-2">
                <input type="text" class="form-control" id="floatingInput" placeholder="@username">
                <label for="floatingInput">username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">password</label>
            </div>

            <div class="container d-flex justify-content-center flex-nowrap">
                <a class="nav-link py-4 px-3" type="submit" style="font-size: 27px">login</a>
                <a class="nav-link py-4 px-3" href="#" style="font-size: 27px">sign up</a>
            </div>
        </form>
    </div>

</main>

<div id="footer" class="d-flex justify-content-end fixed-bottom">
    <span class="mx-3">design + coded by Andy Rodriguez© - 577147</span>
</div>

</body>
</html>
<style>
    .navbar {
        background-color: #B590DA;
    }

    .nav-link {
        font-weight: bolder;
        font-size: 20px;
        color: #47008F;
        text-decoration: underline;
    }

    .nav-link:hover {
        color: #A8DF7D;
        text-shadow: -1px -1px 0 #47008F,
        1px -1px 0 #47008F,
        -1px 1px 0 #47008F,
        1px 1px 0 #47008F !important;
    }

    #footer {
        background-color: #B590DA;

        span {
            color: #47008F;
            font-weight: bold;
            font-size: 13px;
        }
    }

    .form-floating, .form-floating:focus{
        width: 300px;

        input{
            height: 15px;
            border-radius: 25%;
            background-color: #B590DA;
        }

        label{
            color: #A8DF7D;
            font-weight: bold;
            font-size: 20px;
        }
    }

    body {
        font-family: 'Quicksand', sans-serif;
        background-color: #D6C8E4;
    }
</style>