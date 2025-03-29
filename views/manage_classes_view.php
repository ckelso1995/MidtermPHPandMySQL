<!DOCTYPE html>
<html>
<head>
    <title>Manage Classes</title>
</head>
<body>
    <h1>Manage Classes</h1>
    <form method="post" action="admin.php?action=manage_classes">
        <label for="class">Add Class:</label>
        <input type="text" name="class" id="class" required>
        <button type="submit">Add Class</button>
    </form>
    <br>
    <table border="1">
        <tr>
            <th>Class</th>
            <th>Action</th>
        </tr>
        <?php foreach ($classes as $class): ?>
        <tr>
            <td><?php echo htmlspecialchars($class['Class']); ?></td>
            <td>
                <form method="post" action="admin.php?action=manage_classes">
                    <input type="hidden" name="classID" value="<?php echo htmlspecialchars($class['ID']); ?>">
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







