<?php

$host = "localhost";
$user = "root";
$pass = "superVarnoGeslo";
$db = "Snemanje na zahtevo";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
    die("Povezava ni uspela: " . $conn->connect_error);

}

echo "Povezava na bazo uspešna";