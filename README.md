# hotel-booking-system
$app->get("/rooms")

GET

No request data
return json object of all 3 types of rooms 


{<br>
  "data": [<br>
    {<br>
      "imgNames": ["single_bed", "single_desk"],<br>
      "name": "Standard room",<br>
      "pricePerNight": "57",<br>
      "minStay": "2",<br>
      "numberInHotel": "6",<br>
      "numberOfAdults": "2",<br>
      "hasCot": "0"<br>
    },<br>
    {<br>
      "imgNames": ["double_room", ect, ect],<br>
      "name": "Double room",<br>
      "pricePerNight": "77",<br>
      "minStay": "3"<br>,
      "numberInHotel": "2",<br>
      "numberOfAdults": "4",<br>
      "hasCot": "1"<br>
    },<br>
    {<br>
      "imgNames": ["vip_bed", "vip_kitchen", ect],<br>
      "name": "VIP room",<br>
      "pricePerNight": "2777",<br>
      "minStay": "10"<br>,
      "numberInHotel": "2",<br>
      "numberOfAdults": "10",<br>
      "hasCot": "0"<br>
    }<br>
  ],<br>
  "success": [true]<br>
}<br>
<br>

here is a copy and paste version without line breaks
{
  "data": [
    {
      "imgNames": ["single_bed"],
      "name": "Standard room",
      "pricePerNight": "57",
      "minStay": "2"
      "numberInHotel": "6",
      "numberOfAdults": "2",
      "hasCot": "0"
    },
    {
      "imgNames": ["double_room"],
      "name": "Double room",
      "pricePerNight": "77",
      "minStay": "3"
      "numberInHotel": "2",
      "numberOfAdults": "4",
      "hasCot": "1"
    },
    {
      "imgNames": ["vip_bed"],
      "name": "VIP room",
      "pricePerNight": "2777",
      "minStay": "10"
      "numberInHotel": "2",
      "numberOfAdults": "10",
      "hasCot": "0"
    }
  ],
  "success": [true]
}
