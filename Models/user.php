<?php
class user{
    private int $id;
    private string $userName;
    private string $email;
    private string $password;

    public function __constructor($id, $userName, $email, $password){
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
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
    public function getId () : int {
        return $this->id;
    }
} 