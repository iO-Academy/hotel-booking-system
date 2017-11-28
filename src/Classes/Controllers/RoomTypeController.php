<?php

namespace App\Classes\Controllers;

use App\Classes\ModelMethods\RoomTypeGenerator;
use App\Classes\ModelMethods\RoomImageGenerator;

class RoomTypeController
{
    private $logger;
    private $roomTypeGenerator;
    private $roomImageGenerator;

    public function __construct(RoomTypeGenerator $roomTypeGenerator, RoomImageGenerator $roomImageGenerator, $logger)
    {
        $this->roomTypeGenerator = $roomTypeGenerator;
        $this->roomImageGenerator = $roomImageGenerator;
        $this->logger = $logger;
    }

    public function getRoomTypeInformation()
    {
        $roomTypes = $this->roomTypeGenerator->getRoomTypes();
        

//        return '{
//            "data": [
//    {
//        "imgNames": [{"img": "single_bed"}, {"img": "single_desk"}],
//      "name": "Standard room",
//      "pricePerNight": "57",
//      "minStay": "2",
//      "numberInHotel": "6",
//      "numberOfAdults": "2",
//      "hasCot": "0"
//    },
//    {
//        "imgNames": [{"img": "double_bed"}, {"img": "double_room"}],
//      "name": "Double room",
//      "pricePerNight": "77",
//      "minStay": "3",
//      "numberInHotel": "2",
//      "numberOfAdults": "4",
//      "hasCot": "1"
//    },
//    {
//        "imgNames": [{"img": "vip_bed"}, {"img": "vip_office"}, {"img": "vip_kitchen"}],
//      "name": "VIP room",
//      "pricePerNight": "2777",
//      "minStay": "10",
//      "numberInHotel": "2",
//      "numberOfAdults": "10",
//      "hasCot": "0"
//    }
//  ],
//  "success": [true]
//}';
    }
}