<?php
class Result extends Model {
    // Retrieve all results
    public function getAll() {
        return $this->query("SELECT * FROM results")->fetch_all(MYSQLI_ASSOC);
    }

    // Retrieve a single result by ID
    public function getById($id) {
        $id = $this->escape($id);
        $result = $this->query("SELECT * FROM results WHERE id = '$id'");
        return $result->fetch_assoc();
    }

    public function getAllByExaminationId($examinationId): array
    {
        $examinationId = $this->escape($examinationId);
        return $this->query("SELECT * FROM results WHERE examinationId = '$examinationId' ")->fetch_all(MYSQLI_ASSOC);
    }

    // Retrieve all marks associated with a specific result
    public function getMarksByResultId($resultId): array
    {
        $resultId = $this->escape($resultId);
        return $this->query("SELECT * FROM result_marks WHERE resultId = '$resultId'")->fetch_all(MYSQLI_ASSOC);
    }

    // Create a new result
    public function create($data) {
        $examinationId = $this->escape($data['examinationId']);
        $facultyDetailId = $this->escape($data['facultyDetailId']);
        $studentId = $this->escape($data['studentId']);
        $grade = $this->escape($data['grade']);
        $percentage = $this->escape($data['percentage']);
        $rank = $this->escape($data['rank']);

        // Insert into results table
        $this->query("INSERT INTO results (examinationId, facultyDetailId, studentId, grade, percentage, rank)
                      VALUES ('$examinationId', '$facultyDetailId', '$studentId', '$grade', '$percentage', '$rank')");
        $resultId = $this->db->insert_id;

        // Insert marks for the result
        foreach ($data['marksIds'] as $marksId) {
            $marksId = $this->escape($marksId);
            $this->query("INSERT INTO result_marks (resultId, marksId) VALUES ('$resultId', '$marksId')");
        }
    }

    public function createWithSubjects($data): array
    {
        // Escape the input data
        $examinationId = $this->escape($data['examinationId']);
        $facultyDetailId = $this->escape($data['facultyDetailId']);

        // Load necessary models
        $facultyDetailsModel = $this->loadModel('FacultyDetails');
        $studentModel = $this->loadModel('Student');

        $students = $studentModel->getAllByFacultyDetailsId($facultyDetailId);
        $subjects = $facultyDetailsModel->getSubjectsByFacultyDetailId($facultyDetailId);

        // Start a transaction
        $this->db->begin_transaction();

        try {
            foreach ($students as $student) {
                $studentId = $student['id'];
                $this->query("INSERT INTO results (examinationId, facultyDetailId, studentId)
                      VALUES ('$examinationId', '$facultyDetailId', '$studentId')");
                $resultId = $this->db->insert_id;

                foreach ($subjects as $subject) {
                    $subjectId = $subject['id'];

                    $this->query("INSERT INTO marks (subjectId) VALUES ('$subjectId')");
                    $marksId = $this->db->insert_id;

                    $this->query("INSERT INTO result_marks (resultId, marksId) VALUES ('$resultId', '$marksId')");
                }
            }

            $this->db->commit();
            return [
                'status' => 'success',
            ];
        } catch (Exception $e) {
            $this->db->rollback();
            return [
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage()
            ];
        }
    }


    // Update an existing result
    public function update($id, $data) {
        $id = $this->escape($id);
        $existingResult = $this->query("SELECT * FROM results WHERE id = '$id'")->fetch_assoc();

        $marksModel = $this->loadModel('Marks');
        $subjectModel = $this->loadModel('Subject');

        $totalMarksObtained = 0;
        $totalMaxMarks = 0;

        foreach ($data['marks'] as $mark) {
            $marksModel->update($mark);
            $subject = $subjectModel->getById($mark['subjectId']);
            $totalMarksObtained += $mark['practical'] + $mark['theory'];
            $totalMaxMarks += $subject['practical'] + $subject['theory'];
        }

        $percentage = ($totalMarksObtained / $totalMaxMarks) * 100;
//        $this->query("UPDATE results SET examinationId = '$examinationId', facultyDetailId = '$facultyDetailId', studentId = '$studentId',
//                      grade = '$grade', percentage = '$percentage', rank = '$rank' WHERE id = '$id'");
        $this->query("UPDATE results SET percentage = '$percentage' WHERE id = '$id'");
    }

    // Delete a result
    public function delete($id) {
        $id = $this->escape($id);

        // Delete associated marks
        $this->query("DELETE FROM result_marks WHERE resultId = '$id'");

        // Delete the result
        return $this->query("DELETE FROM results WHERE id = '$id'");
    }

    public function getResultWithMarks($resultId): array
    {
        $resultId = $this->escape($resultId);
        $query = "
            SELECT 
                r.*
            FROM results r
            WHERE r.id = '$resultId'
        ";

        return $this->query($query)->fetch_all(MYSQLI_ASSOC);
    }

//    public function getResultWithMarks($resultId): array
//    {
//        $resultId = $this->escape($resultId);
//        $query = "
//            SELECT
//                r.*,
//                m.*,
//                rm.resultId AS resultMarksId,
//                s.*,
//                sub.name AS subjectName,
//                sub.theory AS subjectTheory,
//                sub.practical AS subjectPractical,
//                sub.passMarks AS subjectPassMarks,
//                sub.fullMarks AS subjectFullMakrs
//            FROM results r
//            LEFT JOIN result_marks rm ON r.id = rm.resultId
//            LEFT JOIN marks m ON rm.marksId = m.id
//            LEFT JOIN students s ON r.studentId = s.id
//            LEFT JOIN subjects sub ON m.subjectId = sub.id
//            WHERE r.id = '$resultId'
//        ";
//
//        return $this->query($query)->fetch_all(MYSQLI_ASSOC);
//    }

}
?>
