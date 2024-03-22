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
            $query = "SELECT `average`, `ranking`, `playtime` FROM `player_info` WHERE `userId` = :id";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $playerId, PDO::PARAM_INT);
            $stmt->execute();

            $playerInfo = array();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $playerInfo['average'] = $row['average'];
                $playerInfo['ranking'] = $row['ranking'];
                $playerInfo['playtime'] = $row['playtime'];
            }

            return $playerInfo;
        } catch (PDOException $e) {
            echo $e;
        }
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
}