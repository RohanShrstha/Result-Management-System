<!DOCTYPE html>
<html>
<head>
    <title>Examination List</title>
</head>
<body>
<h1>Examination List</h1>
<a href="/rms/examination/create">Create New Examination</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Year</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($examinations as $examination): ?>
        <tr>
            <td><?php echo $examination['id']; ?></td>
            <td><?php echo $examination['name']; ?></td>
            <td><?php echo $examination['year']; ?></td>
            <td>
                <a href="/rms/examination/show/<?php echo $examination['id']; ?>">View</a>
                <a href="/rms/examination/edit/<?php echo $examination['id']; ?>">Edit</a>
                <a href="/rms/examination/delete/<?php echo $examination['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
