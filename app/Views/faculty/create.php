<!DOCTYPE html>
<html>
<head>
    <title>Create Faculty</title>
</head>
<body>
    <h1>Create Faculty</h1>
    <form action="/rms/faculty/create" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
