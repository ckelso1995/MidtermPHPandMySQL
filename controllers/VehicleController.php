<?php
require_once __DIR__ . '/../models/vehicle_model.php';
require_once __DIR__ . '/../models/makes_db.php';
//main vehicle controller,
class VehicleController
{
    public function index()
    {
        $orderBy = isset($_GET['sort']) && in_array($_GET['sort'], ['year', 'price']) ? $_GET['sort'] : 'price';
        $filters = [
            'type_id' => $_GET['type_id'] ?? '',
            'class_id' => $_GET['class_id'] ?? '',
            'make_id' => $_GET['make_id'] ?? ''
        ];
        $vehicles = Vehicle::getVehicles($orderBy, $filters);
        $types = Vehicle::getTypes1();
        $classes = Vehicle::getClasses1();
        $makes = MakesDB::getMakes();
        require __DIR__ . '/../views/vehicle_view.php';
    }

    public function admin()
    {
        $orderBy = isset($_GET['sort']) && in_array($_GET['sort'], ['year', 'price']) ? $_GET['sort'] : 'price';
        $filters = [
            'type_id' => $_GET['type_id'] ?? '',
            'class_id' => $_GET['class_id'] ?? '',
            'make_id' => $_GET['make_id'] ?? ''
        ];
        $vehicles = Vehicle::getVehicles($orderBy, $filters);
        $types = Vehicle::getTypes1();
        $classes = Vehicle::getClasses1();
        $makes = MakesDB::getMakes();
        require __DIR__ . '/../views/admin_vehicle_view.php';
    }

    public function delete()
    {
        if (isset($_POST['mainID'])) {
            Vehicle::deleteVehicle($_POST['mainID']);
        }
        header('Location: admin.php');
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $year = $_POST['year'];
            $model = $_POST['model'];
            $price = $_POST['price'];
            $type_id = $_POST['type_id'];
            $class_id = $_POST['class_id'];
            $make_id = $_POST['make_id'];
            Vehicle::addVehicle($year, $model, $price, $type_id, $class_id, $make_id);
            header('Location: admin.php');
        } else {
            $types = Vehicle::getTypes1();
            $classes = Vehicle::getClasses1();
            $makes = MakesDB::getMakes();
            require __DIR__ . '/../views/add_vehicle_view.php';
        }
    }
}
?>










