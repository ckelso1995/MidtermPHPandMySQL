<!DOCTYPE html>
<html>
<head>
    <title>Add Vehicle</title>
   
    <style>
        .back-button {
            background-color: black;
            color: white;
            font-size: 10pt;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<body>
    <h1>Add Vehicle</h1>
    <form method="post" action="admin.php?action=add">
        <label for="year">Year:</label>
        <input type="number" name="year" id="year" required><br>

        <label for="model">Model:</label>
        <input type="text" name="model" id="model" required><br>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" required><br>

        <label for="type_id">Type:</label>
        <select name="type_id" id="type_id" required>
            <?php foreach ($types as $type):
                $type_id = htmlspecialchars($type['type_id']);
                $type_name = htmlspecialchars($type['Type']);
                ?>
                <option value="<?php echo $type_id; ?>">
                    <?php echo $type_name; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="class_id">Class:</label>
        <select name="class_id" id="class_id" required>
            <?php foreach ($classes as $class):
                $class_id = htmlspecialchars($class['ID']);
                $class_name = htmlspecialchars($class['Class']);
                ?>
                <option value="<?php echo $class_id; ?>">
                    <?php echo $class_name; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="make_id">Make:</label>
        <select name="make_id" id="make_id" required>
            <?php foreach ($makes as $make):
                $make_id = htmlspecialchars($make['ID']);
                $make_name = htmlspecialchars($make['Make']);
                ?>
                <option value="<?php echo $make_id; ?>">
                    <?php echo $make_name; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <input type="reset" value="Reset" />

        <button type="submit">Add Vehicle</button>
    </form>
    <br>
    <a href="admin.php" class="back-button">Back to Admin Page</a>
</body>
</html>








