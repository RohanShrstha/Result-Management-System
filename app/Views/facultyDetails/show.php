<!DOCTYPE html>
<html>
<head>
    <title>View Faculty Details</title>
</head>
<body>
<h1>Faculty Details Info</h1>

<p>ID: <?php echo $facultyDetails['id']; ?></p>
<p>Grade Id: <?php echo $facultyDetails['gradeId']; ?></p>
<p>Faculty Id: <?php echo $facultyDetails['facultyId']; ?></p>
<p>Stream Id: <?php echo $facultyDetails['streamId']; ?></p>

<h2>Assigned Subjects</h2>
<?php if (!empty($assignedSubjects)): ?>
    <table border="1">
        <thead>
        <tr>
            <th>Subject Name</th>
            <th>Theory</th>
            <th>Practical</th>
            <th>Pass Marks</th>
            <th>Full Marks</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($assignedSubjects as $subject): ?>
            <tr>
                <td><?php echo $subject['name']; ?></td>
                <td><?php echo $subject['theory']; ?></td>
                <td><?php echo $subject['practical']; ?></td>
                <td><?php echo $subject['passMarks']; ?></td>
                <td><?php echo $subject['fullMarks']; ?></td>
                <td>
                    <form action="/rms/facultyDetails/removeSubject/<?php echo $facultyDetails['id']; ?>/<?php echo $subject['id']; ?>" method="POST">
                        <button type="submit">Remove</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No subjects assigned to this faculty detail.</p>
<?php endif; ?>

<h2>Add Subject</h2>
<form action="/rms/facultyDetails/addSubject/<?php echo $facultyDetails['id']; ?>" method="POST">
    <select name="subjectId">
        <?php foreach ($subjects as $subject): ?>
            <option value="<?php echo $subject['id']; ?>"><?php echo $subject['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Add Subject</button>
</form>

<a href="/rms/facultyDetails/index">Back to List</a>
</body>
</html>
