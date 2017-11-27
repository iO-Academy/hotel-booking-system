# hotel-booking-system
$app->get("/rooms")

GET

No request data
return json object of all 3 types of rooms 


{<br>
  "data": [<br>
    {<br>
      "img_name": "single_bed",<br>
      "room_type": "Standard room",<br>
      "price": "57",<br>
      "nights_ammount": "2"<br>
    },<br>
    {<br>
      "img_name": "double_room",<br>
      "room_type": "Double room",<br>
      "price": "77",<br>
      "nights_ammount": "3"<br>
    },<br>
    {<br>
      "img_name": "vip_bed",<br>
      "room_type": "VIP room",<br>
      "price": "2777",<br>
      "nights_ammount": "10"<br>
    }<br>
  ],<br>
  "success": [true]<br>
}<br>
<br>

here is a copy and paste version without line breaks
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
