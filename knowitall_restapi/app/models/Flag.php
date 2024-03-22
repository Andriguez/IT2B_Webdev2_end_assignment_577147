<?php
namespace Models;

class Flag implements \JsonSerializable
{
    private int $Id;
    private string $message;
    private User $user;
    private Quiz $quiz;
    private Question $question;
    private bool $isSolved;
    private \DateTime $sentAt;

    public function setId(int $id){ $this->Id = $id; }
    public function setMessage(string $message){  $this->message = $message;    }
    public function setUser(User $user){ $this->user = $user; }
    public function setQuiz (Quiz $quiz){  $this->quiz = $quiz;    }
    public function setQuestion(Question $question){ $this->question = $question; }
    public function setIsSolved(bool $isSolved){ $this->isSolved = $isSolved; }
    public function setSentAt(\DateTime $sentAt){ $this->sentAt = $sentAt; }


    public function getId(){ return $this->Id; }
    public function getMessage(){ return $this->message;  }
    public function getUser(){ return $this->user; }
    public function getQuiz (){ return  $this->quiz;    }
    public function getQuestion(){ return $this->question; }
    public function getIsSolved(){ return $this->isSolved; }
    public function getSentAt(){ return $this->sentAt; }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'Id' => $this->Id,
            'user' => $this->user->getUsername(),
            'quiz' => $this->quiz->getName(),
            'question' => $this->question->getQuestion(),
            'message' => $this->message,
            'isSolved' => $this->isSolved,
            'sentAt' => $this->sentAt->format('d/m/y H:i')
        ];
    }
}