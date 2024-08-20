<!DOCTYPE html>
<html>
<head>
    <title>Create Streams</title>
</head>
<body>
    <h1>Create Streams</h1>
    <form action="/rms/streams/create" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="facultyId">FacultyId:</label>
        <input type="text" name="facultyId" id="facultyId" required><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
