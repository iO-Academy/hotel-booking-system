# hotel-booking-system

$app->get(/rooms?check-in=(date)&check-out=(date))

GET

date format DD/MM/YY
check-in, check-out are dates from form
send dates as get parameter using keys of check-in, check-out
returns json object of all availiable rooms between dates



$app->get("/rooms")

GET

No request data
return json object of all 3 types of rooms 
