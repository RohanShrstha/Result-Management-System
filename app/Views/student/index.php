<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>
<h1>Student List</h1>
<a href="/rms/student/create">Create New Student</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Guardian Name</th>
        <th>Contact</th>
        <th>Faculty Details</th>
    </tr>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student['id']; ?></td>
            <td><?php echo $student['name']; ?></td>
            <td><?php echo $student['address']; ?></td>
            <td><?php echo $student['guardianName']; ?></td>
            <td><?php echo $student['contact']; ?></td>
            <td><?php echo $student['facultyDetailsId']; ?></td>
            <td>
                <a href="/rms/student/edit/<?php echo $student['id']; ?>">Edit</a>
                <a href="/rms/student/delete/<?php echo $student['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
