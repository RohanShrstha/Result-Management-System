<!DOCTYPE html>
<html>
<head>
    <title>Edit Examination</title>
</head>
<body>
    <h1>Edit Examination</h1>
    <form action="/rms/examination/edit/<?php echo $examination['id']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $examination['name']; ?>" required><br>
        <label for="year">Year:</label>
        <input type="text" name="year" id="year" value="<?php echo $examination['year']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
