<?php

use PHPUnit\Framework\TestCase;

require "../../../src/Classes/Models/RoomInfoGenerator.php";
require "../../../vendor/psr/log/Psr/Log/LoggerInterface.php";
require "../../../vendor/monolog/monolog/src/Monolog/Logger.php";

class RoomInfoGeneratorTest extends TestCase {
    public function testRoomInfoGeneratorTest() {
        $db = $this->createMock(\PDO::class);
        $logger = $this->createMock(\Monolog\Logger::class);
        $roomInfoGenerator = new \App\Classes\Models\RoomInfoGenerator($db, $logger);
        $this->assertTrue(is_object($roomInfoGenerator));
    }
}