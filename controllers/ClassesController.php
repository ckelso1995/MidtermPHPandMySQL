<?php
require_once __DIR__ . '/../models/classes_db.php';

class ClassesController
{
    public function manageClasses()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['class'])) {
                ClassesDB::addClass($_POST['class']);
            } elseif (isset($_POST['classID'])) {
                ClassesDB::deleteClass($_POST['classID']);
            }
            header('Location: admin.php?action=manage_classes');
        } else {
            $classes = ClassesDB::getClasses();
            require __DIR__ . '/../views/manage_classes_view.php';
        }
    }
}
?>







