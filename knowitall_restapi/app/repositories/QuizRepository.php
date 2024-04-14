<?php
namespace Repositories;

use Models\Answer;
use Models\Level;
use Models\Question;
use Models\Quiz;
use Models\Topic;
use mysql_xdevapi\Statement;
use PDO;
use PDOException;

class QuizRepository extends Repository
{
    public function getALlQuizzes2($offset = NULL, $limit = NULL){
        try {
            $query = "SELECT `Id` FROM quizzes";
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
            }
            $stmt = $this->connection->prepare($query);
            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
            $stmt->execute();

            $quizzes = array();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $quizzes[] = $this->getQuizById($row['Id']);
            }

            return $quizzes;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function getAllQuizzes($offset = NULL, $limit = NULL){

        $query = "SELECT `Id` FROM quizzes";

        return $this->getQuizzes($query, null, $offset, $limit);
    }
    public function getQuizzesByTopic($topic, $offset = NULL, $limit = NULL){
        $query = "SELECT `Id` FROM quizzes WHERE topic = :topic";
        $params[':topic'] = $topic;

        return $this->getQuizzes($query, $params, $offset, $limit);
    }

    public function getQuizzesByLevel($level, $offset = NULL, $limit = NULL){
        $query = "SELECT `Id` FROM quizzes WHERE level = :level";
        $params[':level'] = $level;

        return $this->getQuizzes($query, $params, $offset, $limit);
    }

    private function getQuizzes($query, $params = null, $offset = NULL, $limit = null ) {
        try {
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
                $params[':limit'] = $limit;
                $params[':offset'] = $offset;
            }

            $stmt = $this->connection->prepare($query);

            if (isset($params)) {
                foreach ($params as $pname => $pvalue) {
                    $stmt->bindValue($pname, $pvalue);}
            }

            $stmt->execute();

            $quizzes = array();
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $quizzes[] = $this->getQuizById($row['Id']);
            }
            return $quizzes ?? null;
        } catch (\PDOException $e){echo $e;}
    }

    public function getQuizById($Id){
        try {
            $query = "SELECT `name`, `topic`, `nr_players`, `level`, `modification_date`
            FROM `quizzes` WHERE `Id` = :id";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $Id, PDO::PARAM_INT);
            $stmt->execute();

            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $quiz = new Quiz();
                $quiz->setId($Id);
                $quiz->setName(htmlspecialchars_decode($row['name']));
                $quiz->setTopic($this->getTopicById($row['topic']));
                $quiz->setNrPlayers($row['nr_players']);
                $quiz->setLevel($this->getLevelById($row['level']));

                $dateTime_string = $row['modification_date'];
                $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $dateTime_string);
                $quiz->setModDate($dateTime);

                $quiz->setQuestions($this->getQuestions($Id));
            }

            return $quiz;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function createQuiz($name, $topic, $level){
        try{
            $query = "INSERT INTO `quizzes`(`name`, `topic`, `level`) VALUES (?,?,?)";
            $statement = $this->connection->prepare($query);
            $statement->execute([$this->sanitizeText($name), $topic, $level]);

            $quizId = $this->connection->lastInsertId();

        } catch (PDOException $e){
            echo $e;
        }

        return $quizId ?? null;
    }

    public function editQuiz($quizId, $name, $topic, $level){
        try{
            $query = "UPDATE `quizzes` SET `name`= ? ,`topic`= ?, `level`= ?,`modification_date`= ? WHERE `Id` = ?";

            $statement = $this->connection->prepare($query);
            $modDate = date('Y-m-d H:i:s');
            $statement->execute([$this->sanitizeText($name), $topic, $level, $modDate, $quizId]);
        } catch (PDOException $e){
            echo $e;
        }

        return $this->getQuizById($quizId) ?? null;
    }

    public function updateNrPlayers($quizId){
        try {
            $query = "UPDATE `quizzes` SET `nr_players` = `nr_players`+1 WHERE `Id` = ?";
            $statement = $this->connection->prepare($query);
            $statement->execute([$quizId]);

        } catch (PDOException $e){
            echo $e;
        }
    }

    public function deleteQuiz($quizId){
        try{
            $query = "DELETE FROM `quizzes` WHERE `Id` = :quizId";
            $statement = $this->connection->prepare($query);
            $statement->bindParam('quizId', $quizId);
            return $statement->execute();

        } catch (PDOException $e){
            echo $e;
        }

        return false;
    }

    public function getQuestions($quizId){
        try {
            $query = "SELECT `Id` FROM questions WHERE quizz_Id = :quizId";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':quizId', $quizId, PDO::PARAM_INT);
            $stmt->execute();

            $questions = array();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $questions[] = $this->getQuestionById($row['Id']);
            }

            return $questions;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getQuestionById($Id){
        try {
            $query = "SELECT `question` FROM `questions` WHERE `Id` = :id";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $Id, PDO::PARAM_INT);
            $stmt->execute();

            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $question = new Question();
                $question->setId($Id);
                $question->setQuestion(htmlspecialchars_decode($row['question']));
                $question->setAnswers($this->getAnswers($Id));
            }

            return $question;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function createQuestion($quizId, $questionText){
        try{
            $query = "INSERT INTO `questions`(`quizz_Id`, `question`) VALUES (?,?)";
            $statement = $this->connection->prepare($query);
            $statement->execute([$quizId, $this->sanitizeText($questionText)]);

            $questionId = $this->connection->lastInsertId();

        } catch (PDOException $e){
            echo $e;
        }

        return $questionId ?? null;
    }

    public function editQuestion($qId, $questionText){
        try{
            $query = "UPDATE `questions` SET `question`= ? WHERE `Id`= ?";

            $statement = $this->connection->prepare($query);
            return $statement->execute([$this->sanitizeText($questionText), $qId]);
        } catch (PDOException $e){
            echo $e;
        }

        return false;
    }

    public function deleteQuestion($qId){

    }
    public function getAnswers($questionId){
        try {
            $query = "SELECT `Id` FROM answers WHERE questionId = :questionId";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':questionId', $questionId, PDO::PARAM_INT);
            $stmt->execute();

            $answers = array();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $answers[] = $this->getAnswerById($row['Id']);
            }

            return $answers;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getAnswerById($Id){
        try {
            $query = "SELECT `answer_text`, `answer_explain`, `isCorrect` FROM `answers` WHERE `Id` = :id";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $Id, PDO::PARAM_INT);
            $stmt->execute();

            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $answer = new Answer();
                $answer->setId($Id);
                $answer->setAnswerText(htmlspecialchars_decode($row['answer_text']));

                $explanation = $row['answer_explain'] ?? null;
                if(isset($explanation)){ $explanation = htmlspecialchars_decode($explanation);}

                $answer->setAnswerExplain($explanation);
                $answer->setIsCorrect($row['isCorrect']);
            }

            return $answer;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function createAnswer($questionId, $answerText, $isCorrect){
        try{
            $query = "INSERT INTO `answers`(`questionId`, `answer_text`, `isCorrect`) VALUES (?,?,?)";
            $statement = $this->connection->prepare($query);
            return $statement->execute([$questionId, $this->sanitizeText($answerText), $isCorrect]);

        } catch (PDOException $e){
            echo $e;
        }
        return false;
    }

    public function editAnswer($aId, $answerText, $isCorrect, $explanation){
        try{
            $query = "UPDATE `answers` SET `answer_text`= ? ,`isCorrect`= ?, `answer_explain` = ? WHERE `Id`= ?";

            $statement = $this->connection->prepare($query);
            return $statement->execute([$this->sanitizeText($answerText), $isCorrect, $this->sanitizeText($explanation), $aId]);

        } catch (PDOException $e){
            echo $e;
        }

        return false;
    }

    public function deleteAnswer($aId){

    }

    public function getAllLevels(){
        try {
            $query = "SELECT `Id` FROM quiz_level";

            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            $levels = array();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $levels[] = $this->getLevelById($row['Id']);
            }

            return $levels;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getLevelById($Id){
        try {
            $query = "SELECT `name` FROM `quiz_level` WHERE `Id` = :id";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $Id, PDO::PARAM_INT);
            $stmt->execute();

            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $level = new Level();
                $level->setId($Id);
                $level->setName($row['name']);
                $level->setNrQuizzes($this->getCountQuizzesBy($Id,'level'));

            }

            return $level;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function createLevel($name){
        $query = "INSERT INTO `quiz_level`(`name`) VALUES (?)";

        try{
            $statement = $this->connection->prepare($query);
            $statement->execute([$this->sanitizeText($name)]);

            $levelId = $this->connection->lastInsertId();

        } catch (PDOException $e){
            echo $e;
        }

        return $this->getLevelById($levelId) ?? null;
    }

    public function editLevel($id, $name){
        $query = "UPDATE `quiz_level` SET `name`= ? WHERE Id = ?";

        try{
            $statement = $this->connection->prepare($query);
            $statement->execute([$this->sanitizeText($name), $id]);

        } catch (PDOException $e){
            echo $e;
        }

        return $this->getLevelById($id) ?? null;
    }

    public function deleteLevel($id){
        $query = "DELETE FROM quiz_level WHERE Id = :levelId";

        try{
            $statement = $this->connection->prepare($query);
            $statement->bindParam('levelId', $id);
            return $statement->execute();

        } catch (PDOException $e){
            echo $e;
        }

        return false;

    }

    public function getAllTopics(){
        try {
            $query = "SELECT `Id` FROM quiz_topics";

            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            $topics = array();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $topics[] = $this->getTopicById($row['Id']);
            }

            return $topics;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getTopicById($Id){
        try {
            $query = "SELECT `name` FROM `quiz_topics` WHERE `Id` = :id";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $Id, PDO::PARAM_INT);
            $stmt->execute();

            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $topic = new Topic();
                $topic->setId($Id);
                $topic->setName($row['name']);
                $topic->setNrQuizzes($this->getCountQuizzesBy($Id, 'topic'));
            }

            return $topic;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function createTopic($name){
        $query = "INSERT INTO `quiz_topics`(`name`) VALUES (?)";

        try{
            $statement = $this->connection->prepare($query);
            $statement->execute([$this->sanitizeText($name)]);

            $topicId = $this->connection->lastInsertId();

        } catch (PDOException $e){
            echo $e;
        }

        return $this->getTopicById($topicId) ?? null;
    }

    public function editTopic($id, $name){
        $query = "UPDATE `quiz_topics` SET `name`= ? WHERE Id = ?";

        try{
            $statement = $this->connection->prepare($query);
            $statement->execute([$this->sanitizeText($name), $id]);

        } catch (PDOException $e){
            echo $e;
        }

        return $this->getTopicById($id) ?? null;
    }

    public function deleteTopic($id){
        $query = "DELETE FROM quiz_topics WHERE Id = :topicId";

        try{
            $statement = $this->connection->prepare($query);
            $statement->bindParam('topicId', $id);
            return $statement->execute();

        } catch (PDOException $e){
            echo $e;
        }

        return true;

    }

    public function getCountQuizzesBy($Id, $filter = NULL){
        try {
            if ($filter === 'level'){
                $query = "SELECT COUNT(Id) AS amount FROM quizzes WHERE level = :id";
            } else if ($filter === 'topic'){
                $query = "SELECT COUNT(Id) AS amount FROM quizzes WHERE topic = :id";
            } else {
                $query = "SELECT COUNT(Id) AS amount FROM quizzes";
            }

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $Id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    private function sanitizeText($input):string{
        return htmlspecialchars($input);
    }
}