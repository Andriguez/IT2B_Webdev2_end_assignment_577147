<?php
namespace Models;

use Models\User;

class Player extends User
{
    private PlayerProfile $profile;

    public function setProfile(PlayerProfile $profile){ $this->profile = $profile; }

    public function getProfile(){ return $this->profile; }
}