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
            <a class="nav-link py-3 px-2" href="#">Quiz me</a>

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

<main>

    <div class="profile p-3 m-2 d-flex flex-nowrap">
        <div>
        <img src="/media/user-profile-img.png">
        </div>
        <div>
        <span id="player-name" class="round-font">Player Name</span>
        <span id="player-user-name" class="">@username</span>

            <div class="container details d-flex flex-wrap">
            <div class="detail d-flex flex-wrap">
                <span class="detail-title"><br>ranking</span>
                <span class="detail-content round-font">#7</span>
            </div>
            <div class="detail d-flex flex-wrap">
                <span class="detail-title"><br>average</span>
                <span class="detail-content round-font">75%</span>
            </div>
            <div class="detail d-flex flex-wrap">
                <span class="detail-title"><br>playtime</span>
                <span class="detail-content round-font">10:00</span>
            </div>
            <div class="detail d-flex flex-wrap">
                <span class="detail-title" style="font-size: 15px;">quizzes played</span>
                <span class="detail-content round-font">15</span>
            </div>
        </div>
        </div>
    </div>

    <nav class="nav px-3 py-2">
        <a class="round-font tab-selected p-2" aria-current="page" href="#">history</a>
        <a class="round-font tab p-2" href="#">favorites</a>
    </nav>

    <div class="container d-flex flex-wrap justify-content-center">
        <div class="card">
            <div class="card-header">
                <span class="quiz-name">quizz name</span>
                <span class="quiz-topic">#topic</span>
            </div>
            <div class="card-body d-flex flex-nowrap justify-content-center">
                <div class="quiz-detail">
                    <h5 class="card-title"><br>level</h5>
                    <p class="card-text round-font">hard</p>
                </div>
                <div class="quiz-detail">
                    <h5 class="card-title">global average</h5>
                    <p class="card-text round-font">30%</p>
                </div>
                <div class="quiz-detail">
                    <h5 class="card-title">times answered</h5>
                    <p class="card-text round-font">36</p>
                </div>
                <div class="quiz-detail"><a href="#" class="btn btn-primary">▶</a></div>

            </div>
            <div class="card-footer d-flex justify-content-end">
                <label>last modified </label>
                <span>23/03/24</span>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <span class="quiz-name">quizz name</span>
                <span class="quiz-topic">#topic</span>
            </div>
            <div class="card-body d-flex flex-nowrap justify-content-center">
                <div class="quiz-detail">
                    <h5 class="card-title"><br>level</h5>
                    <p class="card-text round-font">hard</p>
                </div>
                <div class="quiz-detail">
                    <h5 class="card-title">global average</h5>
                    <p class="card-text round-font">30%</p>
                </div>
                <div class="quiz-detail">
                    <h5 class="card-title">times answered</h5>
                    <p class="card-text round-font">36</p>
                </div>
                <div class="quiz-detail"><a href="#" class="btn btn-primary">▶</a></div>

            </div>
            <div class="card-footer d-flex justify-content-end">
                <label>last modified </label>
                <span>23/03/24</span>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <span class="quiz-name">quizz name</span>
                <span class="quiz-topic">#topic</span>
            </div>
            <div class="card-body d-flex flex-nowrap justify-content-center">
                <div class="quiz-detail">
                    <h5 class="card-title"><br>level</h5>
                    <p class="card-text round-font">hard</p>
                </div>
                <div class="quiz-detail">
                    <h5 class="card-title">global average</h5>
                    <p class="card-text round-font">30%</p>
                </div>
                <div class="quiz-detail">
                    <h5 class="card-title">times answered</h5>
                    <p class="card-text round-font">36</p>
                </div>
                <div class="quiz-detail"><a href="#" class="btn btn-primary">▶</a></div>

            </div>
            <div class="card-footer d-flex justify-content-end">
                <label>last modified </label>
                <span>23/03/24</span>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <span class="quiz-name">quizz name</span>
                <span class="quiz-topic">#topic</span>
            </div>
            <div class="card-body d-flex flex-nowrap justify-content-center">
                <div class="quiz-detail">
                    <h5 class="card-title"><br>level</h5>
                    <p class="card-text round-font">hard</p>
                </div>
                <div class="quiz-detail">
                    <h5 class="card-title">global average</h5>
                    <p class="card-text round-font">30%</p>
                </div>
                <div class="quiz-detail">
                    <h5 class="card-title">times answered</h5>
                    <p class="card-text round-font">36</p>
                </div>
                <div class="quiz-detail"><a href="#" class="btn btn-primary">▶</a></div>

            </div>
            <div class="card-footer d-flex justify-content-end">
                <label>last modified </label>
                <span>23/03/24</span>
            </div>
        </div>
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

    .selected {
        color: #A8DF7D;
        text-shadow: -1px -1px 0 #47008F,
        1px -1px 0 #47008F,
        -1px 1px 0 #47008F,
        1px 1px 0 #47008F !important;
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

    .btn {
        border-radius: 18px;
        background-color: #B590DA;
        border-color: #A8DF7D;
        border-width: 2px;
        color: #A8DF7D;
        font-size: 18px;

        span {
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
        }
    }

    .btn:hover, .btn:focus {
        background-color: #A8DF7D;
        border-color: #47008F;
        border-width: 2px;
        color: #47008F;

        span {
            text-shadow: -1px -1px 0 #A8DF7D,
            1px -1px 0 #A8DF7D,
            -1px 1px 0 #A8DF7D,
            1px 1px 0 #A8DF7D !important;
        }

    }

    .card {
        width: 500px;
        margin: 10px;
        background-color: #BA9FD4;
        border-radius: 35px;
        height: 230px;

        .card-body {
            padding: 10px 10px 1px 10px;
        }

        .quiz-name {
            color: #A8DF7D;
            font-weight: bold;
            font-size: 30px;
        }

        .quiz-topic {
            color: #47008F;
            font-weight: bolder;
            font-size: 20px;
        }

        .card-text {
            font-size: 30px;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
            color: #A8DF7D;
        }

        .card-title {
            color: #47008F;
            font-weight: bold;
            font-size: 18px;
            max-width: 100px;
        }

        .quiz-detail {
            text-align: center;
            margin: 2px 10px 2px 10px;
        }

        .btn {
            width: 70px;
            height: 70px;
            font-size: 35px;
            padding: 7px 5px 5px 10px;
            border-radius: 50px;

            color: #47008F;
            background-color: #A8DF7D;
            border: solid 2px #47008F;
        }

        .btn:hover {
            color: #A8DF7D;
            background-color: #B590DA;
            border: solid 2px #A8DF7D;
        }

        .card-footer {
            label {
                font-size: 13px;
                color: #47008F;
            }

            span {
                font-size: 14px;
                margin-left: 5px;
                color: #A8DF7D;
                font-weight: bold;
            }
        }
    }

    .nav{
        .tab-selected, .round-font:hover{
            color: #A8DF7D;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
        }

        .round-font{
            font-size: 30px;
            text-decoration: none;
        }

        .tab{

            color: #B590DA;
            text-shadow: -1px -1px 0 #A8DF7D,
            1px -1px 0 #A8DF7D,
            -1px 1px 0 #A8DF7D,
            1px 1px 0 #A8DF7D !important;
        }
    }

    .profile{

        #player-name{
            font-size: 30px;
        }

        #player-user-name{
            font-size: 20px;
            font-weight: bold;
            color: #47008F;
        }
        .detail{
            max-width: 50px;
            padding: 1px 5px 1px 5px;
            margin: 1px 25px 1px 25px;
            justify-content: center;

            .detail-title{
                color: #47008F;
                font-weight: bold;
                font-size: 18px;
            }
            .detail-content{
                font-size: 30px;
                color: #A8DF7D;
                text-shadow: -1px -1px 0 #47008F,
                1px -1px 0 #47008F,
                -1px 1px 0 #47008F,
                1px 1px 0 #47008F !important;

            }
        }
    }

    body {
        font-family: 'Quicksand', sans-serif;
        background-color: #D6C8E4;
        padding-bottom: 20px;
    }
</style>