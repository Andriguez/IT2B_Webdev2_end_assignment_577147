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
    public function getPlayerHistory($playerId){ return $this->profilerRepo->getPlayerHistory($playerId); }
    public function getPlayerFavorites($playerId){ return $this->profilerRepo->getPlayerFavorites($playerId); }
}