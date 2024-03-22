<?php

namespace Models;

class History
{
    private Quiz $quiz;
    private int $nr_correct_answers;
    private \DateTime $last_played;
    private string $playtime;

    public function setQuiz(Quiz $quiz){ $this->quiz = $quiz; }
    public function setNrCorrectAnswers(int $nr_correct_answers){ $this->nr_correct_answers = $nr_correct_answers; }
    public function setLastPlayed(\DateTime $last_played){ $this->last_played = $last_played; }
    public function setPlaytime(string $playtime){ $this->playtime = $playtime; }


    public function getQuiz(){ return $this->quiz; }
    public function getNrCorrectAnswers(){ return $this->nr_correct_answers; }
    public function getLastPlayed(){ return $this->last_played; }
    public function getPlaytime(){ return $this->playtime; }
}