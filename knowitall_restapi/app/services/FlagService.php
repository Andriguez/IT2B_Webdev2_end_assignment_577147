<?php
namespace Services;

use Repositories\FlagRepository;

class FlagService
{
    private FlagRepository $flagRepo;
    public function __construct()
    {
        $this->flagRepo = new FlagRepository();
    }

    public function getAllFlags(){ return $this->flagRepo->getAllFlags(); }
    public function getFlagById($id){ return $this->flagRepo->getFlagById($id); }
}