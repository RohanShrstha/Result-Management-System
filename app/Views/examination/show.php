<!DOCTYPE html>
<html>
<head>
    <title>View Examination</title>
</head>
<body>
<h1>Examination Details</h1>
<p>ID: <?php echo $examination['id']; ?></p>
<p>Name: <?php echo $examination['name']; ?></p>
<p>Year: <?php echo $examination['year']; ?></p>
<h2>Add Faculty</h2>
<?php if (!empty($assignedFacultyDetails)): ?>
    <table border="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($assignedFacultyDetails as $facultyDetail): ?>
            <tr>
                <td><?php echo $facultyDetail['name']; ?></td>
                <td>
                    <form action="/rms/examination/removeFacultyDetails/<?php echo $examination['id']; ?>/<?php echo $facultyDetail['id']; ?>" method="POST">
                        <button type="submit">Remove</button>
                    </form>
                    <a href="/rms/examination/viewResults/<?php echo $examination['id']; ?>/<?php echo $facultyDetail['id']; ?>">
                        <button type="submit">View Results</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No faculty details assigned to examination.</p>
<?php endif; ?>

<h2>Add Faculty</h2>
<form action="/rms/examination/addFacultyDetails/<?php echo $examination['id']; ?>" method="POST">
    <select name="detailId">
        <?php foreach ($facultyDetails as $detail): ?>
            <option value="<?php echo $detail['id']; ?>"><?php echo $detail['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Add Faculty Detail</button>
</form>

<a href="/rms/examination/index">Back to List</a>
</body>
</html>
