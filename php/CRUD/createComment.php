<?php
include_once "connection.php";


if (isset($_POST["createComment"])) {
    $success = false;
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
    $query = "INSERT INTO comment (name, email, comment) VALUES ('$name', '$email', '$comment')";


    if ($conn->query($query)) {
        $success = true;
        echo "<script>alert('Comment Added!')</script>";
    }
    $conn->close();
}
