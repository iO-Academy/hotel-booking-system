<?php

namespace App\Classes\ModelMethods;
use App\Classes\Entities;

class RoomInfoGenerator
{
    private $db;
    private $logger;

    public function __construct(\PDO $db, $logger)
    {
        $this->db =$db;
        $this->logger = $logger;
    }

    public function getRoomsInfo():array
    {
        try {
            $query = $this->db->prepare("SELECT `id`,`name`,`pricePerNight`,`numberOfAdults`,`hasCot`,`minStay`,`numberInHotel`,`description` FROM `roomTypes`;");
            $query->execute();
            $query->setFetchMode(\PDO::FETCH_CLASS, \App\Classes\Entities\RoomInfoEntity::class);
            $roomDetails = $query->fetchAll();
            return $roomDetails;
        }
        catch(\Exception $exception) {
            $this->logger->info("Room info not available");
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

