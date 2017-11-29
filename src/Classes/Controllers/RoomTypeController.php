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
        try {
            $roomTypes = [];
            $roomsInfo = $this->roomInfoGenerator->getRoomsInfo();
            foreach ($roomsInfo as $roomInfo) {
                $roomType = [];
                $roomType['imgNames'] = [];
                $roomImages = $this->roomImageGenerator->getImagesForRoomType($roomInfo->id);
                foreach ($roomImages as $roomImage) {
                    array_push($roomType['imgNames'], (object)['imgName' => $roomImage->imgName]);
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
            $output = ['data' => $roomTypes, 'success' => true];
        } catch (\Exception $exception) {
            $this->logger->info($exception->getMessage());
            $output = ['success' => false];
        }
        return $output;
    }
}