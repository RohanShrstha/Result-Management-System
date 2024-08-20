<!DOCTYPE html>
<html>
<head>
    <title>Grade List</title>
</head>
<body>
<h1>Subject List</h1>
<a href="/rms/subject/create">Create New Subject</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Theory</th>
        <th>Practical</th>
        <th>Pass Marks</th>
        <th>Full Marks</th>
    </tr>
    <?php foreach ($subjects as $subject): ?>
        <tr>
            <td><?php echo $subject['id']; ?></td>
            <td><?php echo $subject['name']; ?></td>
            <td><?php echo $subject['theory']; ?></td>
            <td><?php echo $subject['practical']; ?></td>
            <td><?php echo $subject['passMarks']; ?></td>
            <td><?php echo $subject['fullMarks']; ?></td>
            <td>
                <a href="/rms/subject/edit/<?php echo $subject['id']; ?>">Edit</a>
                <a href="/rms/subject/delete/<?php echo $subject['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
