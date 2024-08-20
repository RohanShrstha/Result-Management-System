<!DOCTYPE html>
<html>
<head>
    <title>Faculty List</title>
</head>
<body>
<h1>Faculty List</h1>
<a href="/rms/faculty/create">Create New Faculty</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($faculties as $faculty): ?>
        <tr>
            <td><?php echo $faculty['id']; ?></td>
            <td><?php echo $faculty['name']; ?></td>
            <td>
                <a href="/rms/faculty/show/<?php echo $faculty['id']; ?>">View</a>
                <a href="/rms/faculty/edit/<?php echo $faculty['id']; ?>">Edit</a>
                <a href="/rms/faculty/delete/<?php echo $faculty['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
