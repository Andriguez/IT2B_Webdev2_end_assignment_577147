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
            'quiz_name' => $this->quiz->getName(),
            'quiz_topic' => $this->quiz->getTopic()->getName(),
            'quiz_level' => $this->quiz->getLevel()->getName(),
            'quiz_avg' => $this->quiz->getAverage(),
            'quiz_nr_players' => $this->quiz->getNrPlayers(),
            'saved_At' => $this->savedAt->format('d/m/y H:i'),
        ];
    }
}