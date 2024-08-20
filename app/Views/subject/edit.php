<!DOCTYPE html>
<html>
<head>
    <title>Edit Subject</title>
</head>
<body>
    <h1>Edit Subject</h1>
    <form action="/rms/subject/edit/<?php echo $subject['id']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $subject['name']; ?>" required><br>

        <label for="theory">Theory:</label>
        <input type="text" name="theory" id="theory" value="<?php echo $subject['theory']; ?>" required><br>

        <label for="practical">Practical:</label>
        <input type="text" name="practical" id="practical" value="<?php echo $subject['practical']; ?>" required><br>

        <label for="passMarks">Pass marks:</label>
        <input type="text" name="passMarks" id="passMarks" value="<?php echo $subject['passMarks']; ?>" required><br>

        <label for="fullMarks">Full marks:</label>
        <input type="text" name="fullMarks" id="fullMarks" value="<?php echo $subject['fullMarks']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
