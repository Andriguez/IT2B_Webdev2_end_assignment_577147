<?php
namespace Controllers;

use Services\QuizService;

class QuizController extends Controller
{
    private QuizService $quizService;

    public function __construct()
    {
        $this->quizService = new QuizService();
    }

    public function getAll()
    {
        $offset = NULL;
        $limit = NULL;

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $quizzes = $this->quizService->getAllQuizzes($offset, $limit);

        $this->respond($quizzes);
    }

    public function getOne($id)
    {
        $quiz = $this->quizService->getQuizById($id);

        if (!$quiz) {
            $this->respondWithError(404, "Quiz not found");
            return;
        }

        $this->respond($quiz);
    }
}