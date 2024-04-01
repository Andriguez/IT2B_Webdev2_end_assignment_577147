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

        $flags = $this->flagService->getAllFlags($offset, $limit);

        $this->respond($flags);
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

        $filteredFlags = $this->flagService->getAllFlagsByFilter($isSolved,$offset, $limit);

        $this->respond($filteredFlags);
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


}