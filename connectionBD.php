<?php

function openConnection() {
    $conn = mysqli_connect("localhost", "root", "", "bdsynths");
    return $conn;
}

function closeConnection($conn) {
    mysqli_close($conn);
}
?>
