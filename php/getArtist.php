<?php
include_once "api.php";


// Gets Paramore's information for dashboard.php
$url = "https://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=" . urlencode($artist) . "&api_key=$apiKey&format=json";


$response = file_get_contents($url);
$data = json_decode($response, true);

// Retrives only necesasry data
$aboutParamore = $data["artist"];
