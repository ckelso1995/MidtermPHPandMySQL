<!DOCTYPE html>
<html>
<head>
    <title>Manage Types</title>
</head>
<body>
    <h1>Manage Types</h1>
    <form method="post" action="admin.php?action=manage_types">
        <label for="type">Add Type:</label>
        <input type="text" name="type" id="type" required>
        <button type="submit">Add Type</button>
    </form>
    <br>
    <table border="1">
        <tr>
            <th>Type</th>
            <th>Action</th>
        </tr>
        <?php foreach ($types as $type): ?>
        <tr>
            <td><?php echo htmlspecialchars($type['Type']); ?></td>
            <td>
                <form method="post" action="admin.php?action=manage_types">
                    <input type="hidden" name="typeID" value="<?php echo htmlspecialchars($type['type_id']); ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="admin.php" class="back-button">Back to Admin</a>
</body>
</html>






