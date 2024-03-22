<?php

namespace Controllers;

use Services\ProfileService;

class PlayerController extends Controller
{
    private ProfileService $playerService;

    public function __construct()
    {
        $this->playerService = new ProfileService();
    }
}