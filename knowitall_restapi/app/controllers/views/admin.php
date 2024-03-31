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
                <img src="/media/do-you-know-it-all.png" alt="logo" width="150" height="70">
            </a>
        </div>
        <div class="col-3 d-flex flex-nowrap justify-content-end">
            <a class="nav-link py-3 px-3" href="#">exit</a>

            <div class="dropstart">
                <a class="nav-link" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/media/user_icon_noshadow.png" height="70" alt="icon">
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

<main class="">
    <ul class="nav nav-pills">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Quizzes</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Manage Quizzes</a></li>
                <li><a class="dropdown-item" href="#">Manage Levels</a></li>
                <li><a class="dropdown-item" href="#">Manage Topics</a></li>
            </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="#" role="button">Users</a></li>
        <li class="nav-item"><a class="nav-link" href="#" role="button">Flags</a></li>
        <span>admin: Andy Rodriguez</span>
    </ul>

    <div>
        <div class="d-flex justify-content-center"><h3 class="round-font">Quizzes</h3></div>

        <div class="btn-group p-4">
            <button type="button" class="btn dropdown-toggle" style="width: 120px;" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="round-font">all topics</span>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something</a></li>
            </ul>
        </div>

    <table class="table table-success table-striped">
        <thead>
        <tr>
            <th scope="col" class="round-font">Name</th>
            <th scope="col" class="round-font">Topic</th>
            <th scope="col" class="round-font">Level</th>
            <th scope="col" class="round-font">Nr questions</th>
            <th scope="col" class="round-font">Nr flags</th>
            <th scope="col" class="round-font">Nr players</th>
            <th scope="col" class="round-font">action</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        <tr>
            <td>quiz name</td>
            <td>topic</td>
            <td>level</td>
            <td>10</td>
            <td>2</td>
            <td>96</td>
            <td>
                <div class="btn-group" role="group" aria-label="buttons">
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </td>
        </tr>
        <tr>
            <td>quiz name</td>
            <td>topic</td>
            <td>level</td>
            <td>10</td>
            <td>2</td>
            <td>96</td>
            <td>
                <div class="btn-group" role="group" aria-label="buttons">
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </td>
        </tr>
        <tr>
            <td>quiz name</td>
            <td>topic</td>
            <td>level</td>
            <td>10</td>
            <td>2</td>
            <td>96</td>
            <td>
                <div class="btn-group" role="group" aria-label="buttons">
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </td>
        </tr>
        <tr>
            <td>quiz name</td>
            <td>topic</td>
            <td>level</td>
            <td>10</td>
            <td>2</td>
            <td>96</td>
            <td>
                <div class="btn-group" role="group" aria-label="buttons">
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </td>
        </tr>
        <tr>
            <td>quiz name</td>
            <td>topic</td>
            <td>level</td>
            <td>10</td>
            <td>2</td>
            <td>96</td>
            <td>
                <div class="btn-group" role="group" aria-label="buttons">
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
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

    .dropdown-menu {
        background-color: #A8DF7D;

        a {
            color: #47008F;
            text-decoration: underline;
            font-weight: bold;
        }

        h5 {
            color: #A8DF7D;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
        }

        .dropdown-item:hover {
            background-color: #B590DA;
            color: #A8DF7D;
        }
    }

    #footer {
        background-color: #B590DA;

        span {
            color: #47008F;
            font-weight: bold;
            font-size: 13px;
        }
    }

    .round-font {
        font-family: "Chewy", system-ui;
    }

    body {
        font-family: 'Quicksand', sans-serif;
        background-color: #D6C8E4;
        padding-bottom: 20px;
    }

    .btn{
        border-radius: 18px;
        background-color: #B590DA;
        border-color: #A8DF7D;
        border-width: 2px;
        color: #A8DF7D;
        font-size: 18px;

        span{
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
        }
    }

    .btn:hover, .btn:focus{
        background-color: #A8DF7D;
        border-color: #47008F;
        border-width: 2px;
        color: #47008F;

        span{
            text-shadow: -1px -1px 0 #A8DF7D,
            1px -1px 0 #A8DF7D,
            -1px 1px 0 #A8DF7D,
            1px 1px 0 #A8DF7D !important;
        }

    }

    h3{
        color: #A8DF7D;
        text-shadow: -1px -1px 0 black,
        1px -1px 0 #47008F,
        -1px 1px 0 #47008F,
        1px 1px 0 black !important;
        font-weight: bolder;
    }

    table{
        thead{
            th{
                color: #47008F !important;
                font-weight: normal;
                text-shadow: -1px -1px 0 #A8DF7D,
                1px -1px 0 #A8DF7D,
                -1px 1px 0 #A8DF7D,
                1px 1px 0 #A8DF7D !important;
            }
        }
    }
</style>