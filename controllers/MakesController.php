<?php
require_once __DIR__ . '/../models/makes_db.php';

class MakesController
{
    public function manageMakes()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['make'])) {
                MakesDB::addMake($_POST['make']);
            } elseif (isset($_POST['makeID'])) {
                MakesDB::deleteMake($_POST['makeID']);
            }
            header('Location: admin.php?action=manage_makes');
        } else {
            $makes = MakesDB::getMakes();
            require __DIR__ . '/../views/manage_makes_view.php';
        }
    }
}
?>





