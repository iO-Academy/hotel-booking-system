$app->get("/rooms")

GET

No request data return json object of all 3 types of rooms

No request data
return json object of all 3 types of rooms 

{<br>
  "data": [<br>
    {<br>
      "imgNames": [{"imgName": "single_bed"}, {"imgName": "single_desk"}],<br>
      "name": "Standard room",<br>
      "pricePerNight": "57",<br>
      "minStay": "2",<br>
      "numberOfAdults": "2",<br>
      "hasCot": "0",<br>
      "description": "hi im ben"<br>
    },<br>
    {<br>
      "imgNames": [{"imgName": "double_bed"}, {"imgName": "double_room"}],<br>
      "name": "Double room",<br>
      "pricePerNight": "77",<br>
      "minStay": "3",<br>
      "numberOfAdults": "4",<br>
      "hasCot": "1"<br>
      "description": "hi im ben"<br>
    },<br>
    {<br>
      "imgNames": [{"imgName": "vip_bed"}, {"imgName": "vip_office"}, {"imgName": "vip_kitchen"}],<br>
      "name": "VIP room",<br>
      "pricePerNight": "2777",<br>
      "minStay": "10",<br>
      "numberOfAdults": "10",<br>
      "hasCot": "0"<br>
      "description": "hi im ben"<br>
    }<br>
  ],<br>
  "success": "true"<br>
}<br>


$app->get(/rooms?check-in=(date)&check-out=(date))

GET
date format DD/MM/YY
check-in, check-out are dates from form
send dates as get parameter using keys of check-in, check-out
returns json object of all availiable rooms between dates

{<br>
  "data": [<br>
    {<br>
      "imgNames": [{"imgName": "single_bed"}, {"imgName": "double_room"}],<br>
      "name": "Standard room",<br>
      "pricePerNight": "57",<br>
      "description": "hi im ben",<br>
      "minStay": "2",<br>
      "numberOfAdults": "2",<br>
      "hasCot": "0",<br>
      "totalPriceOfStay": "100",<br>
      "numberOfNights": "3"<br>
    },<br>
    {<br>
      "imgNames": [{"imgName": "double_room"}, {"imgName": "single_bed"}],<br>
      "name": "Double room",<br>
      "pricePerNight": "77",<br>
      "description": "hi im ben",<br>
      "minStay": "3",<br>
      "numberOfAdults": "4",<br>
      "hasCot": "1",<br>
      "totalPriceOfStay": "250",<br>
      "numberOfNights": "3"<br>
    },<br>
    {<br>
      "imgNames": [{"imgName": "vip_bed"}, {"imgName": "single_bed"}],<br>
      "name": "VIP room",<br>
      "pricePerNight": "277",<br>
      "description": "hi im ben",<br>
      "minStay": "10",<br>
      "numberOfAdults": "10",<br>
      "hasCot": "0",<br>
      "totalPriceOfStay": "820",<br>
      "numberOfNights": "3"<br>
    }<br>
  ],<br>
  "success": "true"<br>
}<br>
