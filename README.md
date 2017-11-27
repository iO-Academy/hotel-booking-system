$app->get("/rooms")

GET

No request data return json object of all 3 types of rooms

{
"data": [
{
"imgNames": [{"img": "single_bed"}, {"img": "single_desk"}],
"name": "Standard room",
"pricePerNight": "57",
"minStay": "2",
"numberInHotel": "6",
"numberOfAdults": "2",
"hasCot": "0"
},
{
"imgNames": [{"img": "double_bed"}, {"img": "double_room"}],
"name": "Double room",
"pricePerNight": "77",
"minStay": "3",
"numberInHotel": "2",
"numberOfAdults": "4",
"hasCot": "1"
},
{
"imgNames": [{"img": "vip_bed"}, {"img": "vip_office"}, {"img": "vip_kitchen"}],
"name": "VIP room",
"pricePerNight": "2777",
"minStay": "10",
"numberInHotel": "2",
"numberOfAdults": "10",
"hasCot": "0"
}
],
"success": [true]
}


here is a copy and paste version without line breaks

{ "data": [ { "imgNames": [{"img": "single_bed"}, {"img": "single_desk"}], "name": "Standard room", "pricePerNight": "57", "minStay": "2", "numberInHotel": "6", "numberOfAdults": "2", "hasCot": "0" }, { "imgNames": [{"img": "double_bed"}, {"img": "double_room"}], "name": "Double room", "pricePerNight": "77", "minStay": "3", "numberInHotel": "2", "numberOfAdults": "4", "hasCot": "1" }, { "imgNames": [{"img": "vip_bed"}, {"img": "vip_office"}, {"img": "vip_kitchen"}], "name": "VIP room", "pricePerNight": "2777", "minStay": "10", "numberInHotel": "2", "numberOfAdults": "10", "hasCot": "0" } ], "success": [true] }