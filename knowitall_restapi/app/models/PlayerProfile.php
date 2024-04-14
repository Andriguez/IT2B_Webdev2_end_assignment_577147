<?php
namespace Models;

class PlayerProfile implements \JsonSerializable
{
    private int $average, $ranking, $total_correct_answers, $total_answers;
    private int $playtime;
    private array $favorites;
    private array $history;

    public function setAverage(int $average){ $this->average = $average; }
    public function setPlaytime(int $playtime){ $this->playtime = $playtime; }
    public function setRanking(int $ranking){ $this->ranking = $ranking; }
    public function setFavorites(array $favorites){ $this->favorites = $favorites; }
    public function setHistory(array $history){ $this->history = $history; }
    public function setTotalCorrectAnswers(int $nr){ $this->total_correct_answers = $nr; }
    public function setTotalAnswers(int $nr) { $this->total_answers = $nr; }

    public function getAverage(){ return $this->average; }
    public function getPlaytime(){ return $this->playtime; }
    public function getRanking(){ return $this->ranking; }
    public function getFavorites(){ return $this->favorites; }
    public function getHistory(){ return $this->history; }
    public function getTotalCorrectAnswers(){ return $this->total_correct_answers; }
    public function getTotalAnswers(){ return $this->total_answers; }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(){
        return [
            'average' => "{$this->average}%",
            'ranking' => "#{$this->ranking}",
            'playtime' => $this->playtime,
            'answered' => count($this->history)
        ];
    }
}