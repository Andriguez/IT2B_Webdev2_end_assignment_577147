<?php
namespace Models;

class Quiz implements \JsonSerializable
{
    private int $Id, $nr_players, $avg_correct_answers;
    private string $name;
    private Topic $topic;
    private Level $level;
    private \DateTime $modification_date;
    private array $questions;

    public function setId(int $id){ $this->Id = $id; }
    public function setName(string $name){  $this->name = $name;    }
    public function setNrPlayers(int $nrPlayers){ $this->nr_players = $nrPlayers; }
    public function setTopic(Topic $topic){ $this->topic = $topic; }
    public function setLevel(Level $level){  $this->level = $level;    }
    public function setModDate(\DateTime $date){ $this->modification_date = $date; }
    public function setQuestions(array $questions){ $this->questions = $questions; }


    public function getId(){    return $this->Id;    }
    public function getName(){  return $this->name;    }
    public function getNrPlayers(){ return $this->nr_players ; }
    public function getTopic(){ return $this->topic; }
    public function getLevel(){  return $this->level;    }
    public function getModDate(){ return $this->modification_date; }
    public function getQuestions(){ return $this->questions; }



    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'Id' => $this->Id,
            'name' => $this->name,
            'nr_players' => $this->nr_players,
            'topic' => $this->topic,
            'level' => $this->level,
            'mod_date' => $this->modification_date->format('d/m/y H:i'),
            'questions' => $this->questions,
            'nr_questions' => count($this->questions)
        ];
    }
}