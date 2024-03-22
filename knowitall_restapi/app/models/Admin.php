<?php
namespace Models;

use Models\User;

class Admin extends User
{
    public function jsonSerialize()
    {
        return [
            'Id' => $this->id,
            'user_name' => $this->name,
            'user_username' => $this->username,
            'user_password' => $this->password,
            'user_type' => $this->usertype,
        ];
    }
}