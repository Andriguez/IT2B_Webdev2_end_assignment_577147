<?php
namespace Repositories;

use Models\Favorite;
use Models\History;
use PDO;
use PDOException;

class ProfileRepository extends Repository
{
    public function getPlayerInfo($playerId){
        try {
            $query = "SELECT `average`, `ranking`, `playtime`, `total_correct_answers`,`total_questions_answered` FROM `player_info` WHERE `userId` = :id";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $playerId, PDO::PARAM_INT);
            $stmt->execute();

            $playerInfo = array();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $playerInfo['average'] = $row['average'];
                $playerInfo['ranking'] = $row['ranking'];
                $playerInfo['playtime'] = $row['playtime'];
                $playerInfo['total_correct_answers'] = $row['total_correct_answers'];
                $playerInfo['total_answers'] = $row['total_questions_answered'];
            }

            return $playerInfo;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function updatePlayerInfo($userId, $average, $playtime, $total_correct_answers, $total_answers){
        try {
            $query = "UPDATE `player_info` SET `average`=?,`playtime`=?,`total_correct_answers`=?,`total_questions_answered`=? WHERE `userId`=?";

            $statement = $this->connection->prepare($query);
            return $statement->execute([$average, $playtime, $total_correct_answers, $total_answers, $userId]);

        } catch (PDOException $e){
            echo $e;
        }

        return false;
    }

    public function getPlayerHistory($playerId)
    {
        try {
            $query = "SELECT `quiz_Id`, `nr_correct_answers`, `last_played`, `playtime`  FROM history WHERE user_Id = :playerId";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':playerId', $playerId, PDO::PARAM_INT);
            $stmt->execute();

            $history = array();
            $quizRepo = new QuizRepository();

            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $log = new History();
                $log->setQuiz($quizRepo->getQuizById($row['quiz_Id']));
                $log->setNrCorrectAnswers($row['nr_correct_answers']);
                $log->setPlaytime($row['playtime']);

                $dateTime_string = $row['last_played'];
                $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $dateTime_string);
                $log->setLastPlayed($dateTime);

                $history[] = $log;
            }

            return $history;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function addPlayerHistory($playerId, $quizId, $nr_correct_answers, $playtime){
        try{
            $query = "INSERT INTO `history`(`user_Id`, `quiz_Id`, `nr_correct_answers`, `last_played`, `playtime`)
                        VALUES (:userId, :quizId, :nr_answers,:last_played, :playtime)
                        ON DUPLICATE KEY UPDATE           
                        `nr_correct_answers` = VALUES(`nr_correct_answers`),
                        `last_played` = VALUES(`last_played`),
                        `playtime` = VALUES(`playtime`)";

            $lastPlayed = date('Y-m-d H:i:s');

            $statement = $this->connection->prepare($query);

            return $statement->execute(array(
                ':userId' => $playerId,
                ':quizId' => $quizId,
                ':nr_answers' => $nr_correct_answers,
                ':playtime' => $playtime,
                ':last_played' => $lastPlayed
            ));

        } catch(PDOException $e){
            echo $e;
        }

        return false;
    }

    public function getPlayerFavorites($playerId){
        try {
            $query = "SELECT `quiz_Id`, savedAt  FROM favorites WHERE user_Id = :playerId";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':playerId', $playerId, PDO::PARAM_INT);
            $stmt->execute();

            $favorites = array();
            $quizRepo = new QuizRepository();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $favorite = new Favorite();
                $favorite->setQuiz($quizRepo->getQuizById($row['quiz_Id']));

                $dateTime_string = $row['savedAt'];
                $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $dateTime_string);
                $favorite->setSavedAt($dateTime);

                $favorites[] = $favorite;
            }

            return $favorites;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getUsersAverage(){
        try {
            $query = "SELECT `userId`,`average` FROM `player_info`";

            $statement = $this->connection->prepare($query);
            $statement->execute();
            $average = array();
            while (($row = $statement->fetch(PDO::FETCH_ASSOC)) !== false) {
                $average[$row['userId']] = $row['average'];
            }

            return $average;

        } catch (PDOException $e){
            echo $e;
        }
    }

    public function updateUsersRanking($userId, $ranking){
        try {
            $query = "UPDATE `player_info` SET `ranking`= :ranking WHERE `userId`=:userId";

            $statement = $this->connection->prepare($query);
            $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
            $statement->bindParam(':ranking', $ranking, PDO::PARAM_INT);

            $statement->execute();

        } catch (PDOException $e){
            echo $e;
        }
    }
}