<?php 
require_once 'config.php';
$stmt = $con->prepare("SELECT * FROM product");
$stmt->execute();
$result = $stmt->get_result();
$result;
?>