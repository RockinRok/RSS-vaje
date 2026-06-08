<?php
include 'config/db.php'; // Povezava z bazo


if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    
    $sql = "DELETE FROM kontaktna_sporocila WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id); // 
        $stmt->execute();
        $stmt->close();
    }
}


header("Location: pregled.php");
exit();
?>