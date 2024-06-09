<?php
$servername = "localhost";
$username = "Henrique1554cp&";
$password = "BDhenrique998%";
$dbname = "gitcoffe";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
