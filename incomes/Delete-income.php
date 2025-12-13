<?php
require('../db_connect.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $connect->prepare("DELETE FROM incomes WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if($stmt->execute()) {
        header("Location: ../expences.php?message=deleted");
        exit();
    } else {
        header("Location: ../expences.php?error=delete_failed");
        exit();
    }
    
    $stmt->close();
} else {
    header("Location: ../expences.php");
    exit();
}
?>