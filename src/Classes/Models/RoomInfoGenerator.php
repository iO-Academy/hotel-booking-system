<?php

namespace App\Classes\Models;

use App\Classes\Entities;
use Monolog\Logger;

class RoomInfoGenerator
{
    private $db;
    private $logger;

    /**
     * RoomInfoGenerator constructor.
     * @param \PDO $db The database connection to use.
     * @param Logger $logger The logger to use.
     */
    public function __construct(\PDO $db, Logger $logger)
    {
        $this->db = $db;
        $this->logger = $logger;
    }

    /**
     * Retrieves info for all the room types from the database
     *
     * @return array An array of RoomInfoEntity objects.
     * @throws \Exception Something went wrong getting data from the database.
     */
    public function getRoomsInfo(): array
    {
        try {
            $query = $this->db->prepare("SELECT `id`,`name`,`pricePerNight`,`numberOfAdults`,`hasCot`,`minStay`,`description` FROM `roomTypes`;");
            $query->execute();
            $query->setFetchMode(\PDO::FETCH_CLASS, Entities\RoomInfoEntity::class);
            $roomDetails = $query->fetchAll();
            return $roomDetails;
        } catch (\Exception $exception) {
            $this->logger->info("Room info not available");
            $this->logger->info($exception->getMessage());
            throw $exception;
        }
    }
}

