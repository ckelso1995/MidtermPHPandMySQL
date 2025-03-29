<?php
require_once 'config.php';

class TypesDB
{
    public static function getTypes()
    {
        global $conn;
        $result = $conn->query("SELECT type_id, Type FROM types");
        $types = $result->fetch_all(MYSQLI_ASSOC);
        return $types;
    }

    public static function addType($type)
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO types (Type) VALUES (?)");
        $stmt->bind_param('s', $type);
        $stmt->execute();
        $stmt->close();
    }

    public static function deleteType($typeID)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM types WHERE type_id = ?");
        $stmt->bind_param('i', $typeID);
        $stmt->execute();
        $stmt->close();
    }
}
?>










