<!DOCTYPE html>
<html>
<head>
    <title>Create Subject</title>
</head>
<body>
    <h1>Create Subject</h1>
    <form action="/rms/subject/create" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="theory">Theory:</label>
        <input type="text" name="theory" id="theory" required><br>

        <label for="practical">Practical:</label>
        <input type="text" name="practical" id="practical" required><br>

        <label for="passMarks">Pass marks:</label>
        <input type="text" name="passMarks" id="passMarks" required><br>

        <label for="fullMarks">Full marks:</label>
        <input type="text" name="fullMarks" id="fullMarks" required><br>

        <input type="submit" value="Create">
    </form>
</body>
</html>
