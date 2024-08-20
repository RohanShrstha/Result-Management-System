<!DOCTYPE html>
<html>
<head>
    <title>Streams List</title>
</head>
<body>
<h1>Streams List</h1>
<a href="/rms/streams/create">Create New Streams</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($streams as $stream): ?>
        <tr>
            <td><?php echo $stream['id']; ?></td>
            <td><?php echo $stream['name']; ?></td>
            <td><?php echo $stream['facultyId']; ?></td>
            <td>
                <a href="/rms/streams/edit/<?php echo $stream['id']; ?>">Edit</a>
                <a href="/rms/streams/delete/<?php echo $stream['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
