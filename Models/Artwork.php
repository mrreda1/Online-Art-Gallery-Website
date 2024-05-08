<?php
include_once();

class Artwork{
    private int $id;
    private string $titel;
    private string $artworkPath;
    private string $description;
    private int $price;
    private int $width;
    private int $height;
    private date $date;
    private float $offer;
    private int $state = 0;

    public function __construct($id, $titel, $artworkPath, $description, $price, $width, $height){
        $this->id = id;
        $this->titel = titel;
        $this->ArtworkPath = ArtworkPath;
        $this->description = description;
        $this->price = price;
        $this->width = width;
        $this->height = height;
        $this->date = date(f j m);
    }

    public function geTtitel () : string {
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
}