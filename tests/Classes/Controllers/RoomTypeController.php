<?php

use PHPUnit\Framework\TestCase;

require "../../../src/Classes/Controllers/RoomTypeController.php";
require "../../../src/Classes/Entities/RoomInfoEntity.php";
require "../../../src/Classes/Entities/RoomImageEntity.php";
require "../../../src/Classes/Models/RoomInfoGenerator.php";
require "../../../src/Classes/Models/RoomImageGenerator.php";
require "../../../vendor/psr/log/Psr/Log/LoggerInterface.php";
require "../../../vendor/monolog/monolog/src/Monolog/Logger.php";

class RoomTypeControllerTest extends TestCase
{
    public function testGetRoomTypesSuccess()
    {
        $roomInfoEntity = $this->createMock(App\Classes\Entities\RoomInfoEntity::class);
        $id = 2;
        $name = 'Bob';
        $pricePerNight = 12;
        $numberOfAdults = 13;
        $hasCot = 1;
        $minStay = 14;
        $numberInHotel = 15;
        $description = 'bla';

        $roomInfoEntity->id = $id;
        $roomInfoEntity->name = $name;
        $roomInfoEntity->pricePerNight = $pricePerNight;
        $roomInfoEntity->numberOfAdults = $numberOfAdults;
        $roomInfoEntity->hasCot = $hasCot;
        $roomInfoEntity->minStay = $minStay;
        $roomInfoEntity->numberInHotel = $numberInHotel;
        $roomInfoEntity->description = $description;

        $roomInfoArray = [$roomInfoEntity, $roomInfoEntity];

        $roomInfoGenerator = $this->createMock(App\Classes\Models\RoomInfoGenerator::class);
        $roomInfoGenerator->method('getRoomsInfo')->willReturn($roomInfoArray);

        $roomImageEntity = $this->createMock(App\Classes\Entities\RoomImageEntity::class);
        $roomImageEntity->imgName = 'example';

        $imagesArray = [$roomImageEntity, $roomImageEntity];

        $roomImageGenerator = $this->createMock(App\Classes\Models\RoomImageGenerator::class);
        $roomImageGenerator->method('getImagesForRoomType')->willReturn($imagesArray);

        $logger = $this->createMock(\Monolog\Logger::class);
        $roomTypeController = new \App\Classes\Controllers\RoomTypeController($roomInfoGenerator, $roomImageGenerator, $logger);
        $output = $roomTypeController->getRoomTypes();


        $this->assertEquals($output['success'], true);

        $this->assertTrue(is_array($output['data']));

        foreach ($output['data'] as $roomType) {
            $this->assertEquals($roomType->id, $id);
            $this->assertEquals($roomType->name, $name);
            $this->assertEquals($roomType->hasCot, $hasCot);
            $this->assertEquals($roomType->minStay, $minStay);
            $this->assertEquals($roomType->numberInHotel, $numberInHotel);
            $this->assertEquals($roomType->description, $description);
            $this->assertTrue(is_array($roomType->imgNames));
            $this->assertEquals($roomType->imgNames, $imagesArray);
            $this->assertEquals($roomType->pricePerNight, $pricePerNight);
            $this->assertEquals($roomType->numberOfAdults, $numberOfAdults);
        }
    }

    public function testGetRoomTypesFailure()
    {
        $roomInfoGenerator = $this->createMock(App\Classes\Models\RoomInfoGenerator::class);
        $roomInfoGenerator->method('getRoomsInfo')->willThrowException(new Exception());

        $roomImageGenerator = $this->createMock(App\Classes\Models\RoomImageGenerator::class);
        $roomImageGenerator->method('getImagesForRoomType')->willReturn([]);

        $logger = $this->createMock(\Monolog\Logger::class);
        $roomType = new \App\Classes\Controllers\RoomTypeController($roomInfoGenerator, $roomImageGenerator, $logger);
        $output = $roomType->getRoomTypes();

        $this->assertEquals($output['success'], false);
    }

}