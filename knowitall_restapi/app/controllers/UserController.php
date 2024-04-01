<?php

namespace Controllers;

use Exception;
use Models\User;
use Services\UserService;
use \Firebase\JWT\JWT;

class UserController extends Controller
{
    private $service;

    function __construct()
    {
        $this->service = new UserService();
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

        $users = $this->service->getAllUsers($offset, $limit);

        $this->respond($users);
    }

    public function getUsersByType($type){
        $offset = NULL;
        $limit = NULL;

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $users = $this->service->getUsersByType($type, $offset, $limit);

        $this->respond($users);
    }

    public function getOne($id = NULL)
    {
        $decoded = $this->checkForJwt();

        if ($decoded){
            if(isset($id)){
                $user = $this->service->getUserById($id);
            } else {
                $user = $decoded->data->id;
            }

            if (!$user) {
                $this->respondWithError(404, "User not found");
                return;
            }

            $this->respond($user);

        } else {
            $this->respondWithError(401, 'Unauthorized Access to this information!');
        }

    }

    private function generateJwt($user){

        $issuer = "http://localhost:5173/";
        $audience = "http://localhost/";
        $issuedAt = time();
        $notBefore = $issuedAt;
        $expire = $issuedAt + 1600;

        $secretKey = "577_ANDhrigUEZ_147";

        $payload = array(
            "iss" => $issuer,
            "aud" => $audience,
            "iat" => $issuedAt,
            "nbf" => $notBefore,
            "exp" => $expire,
            "data" => array(
                "id" => $user->getId(),
                "username" => $user->getUsername(),
            ));

        $jwt = JWT::encode($payload, $secretKey, 'HS256');

        return array(
            "message" => "succesful login",
            "jwt" => $jwt,
            "username" => $user->getUsername(),
            "expireAt" => $expire,
            "usertype" => $user->getUsertype()->getName(),
            "name" => $user->getName(),
            "id" => $user->getId(),

        );
    }

    public function login(){
        $json = file_get_contents('php://input');
        $data = json_decode($json);

        $username = $data->username;
        $password = $data->password;

        $user = $this->service->checkUsernamePassword($username, $password);

        if(!$user){
            $this->respondWithError(401, 'Invalid login');
            return;
        }

        $tokenResponse = $this->generateJwt($user);
        $this->respond($tokenResponse);
    }
}
