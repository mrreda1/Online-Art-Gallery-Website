<?php
class Artist{
    private int $id;
    private string $username;
    private string $email;
    private string $counter;
    private string $pfp;
    private string $bio;

    public function __constructor ($id, $username, $email, $counter, $pfp, $bio){
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->counter = $counter;
        $this->pfp = $pfp;
        $this->bio = $bio;
    }

    public function getUserName () : string {
        return $this->username;
    }
    public function setUserName ($username) {
        $this->username = $username;
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
