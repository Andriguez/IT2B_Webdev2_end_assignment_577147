<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://font s.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
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
    <div id="timer-container" class="px-4 py-2">
        <span id="correct-text" class="round-font">That's Correct</span>/<span id="incorrect-text" class="round-font">That's incorrect</span>
        <span id="timer" class="round-font">01:38</span>
    </div>

    <div id="question-container" class="d-flex justify-content-center">
        <span class="round-font" id="question">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam?</span>
    </div>
    <div id="answers-container" class="container d-flex flex-wrap justify-content-center">
        <button class="answer correct-answer"><span class="round-font">Lorem ipsum dolor sit amet, consectetur</span>
        </button>
        <button class="answer wrong-correct-answer"><span class="round-font">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
        </button>
        <button class="answer wrong-answer"><span class="round-font">Lorem dolor sit amet, consectetur adipiscing</span>
        </button>
    </div>


</main>

<div class="overlay-container">
<div class="container round-font" id="result-container">
    <span id="result-text-correct">congratulations!!</span>
    <span id="result-text-incorrect">better luck next time,</span>

    <span id="player-name">player</span>
    <div id="results-div" class="m-3">
        <div class="result">
            <span class="result-title">playtime</span>
            <span class="result-content-correct">01:40</span>
        </div>
        <div class="result">
            <span class="result-title">ranking</span>
            <span class="result-content-incorrect">#5</span>
        </div>
        <div class="result">
            <span class="result-title">correct answers</span>
            <span class="result-content-correct">19/20</span>
        </div>
    </div>
        <button><span class="round-font">quiz more</span></button>

</div>
<div id="footer" class="d-flex justify-content-end fixed-bottom">
    <span class="mx-3">design + coded by Andy Rodriguez© - 577147</span>
</div>
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

    #timer-container {
        text-align: center;

        #timer {
            font-size: 30px;
            color: #A8DF7D;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
            float: right;
        }

        #correct-text {
            color: #A8DF7D;
            font-size: 35px;
            text-transform: uppercase;
            font-weight: bold;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
        }

        #incorrect-text {
            color: #D96976;
            font-size: 35px;
            text-transform: uppercase;
            font-weight: bold;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
        }
    }

    #question-container {
        max-width: 600px;
        margin: auto;
        justify-content: center;
        text-align: center;

        #question {
            font-size: 25px;
            color: #47008F;
            text-shadow: -1px -1px 0 #B590DA,
            1px -1px 0 #B590DA,
            -1px 1px 0 #B590DA,
            1px 1px 0 #B590DA !important;
        }
    }

    #answers-container {

        padding: 20px;

        .answer {
            padding: 7px;
            margin: 5px;
            background-color: #B590DA;
            border: solid 3px #47008F;
            border-radius: 16px;
            height: 250px;
            width: 300px;

            font-size: 22px;
            color: #D6C8E4;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
        }

        .selected-answer {
            border: solid 6px #47008F;
            background-color: #A66EDF;
        }

        .correct-answer {
            border: solid 6px #458315;
            background-color: #A8DF7D;

            span {
                color: #C6E3B0;
                text-shadow: -1px -1px 0 #306407,
                1px -1px 0 #306407,
                -1px 1px 0 #306407,
                1px 1px 0 #306407 !important;
            }
        }

        .wrong-correct-answer {
            border: solid 3px #47008F;
            background-color: #BDDAA6;

            span {
                color: #A8DF7D;

                text-shadow: -1px -1px 0 #306407,
                1px -1px 0 #306407,
                -1px 1px 0 #306407,
                1px 1px 0 #306407 !important;
            }
        }

        .wrong-answer {
            border: solid 6px #860A18;
            background-color: #D96976;

            span {
                color: #DE8590;
                text-shadow: -1px -1px 0 #6B0511,
                1px -1px 0 #6B0511,
                -1px 1px 0 #6B0511,
                1px 1px 0 #6B0511 !important;
            }
        }

        .answer:hover {
            border: solid 4px #47008F;
        }
    }

    body {
        font-family: 'Quicksand', sans-serif;
        background-color: #D6C8E4;
        padding-bottom: 20px;
    }

    #result-container{
        background-color: #B590DA;
        border: solid 3px #47008F;
        border-radius: 16px;
        padding: 20px;
        text-align: center;
        max-width: 600px;
        opacity: 95%;
        button{
            border-radius: 16px;
            background-color: #47008F;
            color: white;
            border-color: white;
            padding: 2px 20px 2px 20px;
        }

        button:hover{
            background-color: white;
            color: #47008F;
            border-color: #47008F;
        }

        #result-text-correct{
            color: #A8DF7D;
            font-size: 25px;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
        }

        #result-text-incorrect{
            color: #D96976;
            font-size: 25px;
            text-shadow: -1px -1px 0 #47008F,
            1px -1px 0 #47008F,
            -1px 1px 0 #47008F,
            1px 1px 0 #47008F !important;
        }

        #player-name{
            font-size: 30px;
            color: #47008F;
            text-shadow: -1px -1px 0 white,
            1px -1px 0 white,
            -1px 1px 0 white,
            1px 1px 0 white !important;
        }

        #results-div{
            .result{
                .result-title{
                    font-size: 20px;
                    color: #47008F;
                    text-shadow: -1px -1px 0 white,
                    1px -1px 0 white,
                    -1px 1px 0 white,
                    1px 1px 0 white !important;
                }
                .result-content-correct{
                    color: #A8DF7D;
                    font-size: 25px;
                    text-shadow: -1px -1px 0 #47008F,
                    1px -1px 0 #47008F,
                    -1px 1px 0 #47008F,
                    1px 1px 0 #47008F !important;
                }

                .result-content-incorrect{
                    color: #D96976;
                    font-size: 25px;
                    text-shadow: -1px -1px 0 #47008F,
                    1px -1px 0 #47008F,
                    -1px 1px 0 #47008F,
                    1px 1px 0 #47008F !important;
                }
            }
        }
    }

    .overlay-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.5); /* semi-transparent overlay */
        z-index: 9999; /* Ensure it appears above other elements */
    }
</style>