<?php

class RoomTypes
{
    private function getRoomTypeData()
    {
        $query = $this->db->prepare("SELECT * FROM `roomTypes`;");
        $query->execute();

        $roomDetails = $query->fetchAll();
        return $roomDetails;
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
        $roomDetails = $this->getRoomTypeData();
        $roomImages = $this->getRoomImages();

        $roomDataToReturn = [];
        $roomDataToReturn[$data] = [];

        $roomDataToReturn["success"] = true;
    }
}

