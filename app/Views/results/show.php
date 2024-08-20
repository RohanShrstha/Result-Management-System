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
<p>Faculty Detail Name: <?php echo $facultyDetails['name']; ?></p>
<p>Faculty Detail Id: <?php echo $facultyDetails['id']; ?></p>

<a href="/rms/examination/addResults/<?php echo $examination['id']; ?>/<?php echo $facultyDetails['id']; ?>">
    <button>Add result</button>
</a>
<h2>Results</h2>
<?php if (!empty($data)): ?>
    <table border="1">
        <thead>
        <tr>
            <th rowspan="2">Student Name</th>
            <?php foreach ($subjectDetails as $subject):?>
            <th>
                <?php echo $subject['name'];?>
            </th>
            <?php endforeach;?>
            <th rowspan="2">Grade</th>
            <th rowspan="2">Percentage</th>
            <th rowspan="2">Rank</th>
        </tr>
        <tr>
            <?php foreach ($subjectDetails as $subject): ?>
                <th>
                    <div style="display: flex; justify-content: center">
                        <div style="width: 50%; border: 1px solid black;">Practical</div>
                        <div style="width: 50%;  border: 1px solid black;">Theory</div>
                    </div>
                </th>
            <?php endforeach; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $d): ?>
            <tr>
                <td><?php echo $d['studentDetail']['name']; ?></td>
                <?php foreach ($d['marks'] as $marks):?>
                    <td>
                        <div style="display: flex; justify-content: center">
                            <div style="width: 50%; border: 1px solid black;">
                                <?php echo $marks['practical'];?>
                            </div>
                            <div style="width: 50%;  border: 1px solid black;">
                                <?php echo $marks['theory'];?>
                            </div>
                        </div>
                    </td>
                <?php endforeach;?>
                <td><?php $d['grade'];?></td>
                <td><?php echo $d['percentage'];?></td>
                <td><?php $d['rank'];?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No faculty details assigned to examination.</p>
<?php endif; ?>

<a href="/rms/examination/index">Back to List</a>
</body>
</html>
