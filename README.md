$app->get("/rooms")

GET

No request data return json object of all 3 types of rooms

$app->get(/rooms?check-in=(date)&check-out=(date))

GET date format DD/MM/YY check-in, check-out are dates from form send dates as get parameter using keys of check-in, check-out returns json object of all availiable rooms between dates

{
"data": [
{
"imgNames": [{"imgName": "single_bed"}, {"imgName": "double_room"}],
"name": "Standard room",
"pricePerNight": "57",
"description": "hi im ben",
"minStay": "2",
"numberOfAdults": "2",
"hasCot": "0",
"totalPriceOfStay": "100",
"numberOfNights": "3"
},
{
"imgNames": [{"imgName": "double_room"}, {"imgName": "single_bed"}],
"name": "Double room",
"pricePerNight": "77",
"description": "hi im ben",
"minStay": "3",
"numberOfAdults": "4",
"hasCot": "1",
"totalPriceOfStay": "250",
"numberOfNights": "3"
},
{
"imgNames": [{"imgName": "vip_bed"}, {"imgName": "single_bed"}],
"name": "VIP room",
"pricePerNight": "277",
"description": "hi im ben",
"minStay": "10",
"numberOfAdults": "10",
"hasCot": "0",
"totalPriceOfStay": "820",
"numberOfNights": "3"
}
],
"success": "true"
}