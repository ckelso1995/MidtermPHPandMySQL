<?php
require_once __DIR__ . '/../models/types_db.php';

class TypesController
{
    public function manageTypes()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['type'])) {
                TypesDB::addType($_POST['type']);
            } elseif (isset($_POST['typeID'])) {
                TypesDB::deleteType($_POST['typeID']);
            }
            header('Location: admin.php?action=manage_types');
        } else {
            $types = TypesDB::getTypes();
            require __DIR__ . '/../views/manage_types_view.php';
        }
    }
}
?>






