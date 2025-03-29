<?php
require_once 'config.php';

class MakesDB
{
    public static function getMakes()
    {
        global $conn;
        $result = $conn->query("SELECT ID, Make FROM makes");
        $makes = $result->fetch_all(MYSQLI_ASSOC);
        return $makes;
    }

    public static function addMake($make)
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO makes (Make) VALUES (?)");
        $stmt->bind_param('s', $make);
        $stmt->execute();
        $stmt->close();
    }

    public static function deleteMake($makeID)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM makes WHERE ID = ?");
        $stmt->bind_param('i', $makeID);
        $stmt->execute();
        $stmt->close();
    }
}
?>










