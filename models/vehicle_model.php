<?php
require_once 'config.php';

class Vehicle
{
    public static function getVehicles($orderBy = 'price', $filters = [])
    {
        global $conn;
        $orderBy = in_array($orderBy, ['price', 'year']) ? $orderBy : 'price';
        $sql = "SELECT v.MainID, v.year, v.model, v.price, typealias.Type, classalias.Class, makealias.Make 
                FROM vehicles v
                JOIN types typealias ON v.type_id = typealias.type_id
                JOIN classes classalias ON v.class_id = classalias.ID
                JOIN makes makealias ON v.make_id = makealias.ID";

        $conditions = [];
        $params = [];
        $types = '';
        if (!empty($filters['type_id'])) {
            $conditions[] = 'v.type_id = ?';
            $params[] = $filters['type_id'];
            $types .= 'i';
        }
        if (!empty($filters['class_id'])) {
            $conditions[] = 'v.class_id = ?';
            $params[] = $filters['class_id'];
            $types .= 'i';
        }
        if (!empty($filters['make_id'])) {
            $conditions[] = 'v.make_id = ?';
            $params[] = $filters['make_id'];
            $types .= 'i';
        }
        if ($conditions) {
            $sql .= ' WHERE ' . implode(' AND ', $conditions);
        }

        $sql .= " ORDER BY $orderBy DESC";
        $stmt = $conn->prepare($sql);
        if ($params) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $vehicles = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $vehicles;
    }

    public static function getTypes1()
    {
        global $conn;
        $result = $conn->query("SELECT type_id, Type FROM types");
        $types = $result->fetch_all(MYSQLI_ASSOC);
        return $types;
    }

    public static function getClasses1()
    {
        global $conn;
        $result = $conn->query("SELECT ID, Class FROM classes");
        $classes = $result->fetch_all(MYSQLI_ASSOC);
        return $classes;
    }

    public static function getMakes()
    {
        global $conn;
        $result = $conn->query("SELECT ID, Make FROM makes");
        $makes = $result->fetch_all(MYSQLI_ASSOC);
        return $makes;
    }

    public static function deleteVehicle($mainID)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM vehicles WHERE MainID = ?");
        $stmt->bind_param('i', $mainID);
        $stmt->execute();
        $stmt->close();
    }

    public static function addVehicle($year, $model, $price, $type_id, $class_id, $make_id)
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO vehicles (year, model, price, type_id, class_id, make_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('isdiis', $year, $model, $price, $type_id, $class_id, $make_id);
        $stmt->execute();
        $stmt->close();
    }
}
?>










