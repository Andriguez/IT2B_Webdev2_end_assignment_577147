<?php
namespace Models;

use Models\User;

class Player extends User
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


    public function jsonSerialize()
    {
        return [
            'Id' => $this->id,
            'user_name' => $this->name,
            'user_username' => $this->username,
            'user_password' => $this->password,
            'user_type' => $this->usertype,
            'average' => $this->average,
            'ranking' => $this->ranking,
            'playtime' => $this->playtime
        ];
    }
}