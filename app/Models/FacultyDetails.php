<?php
class FacultyDetails extends Model {
    // Retrieve all faculty details
    public function getAll() {
        return $this->query("SELECT * FROM faculty_details")->fetch_all(MYSQLI_ASSOC);
    }

    // Retrieve a single faculty detail by ID
    public function getById($id) {
        $id = $this->escape($id);
        $result = $this->query("SELECT * FROM faculty_details WHERE id = '$id'");
        return $result->fetch_assoc();
    }

    // Create a new faculty detail
    public function create($data) {
        $gradeId = $this->escape($data['gradeId']);
        $name = $this->escape($data['name']);
        $facultyId = $this->escape($data['facultyId']);
        $streamId = $this->escape($data['streamId']);
        $this->query("INSERT INTO faculty_details (gradeId, facultyId, streamId, name) VALUES ('$gradeId', '$facultyId', '$streamId', '$name')");
        return $this->db->insert_id;
    }

    // Update an existing faculty detail
    public function update($id, $data) {
        $id = $this->escape($id);
        $name = $this->escape($data['name']);
        $gradeId = $this->escape($data['gradeId']);
        $facultyId = $this->escape($data['facultyId']);
        $streamId = $this->escape($data['streamId']);
        return $this->query("UPDATE faculty_details SET gradeId = '$gradeId', facultyId = '$facultyId', streamId = '$streamId', name = '$name' WHERE id = '$id'");
    }

    // Delete a faculty detail
    public function delete($id) {
        $id = $this->escape($id);
        $this->query("DELETE FROM faculty_detail_subjects WHERE facultyDetailId = '$id'");
        return $this->query("DELETE FROM faculty_details WHERE id = '$id'");
    }

    // Add subjects to a faculty detail
    public function addSubjectsToFacultyDetail($facultyDetailId, $subjectIds) {
        $facultyDetailId = $this->escape($facultyDetailId);
        foreach ($subjectIds as $subjectId) {
            $subjectId = $this->escape($subjectId);
            $this->query("INSERT INTO faculty_detail_subjects (facultyDetailId, subjectId) VALUES ('$facultyDetailId', '$subjectId')");
        }
    }

    // Retrieve all subjects for a specific faculty detail
    public function getSubjectsByFacultyDetailId($facultyDetailId) {
        $facultyDetailId = $this->escape($facultyDetailId);
        return $this->query("SELECT s.* FROM subjects s 
                             JOIN faculty_detail_subjects fds ON s.id = fds.subjectId 
                             WHERE fds.facultyDetailId = '$facultyDetailId'")
            ->fetch_all(MYSQLI_ASSOC);
    }

    // Remove a subject from a faculty detail
    public function removeSubjectFromFacultyDetail($facultyDetailId, $subjectId) {
        $facultyDetailId = $this->escape($facultyDetailId);
        $subjectId = $this->escape($subjectId);
        return $this->query("DELETE FROM faculty_detail_subjects WHERE facultyDetailId = '$facultyDetailId' AND subjectId = '$subjectId'");
    }

    public function addSubjectToFacultyDetail($facultyDetailId, $subjectId) {
        $facultyDetailId = $this->escape($facultyDetailId);
        $subjectId = $this->escape($subjectId);
        return $this->query("INSERT INTO faculty_detail_subjects (facultyDetailId, subjectId) VALUES ('$facultyDetailId', '$subjectId')");
    }
}
?>
