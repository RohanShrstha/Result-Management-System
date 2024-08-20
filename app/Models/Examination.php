<?php
class Examination extends Model {
    // Retrieve all examinations
    public function getAll() {
        return $this->query("SELECT * FROM examinations")->fetch_all(MYSQLI_ASSOC);
    }

    // Retrieve a single examination by ID
    public function getById($id) {
        $id = $this->escape($id);
        $result = $this->query("SELECT * FROM examinations WHERE id = '$id'");
        return $result->fetch_assoc();
    }

    // Create a new examination
    public function create($data) {
        $name = $this->escape($data['name']);
        $year = $this->escape($data['year']);
        return $this->query("INSERT INTO examinations (name, year) VALUES ('$name', '$year')");
    }

    // Update an existing examination
    public function update($id, $data) {
        $id = $this->escape($id);
        $name = $this->escape($data['name']);
        $year = $this->escape($data['year']);
        return $this->query("UPDATE examinations SET name = '$name', year = '$year' WHERE id = '$id'");
    }

    // Delete an examination
    public function delete($id) {
        $id = $this->escape($id);
        return $this->query("DELETE FROM examinations WHERE id = '$id'");
    }

    public function addFacultyDetailToExamination($facultyDetailId, $examinationId) {
        $facultyDetailId = $this->escape($facultyDetailId);
        $examinationId = $this->escape($examinationId);
        return $this->query("INSERT INTO examinations_faculty_details (facultyDetailId, examinationId) VALUES ('$facultyDetailId', '$examinationId')");
    }

    public function removeFacultyDetailFromExamination($facultyDetailId, $examinationId) {
        $facultyDetailId = $this->escape($facultyDetailId);
        $examinationId = $this->escape($examinationId);
        return $this->query("DELETE FROM examinations_faculty_details WHERE facultyDetailId = '$facultyDetailId' AND examinationId = '$examinationId'");
    }

    public function getFacultyDetailsByExaminationId($examinationId) {
        $examinationId = $this->escape($examinationId);
        return $this->query("SELECT s.* FROM faculty_details s 
                             JOIN examinations_faculty_details fds ON s.id = fds.facultyDetailId 
                             WHERE fds.examinationId = '$examinationId'")
            ->fetch_all(MYSQLI_ASSOC);
    }
}
?>
