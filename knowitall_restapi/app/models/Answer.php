<?php

namespace Models;

class Answer
{
    private int $Id;
    private string $answer_text, $answer_explain;
    private bool $isCorrect;

    public function setId(int $Id){ $this->Id = $Id; }
    public function setAnswerText(string $answer_text){ $this->answer_text = $answer_text; }
    public function setAnswerExplain(string $answer_explain){ $this->answer_explain = $answer_explain; }
    public function setIsCorrect(bool $isCorrect){  $this->isCorrect = $isCorrect; }


    public function getId(){ return $this->Id; }
    public function getAnswerText(){ return $this->answer_text; }
    public function getAnswerExplain(){ return $this->answer_explain; }
    public function getIsCorrect(){ return $this->isCorrect; }
}