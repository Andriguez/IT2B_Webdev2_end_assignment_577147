<?php
namespace Models;

class Favorite implements \JsonSerializable
{
    private Quiz $quiz;
    private \DateTime $savedAt;

    public function setQuiz(Quiz $quiz){ $this->quiz = $quiz; }
    public function setSavedAt(\DateTime $savedAt){ $this->savedAt = $savedAt; }


    public function getQuiz(){ return $this->quiz; }
    public function getSavedAt(){ return $this->savedAt; }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(){
        return [
            'quiz' => $this->quiz->getName(),
            'saved_At' => $this->savedAt->format('d/m/y H:i'),
        ];
    }
}