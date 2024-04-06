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
    public function getUsersByType($type, $offset = NULL, $limit = NULL) {
        return $this->repository->getUsersByType($type, $offset, $limit);
    }
    public function getUserById($Id){
        return $this->repository->getUserById($Id);
    }
    public function editUser($userId, $name, $username, $type){
        return $this->repository->editUser($userId, $name, $username, $type);
    }
    public function deleteUser($userId){
        return $this->repository->deleteUser($userId);
    }
    public function getAllUserTypes() {
        return $this->repository->getAllUserTypes();
    }
    public function getUserTypeById($Id){
        return $this->repository->getUserTypeById($Id);
    }
    public function checkUsernamePassword($username, $password) {
        return $this->repository->checkUsernamePassword($username, $password);
    }
}

?>