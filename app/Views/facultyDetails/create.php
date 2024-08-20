<!DOCTYPE html>
<html>
<head>
    <title>Create Faculty Details</title>
</head>
<body>
    <h1>Create Faculty Details</h1>
    <form action="/rms/facultyDetails/create" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="gradeId">Grade Id:</label>
        <input type="text" name="gradeId" id="gradeId" required><br>

        <label for="facultyId">Faculty Id:</label>
        <input type="text" name="facultyId" id="facultyId" required><br>

        <label for="streamId">Stream Id:</label>
        <input type="text" name="streamId" id="streamId" required><br>

        <input type="submit" value="Create">
    </form>
</body>
</html>
