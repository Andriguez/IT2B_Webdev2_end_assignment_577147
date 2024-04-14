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
    public function editQuiz($quizId, $name, $topic, $level){ return $this->quizRepo->editQuiz($quizId, $name,$topic, $level); }
    public function createQuiz($name, $topic, $level){ return $this->quizRepo->createQuiz($name, $topic, $level); }
    public function deleteQuiz($quizId){ return $this->quizRepo->deleteQuiz($quizId); }
    public function updateNrPlayers($quizId){ $this->quizRepo->updateNrPlayers($quizId); }

    public function getQuestions($quizId){ return $this->quizRepo->getQuestions($quizId); }

    public function getQuestionById($Id){ return $this->quizRepo->getQuestionById($Id); }
    public function editQuestion($qId, $questionText){ return $this->quizRepo->editQuestion($qId, $questionText); }
    public function createQuestion($quizId, $questionText){ return $this->quizRepo->createQuestion($quizId, $questionText); }

    public function getAnswers($questionId){ return $this->quizRepo->getAnswers($questionId); }
    public function getAnswerById($Id){ return $this->quizRepo->getAnswerById($Id); }
    public function createAnswer($questionId, $answerText, $isCorrect){ return $this->quizRepo->createAnswer($questionId, $answerText, $isCorrect); }
    public function editAnswer($aId, $answerText, $isCorrect, $explanation){ return $this->quizRepo->editAnswer($aId, $answerText, $isCorrect, $explanation); }

    public function getAllLevels(){ return $this->quizRepo->getAllLevels(); }
    public function getLevelById($Id){ return $this->quizRepo->getLevelById($Id); }
    public function createLevel($name) { return $this->quizRepo->createLevel($name); }
    public function editLevel($id, $name) { return $this->quizRepo->editLevel($id,$name);}
    public function deleteLevel($id) { return $this->quizRepo->deleteLevel($id); }

    public function getAllTopics(){ return $this->quizRepo->getAllTopics(); }
    public function getTopicById($Id){ return $this->quizRepo->getTopicById($Id); }
    public function createTopic($name) { return $this->quizRepo->createTopic($name); }
    public function editTopic($id, $name) { return $this->quizRepo->editTopic($id,$name);}
    public function deleteTopic($id) { return $this->quizRepo->deleteTopic($id); }
}