<?php

namespace App\Classes\Controllers;

use App\Classes\Models\RoomInfoGenerator;
use App\Classes\Models\RoomImageGenerator;
use App\Classes\Entities\RoomInfoEntity;
use Monolog\Logger;

class RoomTypeController
{
    private $logger;
    private $roomInfoGenerator;
    private $roomImageGenerator;

    /**
     * RoomTypeController constructor.
     *
     * @param RoomInfoGenerator $roomInfoGenerator Gets room type info from the database
     * @param RoomImageGenerator $roomImageGenerator Gets room images from the database
     * @param Logger $logger The logger to use
     */
    public function __construct(RoomInfoGenerator $roomInfoGenerator, RoomImageGenerator $roomImageGenerator, Logger $logger)
    {
        $this->roomInfoGenerator = $roomInfoGenerator;
        $this->roomImageGenerator = $roomImageGenerator;
        $this->logger = $logger;
    }

    /**
     * Uses the generator classes to retrieve data for room types and formats it to be converted to a JSON object
     *
     * @return array ready to be converted to a JSON object
     */
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
                    array_push($roomType['imgNames'], $roomImage);
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