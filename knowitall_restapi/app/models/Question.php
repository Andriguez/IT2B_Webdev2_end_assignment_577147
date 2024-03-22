<?php

namespace Models;

class Question
{
    private int $Id;
    private string $question, $timer;
    private array $answers;

    public function setId(int $Id){ $this->Id = $Id; }
    public function setQuestion(string $question){ $this->question = $question; }
    public function setTimer(string $timer){ $this->timer = $timer; }
    public function setAnswers(array $answers){  $this->answers = $answers; }


    public function getId(){ return $this->Id; }
    public function getQuestion(){ return $this->question; }
    public function getTimer(){ return $this->timer; }
    public function getAnswers(){ return $this->answers; }
}