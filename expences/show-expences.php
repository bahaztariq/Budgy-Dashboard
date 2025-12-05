<?php
require './db_connect.php';
$sql = "SELECT * FROM expences";
$result = mysqli_query($connect,$sql);
?>