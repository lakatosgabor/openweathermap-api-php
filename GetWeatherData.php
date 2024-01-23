<?php
function getWeatherData($lat, $lon, $date) {
    $openweathermapUrl = "http://api.openweathermap.org/data/2.5/weather?";

    $apiParams = array(
        "lat" => $lat,
        "lon" => $lon,
        "dt" => strtotime($date),
        "appid" => "YOUR_API_KEY",
        "units" => "metric",
    );

    $openweathermapApiResponse = file_get_contents($openweathermapUrl . http_build_query($apiParams));
    $data = json_decode($openweathermapApiResponse, true);

    if ($http_response_header[0] != "HTTP/1.1 200 OK") {
        return -1;
    }

    return $data;
}


$lat = "47.497913";
$lon = "19.040236";
$date = "2024-01-23"; // YYYY-MM-DD

$weatherData = getWeatherData($lat, $lon, $date);

if ($weatherData === -1){
    print("Hiba!");
}
else{
    print_r($weatherData);
}
