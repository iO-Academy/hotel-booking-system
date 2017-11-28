<?php

namespace App\Classes\ModelMethods;
use App\Classes\Entities;

class RoomTypeGenerator
{
    private $db;
    private $logger;

    public function __construct(\PDO $db, $logger)
    {
        $this->db =$db;
        $this->logger = $logger;
    }

    public function getRoomTypes()
    {
        try {
            $query = $this->db->prepare("SELECT `id`,`name`,`pricePerNight`,`numberOfAdults`,`hasCot`,`minStay`,`description` FROM `roomTypes`;");
            $query->execute();
            $query->setFetchMode(\PDO::FETCH_CLASS, "RoomTypeEntity");
            $roomDetails = $query->fetchAll();
            return $roomDetails;
        }
        catch(\Exception $exception) {
            $this->logger->info("Room types not available");
        }
    }
    
//    public function getRoomTypes()
//    {
//        $roomDataToReturn = [];
//        $roomDataToReturn['data'] = [];
//        $roomDetails = $this->getRoomTypeData();
//
//        foreach ($roomDetails as $room) {
//            $details = [];
//            $details['name'] = $room['name'];
//            $details['pricePerNight'] = $room['pricePerNight'];
//            $details['numberOfAdults'] = $room['numberOfAdults'];
//            $details['hasCot'] = $room['hasCot'];
//            $details['minStay'] = $room['minStay'];
//            $details['description'] = $room['description'];
//            $details['imgNames'] = $this->getRoomImages((int)$room['id']);
//
//            array_push($roomDataToReturn['data'], $details);
//        }
//
//        $roomDataToReturn["success"] = true;
//
//        return $roomDataToReturn;
//    }
}

