<?php

class Order{
    private int $id;
    private float $promotion;
    private string $address;
    private int $state;
    private int $buyerPhone;
    private Buyer $buyer;
    private Artwork $artwork;
    private static $table = 'Order';

    public static function read() {
        $db = Database::getInstance();
        $conn = $db->connect();
        $query = 'SELECT
        b.id,
        b.promotion,
        b.address,
        b.state,
        b.buyerPhone
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
    public function getPromotion () : float {
        return $this->promotion;
    }
    public function getAddress () : string {
        return $this->address;
    }
    public function getState () : string {
        return $this->state;
    }
    public function setState (int $state) {
        $this->state = $state;
    }
    public function getBuyerPhone () : int {
        return $this->buyerPhone;
    }
    public function setBuyerPhone (int $buyerPhone) {
        $this->buyerPhone = $buyerPhone;
    }
    public function getBuyer () : Buyer {
        return $this->buyer;
    }
    public function setBuyer (Buyer $buyer) {
        $this->buyer = $buyer;
    }
    public function getArtwork () : Artwork {
        return $this->artwork;
    }
    public function setArtwork (Artwork $artwork) {
        $this->artwork = $artwork;
    }

}