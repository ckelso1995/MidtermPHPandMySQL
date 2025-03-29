<?php
//main for the project
require_once __DIR__ . '/controllers/VehicleController.php';

$controller = new VehicleController();
$controller->index();
?>
