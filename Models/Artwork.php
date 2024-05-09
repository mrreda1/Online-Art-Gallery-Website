<?php
require_once "Artist.php";

class Artwork{
    private int $id;
    private string $titel;
    private string $artworkPath;
    private string $description;
    private int $price;
    private int $width;
    private int $height;
    private $date;
    private float $offer;
    private Artist $artist;
    private static $state = 0;
    private static $table = 'Artwork';

    public static function read() {
        $db = Database::getInstance();
        $conn = $db->connect();
        $query = 'SELECT
        b.id,
        b.titel,
        b.artworkPath,
        b.description,
        b.price,
        b.width,
        b.heigth,
        b.date
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
    public function getTitel () : string {
        return $this->titel;
    }
    public function getArtworkPath () : string {
        return $this->artworkPath;
    }
    public function getDescription () : string {
        return $this->description;
    }
    public function getPrice () : string {
        return $this->price;
    }
    public function getWidth () : string {
        return $this->width;
    }
    public function getHeight () : string {
        return $this->height;
    }
    public function getOffer () : string {
        return $this->offer;
    }
    public function setOffer (float $offer) : string {
        return $this->offer = $offer / 100;
    }
    public function setState (int $state) {
        $this->state = $state;
    }
    public function getState () : int {
        return $this->state;
    }
}