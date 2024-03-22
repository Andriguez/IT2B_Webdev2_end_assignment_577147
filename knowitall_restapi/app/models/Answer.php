<?php

namespace Models;

class Answer implements \JsonSerializable
{
    private int $Id;
    private string $answer_text;
    private ?string $answer_explain;
    private bool $isCorrect;

    public function setId(int $Id){ $this->Id = $Id; }
    public function setAnswerText(string $answer_text){ $this->answer_text = $answer_text; }
    public function setAnswerExplain(string $answer_explain = null){ $this->answer_explain = $answer_explain; }
    public function setIsCorrect(bool $isCorrect){  $this->isCorrect = $isCorrect; }


    public function getId(){ return $this->Id; }
    public function getAnswerText(){ return $this->answer_text; }
    public function getAnswerExplain(){ return $this->answer_explain; }
    public function getIsCorrect(){ return $this->isCorrect; }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'Id' => $this->Id,
            'answer' => $this->answer_text,
            'explanation' => $this->answer_explain,
            'isCorrect' => $this->isCorrect
        ];
    }
}