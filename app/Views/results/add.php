<!DOCTYPE html>
<html>
<head>
    <title>Add Results</title>
</head>
<body>
<h1>Examination Details</h1>
<p>ID: <?php echo $examination['id']; ?></p>
<p>Name: <?php echo $examination['name']; ?></p>
<p>Year: <?php echo $examination['year']; ?></p>
<p>Faculty Detail Name: <?php echo $facultyDetails['name']; ?></p>
<p>Faculty Detail Id: <?php echo $facultyDetails['id']; ?></p>
<h2>Add Results</h2>
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
            <th rowspan="2">Action</th>
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
                <form action="/rms/result/updateResult" method="post">
                    <td>
                        <input type="hidden" name="studentId" value="<?php echo $d['studentDetail']['id']; ?>">
                        <input type="hidden" name="resultId" value="<?php echo $d['resultId']; ?>">
                        <input type="hidden" name="examinationId" value="<?php echo $examination['id']; ?>">
                        <input type="hidden" name="facultyDetailId" value="<?php echo $facultyDetails['id']; ?>">
                        <?php echo $d['studentDetail']['name']; ?>
                    </td>
                    <?php foreach ($d['marks'] as $marks): ?>
                        <td>
                            <div style="display: flex; justify-content: center">
                                <input type="hidden" name="marks[<?php echo $marks['subjectId']; ?>][subjectId]" value="<?php echo $marks['subjectId']; ?>">
                                <input type="hidden" name="marks[<?php echo $marks['subjectId']; ?>][id]" value="<?php echo $marks['id']; ?>">
                                <div style="width: 50%; border: 1px solid black;">
                                    <input type="text" name="marks[<?php echo $marks['subjectId']; ?>][practical]" value="<?php echo $marks['practical']; ?>">
                                </div>
                                <div style="width: 50%;  border: 1px solid black;">
                                    <input type="text" name="marks[<?php echo $marks['subjectId']; ?>][theory]" value="<?php echo $marks['theory']; ?>">
                                </div>
                            </div>
                        </td>
                    <?php endforeach; ?>
                    <td>
                        <button type="submit">Update</button>
                    </td>
                </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No faculty details assigned to examination.</p>
<?php endif; ?>

<!--<a href="/rms/examination/index">Back to List</a>-->
<a href="/rms/examination/viewResults/<?php echo $examination['id']; ?>/<?php echo $facultyDetails['id']; ?>">Back to List</a>

</body>
</html>
