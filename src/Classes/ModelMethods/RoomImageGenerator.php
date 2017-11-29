<?php

namespace App\Classes\ModelMethods;

use App\Classes\Entities;

class RoomImageGenerator
{
    private $db;
    private $logger;

    public function __construct(\PDO $db, $logger)
    {
        $this->db = $db;
        $this->logger = $logger;
    }

    public function getImagesForRoomType(int $id)
    {
        try {
            $query = $this->db->prepare("SELECT `id`, `roomType`, `imgName` FROM `roomImages` WHERE `roomType` = :roomType;");
            $query->bindParam(':roomType', $id, \PDO::PARAM_INT);
            $query->execute();
            $query->setFetchMode(\PDO::FETCH_CLASS, \App\Classes\Entities\RoomImageEntity::class);
            return $query->fetchAll();
        } catch (\Exception $exception) {
            $this->logger->info("Room images are not available");
            $this->logger->info($exception->getMessage());
            throw $exception;
        }
    }
}

