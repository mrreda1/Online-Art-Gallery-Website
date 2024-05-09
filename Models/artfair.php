<?php
class Artfair{
    private int $id;
    private string $titel;
    private string $location;
    private string $description;
    private $date;
    private bool $available;
    private static $table = 'Artfair';

    public static function read() {
        $db = Database::getInstance();
        $conn = $db->connect();
        $query = 'SELECT
        A.id,
        A.titel,
        A.location,
        A.description,
        A.date,
        A.available
        FROM ' . self::$table . ' as A WHERE available = ' . self::$available;
        // Prepare
        $stmt = $conn->prepare($query);
    
        // Execute
        $stmt->execute();
        return $stmt;
      }

    public function getId () : int {
        return $this->id;
    }
    public function getTitel () : string {
        return $this->titel;
    }
    public function setTitel ($titel) {
        $this->titel = $titel;
    }
    public function getDate () : string {
        return $this->date;
    }
    public function getLocation () : string {
        return $this->location;
    }
    public function getDescription () : string {
        return $this->description;
    }
    public function getAvailable () : bool {
        return $this->available;
    }

}