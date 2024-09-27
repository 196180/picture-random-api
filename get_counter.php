<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once 'counter.php';
$counterData = getCounterData();
echo json_encode($counterData);
?>
