
<!DOCTYPE html>
<html>
<head>
    <title>Manage Makes</title>
</head>
<body>
    <h1>Manage Makes</h1>
    <form method="post" action="admin.php?action=manage_makes">
        <label for="make">Add Make:</label>
        <input type="text" name="make" id="make" required>
        <button type="submit">Add Make</button>
    </form>
    <br>
    <table border="1">
        <tr>
            <th>Make</th>
            <th>Action</th>
        </tr>
        <?php foreach ($makes as $make): ?>
        <tr>
            <td><?php echo htmlspecialchars($make['Make']); ?></td>
            <td>
                <form method="post" action="admin.php?action=manage_makes">
                    <input type="hidden" name="makeID" value="<?php echo htmlspecialchars($make['ID']); ?>">
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







