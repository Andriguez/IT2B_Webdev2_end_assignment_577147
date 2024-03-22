<?php
namespace Models;

class Flags
{
    private int $Id;
    private string $message;
    private User $user;
    private Quiz $quiz;
    private Question $question;
    private bool $isSolved;

    public function setId(int $id){ $this->Id = $id; }
    public function setMessage(string $message){  $this->message = $message;    }
    public function setUser(User $user){ $this->user = $user; }
    public function setQuiz (Quiz $quiz){  $this->quiz = $quiz;    }
    public function setQuestion(Question $question){ $this->question = $question; }
    public function setIsSolved(bool $isSolved){ $this->isSolved = $isSolved; }


    public function getId(){ return $this->Id; }
    public function getMessage(){ return $this->message;  }
    public function getUser(){ return $this->user; }
    public function getQuiz (){ return  $this->quiz;    }
    public function getQuestion(){ return $this->question; }
    public function getIsSolved(){ return $this->isSolved; }



    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'Id' => $this->Id,
            'name' => $this->name,
        ];
    }
}