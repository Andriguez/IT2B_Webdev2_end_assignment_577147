<?php
namespace Controllers;

use Services\UserService;

class QuizController extends Controller
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }
}