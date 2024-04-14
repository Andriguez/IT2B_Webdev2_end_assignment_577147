<?php
namespace Services;

use Repositories\ProfileRepository;
class ProfileService
{
    private ProfileRepository $profilerRepo;

    public function __construct()
    {
        $this->profilerRepo = new ProfileRepository();
    }

    public function getPlayerInfoById($playerId){ return $this->profilerRepo->getPlayerInfo($playerId); }
    public function updatePlayerInfo($userId, $average, $playtime, $total_correct_answers, $total_answers){ return $this->profilerRepo->updatePlayerInfo($userId, $average,$playtime,$total_correct_answers,$total_answers); }
    public function getPlayerHistory($playerId){ return $this->profilerRepo->getPlayerHistory($playerId); }
    public function addPlayerHistory($playerId, $quizId, $nr_correct_answers, $playtime){ return $this->profilerRepo->addPlayerHistory($playerId, $quizId, $nr_correct_answers, $playtime); }
    public function getPlayerFavorites($playerId){ return $this->profilerRepo->getPlayerFavorites($playerId); }
    public function getUsersAverage(){ return $this->profilerRepo->getUsersAverage();}
    public function updateUsersRanking($userId, $ranking){ $this->profilerRepo->updateUsersRanking($userId, $ranking);}

    }