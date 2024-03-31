<?php

namespace Models;

class Question implements \JsonSerializable
{
    private int $Id;
    private string $question;
    private array $answers;

    public function setId(int $Id){ $this->Id = $Id; }
    public function setQuestion(string $question){ $this->question = $question; }
    public function setAnswers(array $answers){  $this->answers = $answers; }


    public function getId(){ return $this->Id; }
    public function getQuestion(){ return $this->question; }
    public function getAnswers(){ return $this->answers; }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'Id' => $this->Id,
            'question' => $this->question,
            'answers' => $this->answers
        ];
    }
}