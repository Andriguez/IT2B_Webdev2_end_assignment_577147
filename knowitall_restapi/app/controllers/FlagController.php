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

    public function getAll()
    {
        $offset = NULL;
        $limit = NULL;

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $user = $this->getLoggedUser($this->checkForJwt());
        if($user && $user->getUsertype()->getId() === 1){
            $flags = $this->flagService->getAllFlags($offset, $limit);
            $this->respond($flags);
        }


    }

    public function getFlagsByFilter($isSolved){
        $offset = NULL;
        $limit = NULL;

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $user = $this->getLoggedUser($this->checkForJwt());
        if($user && $user->getUsertype()->getId() === 1){
            $filteredFlags = $this->flagService->getAllFlagsByFilter($isSolved,$offset, $limit);
            $this->respond($filteredFlags);
        }
    }

    public function getOne($id)
    {
        $flag = $this->flagService->getFlagById($id);

        if (!$flag) {
            $this->respondWithError(404, "flag not found");
            return;
        }

        $this->respond($flag);
    }

    public function editFlagStatus($flagId){
        try {
            $json = file_get_contents('php://input');
            $data = json_decode($json);

            $input = $data->isSolved;

            $user = $this->getLoggedUser($this->checkForJwt());
            if($user && $user->getUsertype()->getId() === 1){
                $flag = $this->flagService->editFlagStatus($flagId, $input);
                $this->respond($flag);
            }

        } catch (\Exception $e){
            $this->respondWithError(500, $e);
        }
    }


}