<?php

namespace App\Classes\Models;

use App\Classes\Entities;
use Monolog\Logger;

class RoomImageGenerator
{
    private $db;
    private $logger;

    /**
     * RoomImageGenerator constructor.
     * @param \PDO $db The database connection to use.
     * @param Logger $logger The logger to use.
     */
    public function __construct(\PDO $db, Logger $logger)
    {
        $this->db = $db;
        $this->logger = $logger;
    }

    /**
     * Retrieves images for a room type from the database.
     *
     * @param int $roomTypeId The id of the room type you want to get images for.
     *
     * @return array An array of RoomImageEntity objects
     * @throws \Exception Something went wrong getting data from the database.
     */
    public function getImagesForRoomType(int $roomTypeId)
    {
        try {
            $query = $this->db->prepare("SELECT `imgName` FROM `roomImages` WHERE `roomType` = :roomType;");
            $query->bindParam(':roomType', $roomTypeId, \PDO::PARAM_INT);
            $query->execute();
            $query->setFetchMode(\PDO::FETCH_CLASS, Entities\RoomImageEntity::class);
            return $query->fetchAll();
        } catch (\Exception $exception) {
            $this->logger->info("Room images are not available");
            $this->logger->info($exception->getMessage());
            throw $exception;
        }
    }
}

