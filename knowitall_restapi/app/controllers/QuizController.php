<?php
namespace Controllers;

use Services\FlagService;
use Services\QuizService;

class QuizController extends Controller
{
    private QuizService $quizService;
    private FlagService $flagService;

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

        $quizzesObjects = $this->quizService->getAllQuizzes($offset, $limit);

        if($this->getLoggedUser($this->checkForJwt())->getUsertype()->getId() === 1){
            $this->respond($this->quizToJsonAdmin($quizzesObjects));
        } else {
            $this->respond($this->quizToJSON($quizzesObjects));
        }

    }

    public function getQuizzesByTopic($topicId){
        $offset = NULL;
        $limit = NULL;

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $quizzesObjects = $this->quizService->getQuizzesByTopic($topicId, $offset, $limit);

        if($this->getLoggedUser($this->checkForJwt())->getUsertype()->getId() === 1){
            $this->respond($this->quizToJsonAdmin($quizzesObjects));
        } else {
            $this->respond($this->quizToJSON($quizzesObjects));
        }    }

    private function quizToJSON($inputArray){
        $quizzes = Array();

        foreach ($inputArray as $quizObject){
            $quiz = Array(
                'Id' => $quizObject->getId(),
                'name' => $quizObject->getName(),
                'nr_players' => $quizObject->getNrPlayers(),
                'avg_correct_answers' => $quizObject->getAverage(),
                'topic' => $quizObject->getTopic()->getName(),
                'level' => $quizObject->getLevel()->getName(),
                'mod_date' => $quizObject->getModDate()->format('d/m/y H:i'),
            );

            $quizzes[] = $quiz;
        }

        return $quizzes;
    }

    private function quizToJsonAdmin($inputArray){
        $quizzes = Array();
        $this->flagService = new FlagService();

        foreach ($inputArray as $quizObject){
            $quiz = Array(
                'Id' => $quizObject->getId(),
                'name' => $quizObject->getName(),
                'nr_players' => $quizObject->getNrPlayers(),
                'nr_questions' => count($quizObject->getQuestions()),
                'nr_flags' => $this->flagService->getCountFlagsByQuiz($quizObject->getId()),
                'topic' => $quizObject->getTopic()->getName(),
                'level' => $quizObject->getLevel()->getName(),
                'mod_date' => $quizObject->getModDate()->format('d/m/y H:i'),
            );

            $quizzes[] = $quiz;
        }

        return $quizzes;
    }

    public function getQuiz($id)
    {
        $quiz = $this->quizService->getQuizById($id);

        if (!$quiz) {
            $this->respondWithError(404, "Quiz not found");
            return;
        }

        $this->respond($quiz);
    }

    public function editQuiz($quizId){
        try{
            $json = file_get_contents('php://input');
            $data = json_decode($json);

            $name = $data->name;
            $topic = $data->topic;
            $level = $data->level;

            $quiz = $this->quizService->editQuiz($quizId, $name, $topic, $level);

            $this->respond($quiz);
        } catch (\Exception $e){
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function createQuiz(){

    }
    public function deleteQuiz($quizId){

    }

    public function editQuestion($qId){
        try{
            $json = file_get_contents('php://input');
            $data = json_decode($json);

            $questionText = $data->question;

            $this->respond($this->quizService->editQuestion($qId, $questionText));

        } catch (\Exception $e){
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function AddNewQuestion($quizId){
        try{
            $json = file_get_contents('php://input');
            $data = json_decode($json);

            $questionText = $data->question;
            $answers = $data->answers;
            $questionId = $this->quizService->createQuestion($quizId, $questionText);

            $results = [];
            foreach ($answers as $a){
                $results = $this->quizService->createAnswer($questionId, $a->text, $a->bool);
            }

            $this->respond($results);
        } catch (\Exception $e){
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function editAnswer($aId){
        try{
            $json = file_get_contents('php://input');
            $data = json_decode($json);

            $answerText = $data->answer;
            $isCorrect = $data->isCorrect;

            $this->respond($this->quizService->editAnswer($aId, $answerText, $isCorrect));
        } catch (\Exception $e){
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function getAllTopics(){
        $topics = $this->quizService->getAllTopics();

        $this->respond($topics);
    }

    public function getTopic($topicId){
        $topic = $this->quizService->getTopicById($topicId);

        if(!$topic){
            $this->respondWithError(404, "Topic not found");
            return;
        }

        $this->respond($topic);
    }

    public function createTopic(){
        try{
            $json = file_get_contents('php://input');
            $data = json_decode($json);

            $name = $data->topicname;
            $topic = $this->quizService->createTopic($name);

            $this->respond($topic);
        } catch (\Exception $e){
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function editTopic($topicId){
        try{
            $json = file_get_contents('php://input');
            $data = json_decode($json);

            $name = $data->topicname;
            $topic = $this->quizService->editTopic($topicId, $name);

            $this->respond($topic);
        } catch (\Exception $e){
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function deleteTopic($topicId){
        try{
            $this->respond($this->quizService->deleteTopic($topicId));
        } catch (\Exception $e){
            $this->respondWithError(500, $e);
        }
    }
    public function getAllLevels(){
        $levels = $this->quizService->getAllLevels();

        $this->respond($levels);
    }

    public function getLevel($levelId){
        $level = $this->quizService->getLevelById($levelId);

        if(!$level){
            $this->respondWithError(404, "Level not found");
            return;
        }

        $this->respond($level);
    }

    public function createLevel(){
        try{
            $json = file_get_contents('php://input');
            $data = json_decode($json);

            $name = $data->level;
            $level = $this->quizService->createLevel($name);

            $this->respond($level);
        } catch (\Exception $e){
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function editLevel($levelId){
        try{
            $json = file_get_contents('php://input');
            $data = json_decode($json);

            $name = $data->level;
            $level = $this->quizService->editLevel($levelId, $name);

            $this->respond($level);
        } catch (\Exception $e){
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function deleteLevel($levelId){
        try{
            $this->respond($this->quizService->deleteLevel($levelId));
        } catch (\Exception $e){
            $this->respondWithError(500, $e);
        }
    }
}