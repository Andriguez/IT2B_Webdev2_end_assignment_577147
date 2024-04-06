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

    public function getAllFlags($offset = NULL, $limit = NULL){ return $this->flagRepo->getAllFlags($offset, $limit); }
    public function getCountFlagsByQuiz($quizId) { return $this->flagRepo->getCountFlagsByQuiz($quizId); }
    public function getAllFlagsByFilter($isSolved, $offset = NULL, $limit = NULL){ return $this->flagRepo->getAllFlagsByFilter($isSolved, $offset, $limit); }
    public function getFlagById($id){ return $this->flagRepo->getFlagById($id); }
    public function editFlagStatus($flagId, $isSolved){ return $this->flagRepo->editFlagStatus($flagId, $isSolved); }
}