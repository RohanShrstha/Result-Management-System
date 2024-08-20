<!DOCTYPE html>
<html>
<head>
    <title>Create Grade</title>
</head>
<body>
    <h1>Create Grade</h1>
    <form action="/rms/grade/create" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
