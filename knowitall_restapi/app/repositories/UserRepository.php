<?php

namespace Repositories;

use Models\UserType;
use PDO;
use PDOException;
use Repositories\Repository;
use Models\User;
use Models\Admin;
use Models\Player;

class UserRepository extends Repository
{
    function getAllUsers($offset = NULL, $limit = NULL)
    {
        try {
            $query = "SELECT `Id` FROM users";
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
            }
            $stmt = $this->connection->prepare($query);
            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
            $stmt->execute();

            $users = array();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $users[] = $this->getUserById($row['Id']);
            }

            return $users;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getUsersByType($type, $offset = NULL, $limit = NULL)
    {
        try {
            $query = "SELECT `Id` FROM users WHERE usertype = :type";
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
            }
            $stmt = $this->connection->prepare($query);
            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }

            $stmt->bindParam(':type', $type, PDO::PARAM_INT);
            $stmt->execute();

            $users = array();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $users[] = $this->getUserById($row['Id']);
            }

            return $users;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getUserById($id){
        $query = "SELECT `name`, `username`, `password`, `usertype` FROM `users` WHERE Id = :id";

        try{
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $userType = $this->getUserTypeById($row['usertype']);

                if($userType->getName() === 'admin'){
                    $user = new Admin();
                } else {
                    $user = new Player();
                }

                $user->setId($id);
                $user->setName($row['name']);
                $user->setUsername($row['username']);
                $user->setPassword($row['password']);
                $user->setUsertype($userType);

            }

            return $user ?? null;

        } catch (\PDOException $e){echo $e;}
    }

    function createUser($name, $username, $type, $password){
        try{

            $query = "INSERT INTO `users` (`name`, `username`, `password`, `usertype`) VALUES (?,?,?,?)";
            $statement = $this->connection->prepare($query);
            $statement->execute([$name, $username,$password, $type]);
            $userId =  $this->connection->lastInsertId();

            if ($type === 2){
                $this->createPlayerProfile($userId);
            }

        } catch(PDOException $e){
            echo $e;
        }

        return $this->getUserById($userId) ?? null;
    }

    private function createPlayerProfile($userId){
        try{
            $query = "INSERT INTO `player_info`(`userId`, `average`, `ranking`, `playtime`) VALUES (?,0,0,'00:00')";
            $statement = $this->connection->prepare($query);
            $statement->execute([$userId]);

        } catch(PDOException $e){
            echo $e;
        }
    }

    function editUser($userId, $name, $username, $type){
        $query = "UPDATE `users` SET `name`= ?,`username`= ?,`usertype`=? WHERE `Id` = ?";

        try{
            $statement = $this->connection->prepare($query);
            $statement->execute([$this->sanitizeText($name), $this->sanitizeText($username), $type, $userId]);

        } catch (PDOException $e){
            echo $e;
        }

        return $this->getUserById($userId) ?? null;
    }

    function resetUserPassword($userId){
        $query = "UPDATE `users` SET `password`= ? WHERE `Id` = ?";

        try{
            $statement = $this->connection->prepare($query);
            $password = 'password123';
            return $statement->execute([$password, $userId]);

        } catch (PDOException $e){
            echo $e;
        }

        return false;
    }

    function deleteUser($userId){
        $query = "DELETE FROM `users` WHERE `Id` = :userId";

        try{

            $statement = $this->connection->prepare($query);
            $statement->bindParam(':userId', $userId);
            return $statement->execute();

        } catch (PDOException $e){
            echo $e;
        }

        return false;
    }

    function getAllUserTypes()
    {
        try {
            $query = "SELECT `Id` FROM user_types";

            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            $userTypes = array();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $userTypes[] = $this->getUserTypeById($row['Id']);
            }

            return $userTypes;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getUserTypeById($id){
        try {
            $query = "SELECT `name` FROM `user_types` WHERE `Id` = :id";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $usertype = new UserType();
                $usertype->setId($id);
                $usertype->setName($row['name']);

            }

            return $usertype;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function checkUsernamePassword($username, $password)
    {
        try {
            // retrieve the user with the given username
            $stmt = $this->connection->prepare("SELECT `Id` FROM `users` WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $user = $this->getUserById($row['Id']);
            }

            // verify if the password matches the hash in the database
            //$result = $this->verifyPassword($password, $user->getPassword());
            $result = $password === $user->getPassword();

            if (!$result)
                return false;

            // do not pass the password hash to the caller
            $user->setPassword("");

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    // hash the password (currently uses bcrypt)
    function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    // verify the password hash
    function verifyPassword($input, $hash)
    {
        return password_verify($input, $hash);
    }

    private function sanitizeText($input):string{
        return htmlspecialchars($input);
    }
}
