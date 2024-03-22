<?php

namespace Models;

class UserType implements \JsonSerializable
{
    private int $id;
    private string $name;

    public function setId(int $id){ $this->id = $id; }
    public function setName(string $name){  $this->name = $name;    }
    public function getName(){  return $this->name;    }
    public function getId(){    return $this->id;    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'Id' => $this->id,
            'type_name' => $this->name,
        ];
    }
}