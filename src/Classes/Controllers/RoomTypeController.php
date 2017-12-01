<?php

namespace App\Classes\Controllers;

use App\Classes\Models\AvailabilityGenerator;
use App\Classes\Models\RoomInfoGenerator;
use App\Classes\Models\RoomImageGenerator;
use App\Classes\Entities\RoomInfoEntity;
use Monolog\Logger;

class RoomTypeController
{
    private $logger;
    private $roomInfoGenerator;
    private $roomImageGenerator;
    private $availabilityGenerator;

    /**
     * RoomTypeController constructor.
     *
     * @param RoomInfoGenerator $roomInfoGenerator Gets room type info from the database
     * @param RoomImageGenerator $roomImageGenerator Gets room images from the database
     * @param AvailabilityGenerator $availabilityGenerator Gets availability from the database
     * @param Logger $logger The logger to use
     */
    public function __construct(RoomInfoGenerator $roomInfoGenerator, RoomImageGenerator $roomImageGenerator, AvailabilityGenerator $availabilityGenerator, Logger $logger)
    {
        $this->roomInfoGenerator = $roomInfoGenerator;
        $this->roomImageGenerator = $roomImageGenerator;
        $this->availabilityGenerator = $availabilityGenerator;
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
            $roomsInfo = $this->roomInfoGenerator->getRoomsInfo();
            foreach ($roomsInfo as $roomInfo) {
                $roomInfo->imgNames = $this->roomImageGenerator->getImagesForRoomType($roomInfo->id);
            }
            $output = ['data' => $roomsInfo, 'success' => true];
        } catch (\Exception $exception) {
            $this->logger->info($exception->getMessage());
            $output = ['success' => false];
        }
        return $output;
    }

    public function getAvailability($startDate, $endDate)
    {
        try {
//            $roomsInfo = $this->roomInfoGenerator->getRoomsInfo();
//            foreach ($roomsInfo as $roomInfo) {
//                $roomInfo->imgNames = $this->roomImageGenerator->getImagesForRoomType($roomInfo->id);
//            }
//            $output = ['data' => $roomsInfo, 'success' => true];
        } catch (\Exception $exception) {
            $this->logger->info($exception->getMessage());
            $output = ['success' => false];
        }
        return $output;
    }
}