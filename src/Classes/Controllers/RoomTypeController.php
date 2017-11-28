<?php

namespace App\Classes\Controllers;

use App\Classes\ModelMethods\RoomInfoGenerator;
use App\Classes\ModelMethods\RoomImageGenerator;
use App\Classes\Entities\RoomInfoEntity;

class RoomTypeController
{
    private $logger;
    private $roomInfoGenerator;
    private $roomImageGenerator;

    public function __construct(RoomInfoGenerator $roomInfoGenerator, RoomImageGenerator $roomImageGenerator, $logger)
    {
        $this->roomInfoGenerator = $roomInfoGenerator;
        $this->roomImageGenerator = $roomImageGenerator;
        $this->logger = $logger;
    }

    public function getRoomTypes()
    {
        $roomTypes = [];
        $roomsInfo = $this->roomInfoGenerator->getRoomsInfo();
        foreach ($roomsInfo as $roomInfo) {
            $roomType = [];
            $roomType['imgNames'] = [];
            $roomImages = $this->roomImageGenerator->getImagesForRoomType($roomInfo->id);
            foreach ($roomImages as $roomImage) {
                array_push($roomType['imgNames'], (object) ['imgName' => $roomImage->imgName]);
            }
                $roomType['name'] = $roomInfo->name;
                $roomType['pricePerNight'] = $roomInfo->pricePerNight;
                $roomType['minStay'] = $roomInfo->minStay;
                $roomType['numberInHotel'] = $roomInfo->numberInHotel;
                $roomType['numberOfAdults'] = $roomInfo->numberOfAdults;
                $roomType['hasCot'] = $roomInfo->hasCot;
                $roomType['description'] = $roomInfo->description;
                array_push($roomTypes, $roomType);
        }
        $output = ['data'=>$roomTypes, 'success'=>true];
        return $output;

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