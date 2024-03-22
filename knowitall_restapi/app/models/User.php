<?php
namespace Models;

use Models\UserType;
abstract class User implements \JsonSerializable {

    protected int $id;
    protected  string $name, $username , $password;
    protected UserType $usertype;

    public function setId(int $id){  $this->id = $id; }
    public function setName(string $name){  $this->name = $name;    }
    public function setUsername(string $username){  $this->username = $username;    }
    public function setPassword(string $password){  $this->password = $password;    }
    public function setUsertype(UserType $usertype){ $this->usertype = $usertype;    }

    public function getName(){  return $this->name;    }
    public function getId(){  return $this->id;    }
    public function getPassword(){  return $this->password;    }
    public function getUsername(){  return $this->username;    }
    public function getUsertype() { return $this->usertype;  }

    #[\ReturnTypeWillChange]
    public abstract function jsonSerialize();
}
