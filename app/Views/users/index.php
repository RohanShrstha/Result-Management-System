<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <a href="/rms/user/create">Create New User</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['password']; ?></td>
                <td><?php echo $user['type']; ?></td>
                <td>
                    <a href="/rms/user/show/<?php echo $user['id']; ?>">View</a>
                    <a href="/rms/user/edit/<?php echo $user['id']; ?>">Edit</a>
                    <a href="/rms/user/delete/<?php echo $user['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
