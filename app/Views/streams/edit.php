<!DOCTYPE html>
<html>
<head>
    <title>Edit Streams</title>
</head>
<body>
    <h1>Edit Streams</h1>
    <form action="/rms/streams/edit/<?php echo $streams['id']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $streams['name']; ?>" required><br>
        <label for="facultyId">FacultyId:</label>
        <input type="text" name="facultyId" id="facultyId" value="<?php echo $streams['facultyId']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
