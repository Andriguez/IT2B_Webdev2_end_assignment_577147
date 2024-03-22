<?php
namespace Services;

use Repositories\UserRepository;

class UserService {

    private $repository;

    function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function getAllUsers($offset = NULL, $limit = NULL) {
        return $this->repository->getAllUsers($offset, $limit);
    }
    public function checkUsernamePassword($username, $password) {
        return $this->repository->checkUsernamePassword($username, $password);
    }
}

?>