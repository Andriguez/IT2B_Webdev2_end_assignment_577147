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

        $users = $this->flagService->getAllFlags($offset, $limit);

        $this->respond($users);
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