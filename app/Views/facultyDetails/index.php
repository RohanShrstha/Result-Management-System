<!DOCTYPE html>
<html>
<head>
    <title>Faculty Details List</title>
</head>
<body>
<h1>Faculty Details List</h1>
<a href="/rms/facultyDetails/create">Create New Faculty Details</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Grade</th>
        <th>Faculty</th>
        <th>Stream</th>
    </tr>
    <?php foreach ($facultyDetails as $facultyDetail): ?>
        <tr>
            <td><?php echo $facultyDetail['id']; ?></td>
            <td><?php echo $facultyDetail['name']; ?></td>
            <td><?php echo $facultyDetail['gradeId']; ?></td>
            <td><?php echo $facultyDetail['facultyId']; ?></td>
            <td><?php echo $facultyDetail['streamId']; ?></td>
            <td>
                <a href="/rms/facultyDetails/show/<?php echo $facultyDetail['id']; ?>">View</a>
                <a href="/rms/facultyDetails/edit/<?php echo $facultyDetail['id']; ?>">Edit</a>
                <a href="/rms/facultyDetails/delete/<?php echo $facultyDetail['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
