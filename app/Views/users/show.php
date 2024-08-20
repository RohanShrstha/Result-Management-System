<!DOCTYPE html>
<html>
<head>
    <title>View User</title>
</head>
<body>
    <h1>User Details</h1>
    <p>ID: <?php echo $user['id']; ?></p>
    <p>Name: <?php echo $user['name']; ?></p>
    <p>Email: <?php echo $user['email']; ?></p>
    <a href="/rms/user/index">Back to List</a>
</body>
</html>
