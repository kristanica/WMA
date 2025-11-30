<?php
include_once "connection.php";


if (isset($_POST["createComment"])) {
    $success = false;
    $name = $_POST["name"];
    $email = $_POST["email"];
    $comment = $_POST["comment"];
    $query = "INSERT INTO comment (name, email, comment) VALUES ('$name', '$email', '$comment')";


    if ($conn->query($query)) {
        $success = true;
        echo "<script>alert('Comment Added!')</script>";
    }
    $conn->close();
}
