<?php

class Artist{
    private int $id;
    private string $userName;
    private string $email;
    private string $counter;
    private string $pfp;
    private string $bio;

    public function __constructor ($id, $userName, $email, $counter, $pfp, $bio){
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
        $this->counter = $counter;
        $this->pfp = $pfp;
        $this->bio = $bio;
    }

    public function getUserName () : string {
        return $this->userName;
    }
    public function setUserName ($userName) {
        $this->userName = $userName;
    }
    public function getEmail () : string {
        return $this->email;
    }
    public function setCounter ($counter) {
        $this->counter = $counter;
    }
    public function getPfp () : string {
        return $this->pfp;
    }
    public function setBio ($bio) {
        $this->bio = $bio;
    }
    public function getBio () : string {
        return $this->bio;
    }
}