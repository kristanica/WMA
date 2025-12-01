<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "paramore";
$port = "3307";
$conn = mysqli_connect($servername, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("coonection  Fialed" . $conn->connect_error);
}
