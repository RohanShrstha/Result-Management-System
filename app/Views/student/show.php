<!DOCTYPE html>
<html>
<head>
    <title>View Student</title>
</head>
<body>
<h1>Student Details</h1>
<p>ID: <?php echo $student['id']; ?></p>
<p>Name: <?php echo $student['name']; ?></p>
<p>Address: <?php echo $student['address']; ?></p>
<p>Guardian Name: <?php echo $student['guardianName']; ?></p>
<p>Contact: <?php echo $student['contact']; ?></p>
<p>Faculty Details: <?php echo $student['facultyDetails']; ?></p>
<a href="/rms/student/index">Back to List</a>
</body>
</html>
