<!DOCTYPE html>
<html>
<head>
    <title>Zippys Used Autos - Vehicle List</title>
</head>
<body>
    <h1>Zippy Used Autos - Vehicle List</h1>
    <form method="get" action="">
        <label for="type_id">Type:</label>
        <select name="type_id" id="type_id">
            <option value="">All</option>
            <?php foreach ($types as $type): ?>
                <option value="<?php echo htmlspecialchars($type['type_id']); ?>" <?php echo isset($_GET['type_id']) && $_GET['type_id'] == $type['type_id'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($type['Type']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="class_id">Class:</label>
        <select name="class_id" id="class_id">
            <option value="">All</option>
            <?php foreach ($classes as $class): ?>
                <option value="<?php echo htmlspecialchars($class['ID']); ?>" <?php echo isset($_GET['class_id']) && $_GET['class_id'] == $class['ID'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($class['Class']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="make_id">Make:</label>
        <select name="make_id" id="make_id">
            <option value="">All</option>
            <?php foreach ($makes as $make): ?>
                <option value="<?php echo htmlspecialchars($make['ID']); ?>" <?php echo isset($_GET['make_id']) && $_GET['make_id'] == $make['ID'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($make['Make']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" name="sort" value="year">Sort by Year</button>
        <button type="submit" name="sort" value="price">Sort by Price</button>
    </form>
    <table border="1">
        <tr>
            <th>Year</th>
            <th>Model</th>
            <th>Price</th>
            <th>Type</th>
            <th>Class</th>
            <th>Make</th>
        </tr>
        <?php foreach ($vehicles as $vehicle): ?>
        <tr>
            <td><?php echo htmlspecialchars($vehicle['year']); ?></td>
            <td><?php echo htmlspecialchars($vehicle['model']); ?></td>
            <td><?php echo htmlspecialchars($vehicle['price']); ?></td>
            <td><?php echo htmlspecialchars($vehicle['Type']); ?></td>
            <td><?php echo htmlspecialchars($vehicle['Class']); ?></td>
            <td><?php echo htmlspecialchars($vehicle['Make']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>







