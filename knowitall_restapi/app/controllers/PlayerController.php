<?php

namespace Controllers;

use Models\PlayerProfile;
use Services\ProfileService;
use Services\UserService;

class PlayerController extends Controller
{
    private ProfileService $playerService;
    private $userService;

    public function __construct()
    {
        $this->playerService = new ProfileService();
        $this->userService = new UserService();
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

        $user->setProfile($profile);

        if (!$user) {
            $this->respondWithError(404, "Player Profile not found");
            return;
        }

        $this->respond($user->getProfile());
    }
}