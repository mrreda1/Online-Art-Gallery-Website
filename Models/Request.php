<?php
require_once "Buyer.php";

class Request{
    private int $id;
    private string $details;
    private $date;
    private bool $state = false;
    private Buyer $sender;
    private static $table = 'Request';

    public static function read() {
        $db = Database::getInstance();
        $conn = $db->connect();
        $query = 'SELECT
        b.id,
        b.details,
        b.date,
        b.state
        FROM ' . self::$table . ' as b WHERE state = ' . self::$state;
        // Prepare
        $stmt = $conn->prepare($query);
    
        // Execute
        $stmt->execute();
        return $stmt;
      }

    public function getId () : int {
        return $this->id;
    }
    public function getDetails () : string {
        return $this->details;
    }
    public function getState () : int {
        return $this->state;
    }
    public function getDate () : string {
        return $this->date;
    }
    public function getSender () : Buyer {
        return $this->sender;
    }    

}