<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form action="/rms/student/edit/<?php echo $student['id']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $student['name']; ?>" required><br>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="<?php echo $student['address']; ?>" required><br>

        <label for="guardianName">Guardian Name:</label>
        <input type="text" name="guardianName" id="guardianName" value="<?php echo $student['guardianName']; ?>" required><br>

        <label for="contact">Contact:</label>
        <input type="text" name="contact" id="contact" value="<?php echo $student['contact']; ?>" required><br>

        <label for="facultyDetailsId">Faculty Details:</label>
        <select name="facultyDetailsId">
            <?php foreach ($facultyDetails as $detail): ?>
                <option value="<?php echo $detail['id']; ?>" <?php echo ($detail['id'] == $student['facultyDetailsId']) ? 'selected' : ''; ?>><?php echo $detail['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
