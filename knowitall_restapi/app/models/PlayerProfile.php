<?php
namespace Models;

class PlayerProfile implements \JsonSerializable
{
    private int $average, $ranking;
    private string $playtime;
    private array $favorites;
    private array $history;

    public function setAverage(int $average){ $this->average = $average; }
    public function setPlaytime(string $playtime){ $this->playtime = $playtime; }
    public function setRanking(int $ranking){ $this->ranking = $ranking; }
    public function setFavorites(array $favorites){ $this->favorites = $favorites; }
    public function setHistory(array $history){ $this->history = $history; }


    public function getAverage(){ return $this->average; }
    public function getPlaytime(){ return $this->playtime; }
    public function getRanking(){ return $this->ranking; }
    public function getFavorites(){ return $this->favorites; }
    public function getHistory(){ return $this->history; }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(){
        return [
            'player_average' => $this->average,
            'player_ranking' => $this->ranking,
            'player_playtime' => $this->playtime,
            'player_history' => $this->history,
            'player_favorites' => $this->favorites
        ];
    }
}