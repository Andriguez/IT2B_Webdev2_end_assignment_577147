<?php
namespace Repositories;

use Models\Flag;
use PDO;
use PDOException;

class FlagRepository extends Repository
{
    public function getAllFlags($offset = NULL, $limit = NULL){
        try {
            $query = "SELECT `Id` FROM flags";
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
            }
            $stmt = $this->connection->prepare($query);
            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
            $stmt->execute();

            $flags = array();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $flags[] = $this->getFlagById($row['Id']);
            }

            return $flags;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getFlagById($Id){
        $query = "SELECT `user_Id`, `quiz_Id`, `question_Id`, `message`, `isSolved`, dateTime FROM `flags` WHERE Id = :id";

        try{
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':id', $Id, \PDO::PARAM_INT);
            $statement->execute();

            $userRepo = new UserRepository();
            $quizRepo = new QuizRepository();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $flag = new Flag();
                $flag->setId($Id);
                $flag->setQuiz($quizRepo->getQuizById($row['quiz_Id']));
                $flag->setQuestion($quizRepo->getQuestionById($row['question_Id']));
                $flag->setUser($userRepo->getUserById($row['user_Id']));
                $flag->setMessage($row['message']);
                $flag->setIsSolved($row['isSolved']);

                $dateTime_string = $row['dateTime'];
                $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $dateTime_string);
                $flag->setSentAt($dateTime);

            }

            return $flag ?? null;

        } catch (\PDOException $e){echo $e;}

    }

}