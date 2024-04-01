<?php

namespace Models;

class Level implements \JsonSerializable
{
    private int $id;
    private string $name;
    private string $nrQuizzes;


    public function setId(int $id){ $this->id = $id; }
    public function setName(string $name){  $this->name = $name;    }
    public function setNrQuizzes(int $nr){ $this->nrQuizzes = $nr; }

    public function getName(){  return $this->name;    }
    public function getId(){    return $this->id;    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'Id' => $this->id,
            'level' => $this->name,
            'nr_quizzes' => $this->nrQuizzes
        ];
    }
}