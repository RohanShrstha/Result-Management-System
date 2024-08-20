<!DOCTYPE html>
<html>
<head>
    <title>Edit Grade</title>
</head>
<body>
    <h1>Edit Grade</h1>
    <form action="/rms/Grade/edit/<?php echo $grade['id']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $grade['name']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
