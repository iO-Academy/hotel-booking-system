# hotel-booking-system
$app->get("/rooms")

GET

No request data
return json object of all 3 types of rooms 


{<br>
  "data": [<br>
    {<br>
      "imgNames": [{"imgName": "single_bed"}, {"imgName": "single_desk"}],<br>
      "name": "Standard room",<br>
      "pricePerNight": "57",<br>
      "minStay": "2",<br>
      "numberInHotel": "6",<br>
      "numberOfAdults": "2",<br>
      "hasCot": "0",<br>
      "description": "hi im ben"<br>
    },<br>
    {<br>
      "imgNames": [{"imgName": "double_bed"}, {"imgName": "double_room"}],<br>
      "name": "Double room",<br>
      "pricePerNight": "77",<br>
      "minStay": "3",<br>
      "numberInHotel": "2",<br>
      "numberOfAdults": "4",<br>
      "hasCot": "1"<br>
      "description": "hi im ben"<br>
    },<br>
    {<br>
      "imgNames": [{"imgName": "vip_bed"}, {"imgName": "vip_office"}, {"imgName": "vip_kitchen"}],<br>
      "name": "VIP room",<br>
      "pricePerNight": "2777",<br>
      "minStay": "10",<br>
      "numberInHotel": "2",<br>
      "numberOfAdults": "10",<br>
      "hasCot": "0"<br>
      "description": "hi im ben"<br>
    }<br>
  ],<br>
  "success": "true"<br>
}<br>
<br>
