<?php
class Artist{
    private int $id;
    private string $username;
    private string $email;
    private string $passwd;
    private string $counter;
    private string $pfp;
    private string $bio;
    static $table = 'Artist';

    public function __constructor ($id, $username, $email, $counter, $pfp, $bio){
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->counter = $counter;
        $this->pfp = $pfp;
        $this->bio = $bio;
    }

    public static function read() {
        $db = Database::getInstance();
        $conn = $db->connect();
        $query = 'SELECT
        A.id,
        A.username,
        A.email,
        A.passwd,
        A.counter,
        A.pfp,
        A.bio
        FROM ' . self::$table . 'as A';
        // Prepare
        $stmt = $conn->prepare($query);
    
        // Execute
        $stmt->execute();
        return $stmt;
      }

    public function getId () : int{
        return $this->id;
    }
    public function getUsername () : string {
        return $this->username;
    }
    public function setUsername ($username) {
        $this->username = $username;
    }
    public function getEmail () : string {
        return $this->email;
    }
    public function getCounter ($counter) : string {
        return $this->counter;
    }
    public function setCounter ($counter) {
        $this->counter = $counter;
    }
    public function getPfp () : string {
        return $this->pfp;
    }
    public function getBio () : string {
        return $this->bio;
    }
    public function setBio ($bio) {
        $this->bio = $bio;
    }
}
