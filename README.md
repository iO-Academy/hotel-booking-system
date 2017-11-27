# hotel-booking-system
$app->get("/rooms")

GET

No request data
return json object of all 3 types of rooms 

{
  "data": [
    {
      "img_name": "single_bed",
      "room_type": "Standard room",
      "price": "57",
      "nights_ammount": "2"
    },
    {
      "img_name": "double_room",
      "room_type": "Double room",
      "price": "77",
      "nights_ammount": "3"
    },
    {
      "img_name": "vip_bed",
      "room_type": "VIP room",
      "price": "2777",
      "nights_ammount": "10"
    }
  ],
  "success": [true]
}
