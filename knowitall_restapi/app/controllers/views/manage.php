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
    </ul>

    <div>
        <div class="d-flex justify-content-center"><h3 class="round-font">Quizzes</h3></div>

        <div class="container">
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName">
            </div>
            <div class="col-md-2">
                <label for="inputState" class="form-label">Topic</label>
                <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputState" class="form-label">Level</label>
                <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>


            <div class="col-md-2">
            <label for="quantity" class="form-label">Nr questions</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="20">
            </div>

            <div class="d-flex justify-content-center"><h5 class="round-font">questions</h5></div>

            <div class="d-flex flex-nowrap">
                <div class="col-md-6 mb-3 me-3">
                <label for="exampleFormControlTextarea1" class="form-label">Question Text</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
            </div>

            <div class="col-md-6">
                <label class="round-font">ANSWERS</label>
            <div class="input-group">
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox">
                </div>
                <label>*select the checkbox of the correct answer</label>
            </div></div>
            </div>

            <div class="d-flex flex-nowrap">
                <div class="col-md-6 mb-3 me-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Question Text</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                </div>

                <div class="col-md-6">
                    <label class="round-font">ANSWERS</label>
                    <div class="input-group">
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox">
                        </div>
                        <label>*select the checkbox of the correct answer</label>
                    </div></div>
            </div>

            <div class="d-flex flex-nowrap">
                <div class="col-md-6 mb-3 me-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Question Text</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                </div>

                <div class="col-md-6">
                    <label class="round-font">ANSWERS</label>
                    <div class="input-group">
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox">
                        </div>
                        <label>*select the checkbox of the correct answer</label>
                    </div></div>
            </div>
            <div class="col-12 mb-4">
                <button type="submit" class="btn">Save</button>
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

    h3, h5{
        color: #A8DF7D;
        text-shadow: -1px -1px 0 black,
        1px -1px 0 #47008F,
        -1px 1px 0 #47008F,
        1px 1px 0 black !important;
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

    .nav{

        span{
            float: right !important;
        }
    }
</style>