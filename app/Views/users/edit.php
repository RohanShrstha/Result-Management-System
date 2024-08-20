<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="/rms/user/edit/<?php echo $user['id']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $user['name']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
