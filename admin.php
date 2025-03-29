<?php
//main for the admin page
require_once __DIR__ . '/controllers/VehicleController.php';
require_once __DIR__ . '/controllers/MakesController.php';
require_once __DIR__ . '/controllers/TypesController.php';
require_once __DIR__ . '/controllers/ClassesController.php';

$vehicleController = new VehicleController();
$makesController = new MakesController();
$typesController = new TypesController();
$classesController = new ClassesController();

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'delete') {
        $vehicleController->delete();
    } elseif ($_GET['action'] === 'add') {
        $vehicleController->add();
    } elseif ($_GET['action'] === 'manage_makes') {
        $makesController->manageMakes();
    } elseif ($_GET['action'] === 'manage_types') {
        $typesController->manageTypes();
    } elseif ($_GET['action'] === 'manage_classes') {
        $classesController->manageClasses();
    }
} else {
    $vehicleController->admin();
}
?>







