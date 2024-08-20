<!DOCTYPE html>
<html>
<head>
    <title>Edit Faculty Details</title>
</head>
<body>
    <h1>Edit Faculty Details</h1>
    <form action="/rms/facultyDetails/edit/<?php echo $facultyDetails['id']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $facultyDetails['name']; ?>" required><br>

        <label for="gradeId">Grade Id:</label>
        <input type="text" name="gradeId" id="gradeId" value="<?php echo $facultyDetails['gradeId']; ?>" required><br>

        <label for="facultyId">Faculty Id:</label>
        <input type="text" name="facultyId" id="facultyId" value="<?php echo $facultyDetails['facultyId']; ?>" required><br>

        <label for="streamId">Stream Id:</label>
        <input type="text" name="streamId" id="streamId" value="<?php echo $facultyDetails['streamId']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
