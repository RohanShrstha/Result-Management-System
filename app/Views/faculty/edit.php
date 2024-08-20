<!DOCTYPE html>
<html>
<head>
    <title>Edit Faculty</title>
</head>
<body>
    <h1>Edit Faculty</h1>
    <form action="/rms/faculty/edit/<?php echo $faculty['id']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $faculty['name']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
