<!DOCTYPE html>
<html>
<head>
    <title>Grade List</title>
</head>
<body>
<h1>Grade List</h1>
<a href="/rms/grade/create">Create New Grade</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($grades as $grade): ?>
        <tr>
            <td><?php echo $grade['id']; ?></td>
            <td><?php echo $grade['name']; ?></td>
            <td>
                <a href="/rms/grade/show/<?php echo $grade['id']; ?>">View</a>
                <a href="/rms/grade/edit/<?php echo $grade['id']; ?>">Edit</a>
                <a href="/rms/grade/delete/<?php echo $grade['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
