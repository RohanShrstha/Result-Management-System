<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
</head>
<body>
    <h1>Create Student</h1>
    <form action="/rms/student/create" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required><br>

        <label for="guardianName">Guardian Name:</label>
        <input type="text" name="guardianName" id="guardianName" required><br>

        <label for="contact">Contact:</label>
        <input type="text" name="contact" id="contact" required><br>

        <label for="facultyDetailsId">Faculty Details:</label>
        <select name="facultyDetailsId">
            <?php foreach ($facultyDetails as $detail): ?>
                <option value="<?php echo $detail['id']; ?>"><?php echo $detail['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
