<?php

namespace Controllers;

use Services\FlagService;

class FlagController extends Controller
{
    private FlagService $flagService;

    public function __construct()
    {
        $this->flagService = new FlagService();
    }


}