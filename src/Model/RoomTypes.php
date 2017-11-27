<?php

class RoomTypes
{
    private function getRoomTypeData()
    {
        $query = $this->db->prepare("SELECT * FROM `roomTypes`;");
        $query->execute();

        $rooms = $query->fetchAll();
        return $rooms;
    }

    private function getRoomImages()
    {
        $query = $this->db->prepare("SELECT `roomType`,`location` FROM `roomImages`;");
        $query->execute();

        $roomImages = $query->fetchAll();
        return $roomImages;
    }
    
    protected function createRoomObject()
    {
        $rooms = $this->getRoomTypeData();
        $roomImages = $this->getRoomImages();

        $roomDataToReturn = [];
    }
}

