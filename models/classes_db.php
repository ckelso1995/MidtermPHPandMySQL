<?php
require_once 'config.php';

class ClassesDB
{
    public static function getClasses()
    {
        global $conn;
        $result = $conn->query("SELECT ID, Class FROM classes");
        $classes = $result->fetch_all(MYSQLI_ASSOC);
        return $classes;
    }

    public static function addClass($class)
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO classes (Class) VALUES (?)");
        $stmt->bind_param('s', $class);
        $stmt->execute();
        $stmt->close();
    }

    public static function deleteClass($classID)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM classes WHERE ID = ?");
        $stmt->bind_param('i', $classID);
        $stmt->execute();
        $stmt->close();
    }
}
?>









