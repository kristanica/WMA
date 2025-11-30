<?php
include_once "connection.php";


$query = "SELECT * FROM comment";

$result = $conn->query($query);
$comment = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $comment[] = $row;
    }
} else {
    echo "<script>alert('Failed to Query'.$conn->error.')</script>";
}
