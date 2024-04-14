<?php

namespace Controllers;

use Models\PlayerProfile;
use Services\ProfileService;
use Services\QuizService;
use Services\UserService;

class PlayerController extends Controller
{
    private ProfileService $playerService;
    private $userService;
    private QuizService $quizService;

    public function __construct()
    {
        $this->playerService = new ProfileService();
        $this->userService = new UserService();
        $this->quizService = new QuizService();
    }

    public function getOne($id)
    {

        $user = $this->userService->getUserById($id);

        $history = $this->playerService->getPlayerHistory($id);
        $favorites = $this->playerService->getPlayerFavorites($id);
        $playerInfo = $this->playerService->getPlayerInfoById($id);

        $profile = new PlayerProfile();
        $profile->setAverage($playerInfo['average']);
        $profile->setRanking($playerInfo['ranking']);
        $profile->setPlaytime($playerInfo['playtime']);
        $profile->setHistory($history);
        $profile->setFavorites($favorites);
        $profile->setTotalCorrectAnswers($playerInfo['total_correct_answers']);
        $profile->setTotalAnswers($playerInfo['total_answers']);


        $user->setProfile($profile);

        if (!$user) {
            $this->respondWithError(404, "Player Profile not found");
            return;
        }

        $this->respond($user->getProfile());
    }

    public function getPlayerHistory($playerId){
        $history = $this->playerService->getPlayerHistory($playerId);

        if(!isset($history)){
            $this->respondWithError(404, "Player history not found");
            return;
        }

        $this->respond($history);
    }

    public function getPlayerFavorites($playerId){
        $favorites = $this->playerService->getPlayerFavorites($playerId);

        if(!isset($favorites)){
            $this->respondWithError(404, "Player favorites list not found");
            return;
        }

        $this->respond($favorites);
    }

    public function addPlayerResults($quizId){
        try{
            $user = $this->getLoggedUser($this->checkForJwt());

            if($user && ($user->getUsertype()->getId() === 2)){
                $json = file_get_contents('php://input');
                $data = json_decode($json);
                $loggedUserId = $user->getId();

                $nr_correct_answers = $data->nr_correct_answers;
                $playtime = $data->playtime;
                $answersCount = $data->answers_count;

                $historyResult = $this->playerService->addPlayerHistory($loggedUserId, $quizId, $nr_correct_answers, $playtime);

                $playerInfo = $this->playerService->getPlayerInfoById($loggedUserId);

                $totalPlaytime = $playerInfo['playtime'] + $playtime;
                $totalCorrectAnswers = $playerInfo['total_correct_answers'] + $nr_correct_answers;
                $totalAnswers = $playerInfo['total_answers'] + $answersCount;

                if ($totalAnswers > 0) {
                    $average = ($totalCorrectAnswers / $totalAnswers) * 100;
                } else {
                    $average = 0;
                }

                $usersAverages = $this->playerService->getUsersAverage();
                arsort($usersAverages);

                $rankings = array();
                $prevAverage = null;
                $ranking = 1;

                foreach ($usersAverages as $uId => $userAverage) {
                    if ($userAverage !== $prevAverage) {
                        $rankings[$uId] = $ranking;
                    } else {
                        $rankings[$uId] = $ranking - 1;
                    }
                    $ranking++;
                    $prevAverage = $userAverage;
                }


                foreach ($rankings as $userId => $r){
                    $this->playerService->updateUsersRanking($userId, $r);
                }

                $infoResult = $this->playerService->updatePlayerInfo($loggedUserId, $average, $totalPlaytime, $totalCorrectAnswers, $totalAnswers);

                $this->quizService->updateNrPlayers($quizId);
                $userRanking = $rankings[$loggedUserId];

                $this->respond([$historyResult, $infoResult, $userRanking]);
            }
        } catch (\Exception $e){
            $this->respondWithError(500, $e->getMessage());
        }
    }

}