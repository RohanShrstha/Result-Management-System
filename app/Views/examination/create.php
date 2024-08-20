<!DOCTYPE html>
<html>
<head>
    <title>Create Examination</title>
</head>
<body>
    <h1>Create Examination</h1>
    <form action="/rms/examination/create" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="year">Year:</label>
        <input type="text" name="year" id="year" required><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
