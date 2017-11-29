<?php

namespace App\Classes\ModelMethods;

use App\Classes\Entities;

class RoomInfoGenerator
{
    private $db;
    private $logger;

    public function __construct(\PDO $db, $logger)
    {
        $this->db = $db;
        $this->logger = $logger;
    }

    public function getRoomsInfo(): array
    {
        try {
            $query = $this->db->prepare("SELECT `id`,`name`,`pricePerNight`,`numberOfAdults`,`hasCot`,`minStay`,`numberInHotel`,`description` FROM `roomTypes`;");
            $query->execute();
            $query->setFetchMode(\PDO::FETCH_CLASS, \App\Classes\Entities\RoomInfoEntity::class);
            $roomDetails = $query->fetchAll();
            return $roomDetails;
        } catch (\Exception $exception) {
            $this->logger->info("Room info not available");
            $this->logger->info($exception->getMessage());
            throw $exception;
        }
    }
}

