<?php
include_once "api.php";


// Simulates random track
$url = "https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=" . urldecode($userName) . "&api_key=$apiKey&format=json&limit=1";


$response = file_get_contents($url);

$data = json_decode($response, true);



$recentTrack = $data["recenttracks"]["track"][0];
