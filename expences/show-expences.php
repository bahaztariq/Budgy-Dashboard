<?php
require './db_connect.php';
$sql = "SELECT * FROM incomes";
$result = mysqli_query($connect,$sql);
?>