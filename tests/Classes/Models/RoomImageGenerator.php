<?php

use PHPUnit\Framework\TestCase;

require "../../../src/Classes/Models/RoomImageGenerator.php";
require "../../../vendor/psr/log/Psr/Log/LoggerInterface.php";
require "../../../vendor/monolog/monolog/src/Monolog/Logger.php";

class RoomImageGeneratorTest extends TestCase {
    public function testRoomImageGeneratorTest() {
        $db = $this->createMock(\PDO::class);
        $logger = $this->createMock(\Monolog\Logger::class);
        $roomImageGenerator = new \App\Classes\Models\RoomImageGenerator($db, $logger);
        $this->assertTrue(is_object($roomImageGenerator));
    }
}