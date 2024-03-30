<?php
namespace Services;

use Repositories\QuizRepository;
class QuizService
{
    private QuizRepository $quizRepo;

    public function __construct()
    {
        $this->quizRepo = new QuizRepository();
    }

    public function getAllQuizzes($offset = NULL, $limit = NULL){ return $this->quizRepo->getAllQuizzes($offset, $limit); }
    public function getQuizzesByTopic($topicId, $offset = NULL, $limit = NULL){ return $this->quizRepo->getQuizzesByTopic($topicId, $offset, $limit); }
    public function getQuizById($Id){ return $this->quizRepo->getQuizById($Id); }

    public function getQuestions($quizId){ return $this->quizRepo->getQuestions($quizId); }

    public function getQuestionById($Id){ return $this->quizRepo->getQuestionById($Id); }

    public function getAnswers($questionId){ return $this->quizRepo->getAnswers($questionId); }

    public function getAnswerById($Id){ return $this->quizRepo->getAnswerById($Id); }

    public function getAllLevels(){ return $this->quizRepo->getAllLevels(); }

    public function getLevelById($Id){ return $this->quizRepo->getLevelById($Id); }

    public function getAllTopics(){ return $this->quizRepo->getAllTopics(); }

    public function getTopicById($Id){ return $this->quizRepo->getTopicById($Id); }
}