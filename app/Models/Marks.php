<?php
class Marks extends Model {
    // Retrieve all marks
    public function getAll() {
        return $this->query("SELECT * FROM marks")->fetch_all(MYSQLI_ASSOC);
    }

    // Retrieve a single mark entry by ID
    public function getById($id) {
        $id = $this->escape($id);
        $result = $this->query("SELECT * FROM marks WHERE id = '$id'");
        return $result->fetch_assoc();
    }

    // Retrieve all marks for a specific subject
    public function getMarksBySubjectId($subjectId) {
        $subjectId = $this->escape($subjectId);
        return $this->query("SELECT * FROM marks WHERE subjectId = '$subjectId'")->fetch_all(MYSQLI_ASSOC);
    }

    // Create a new mark entry
    public function create($data) {
        $subjectId = $this->escape($data['subjectId']);
        $practical = $this->escape($data['practical']);
        $theory = $this->escape($data['theory']);
        return $this->query("INSERT INTO marks (subjectId, practical, theory) VALUES ('$subjectId', '$practical', '$theory')");
    }

    // Update an existing mark entry
    public function update($data) {
        $id = $this->escape($data['id']);
        $subjectId = $this->escape($data['subjectId']);
        $practical = $this->escape($data['practical']);
        $theory = $this->escape($data['theory']);
        return $this->query("UPDATE marks SET subjectId = '$subjectId', practical = '$practical', theory = '$theory' WHERE id = '$id'");
    }

    // Delete a mark entry
    public function delete($id) {
        $id = $this->escape($id);
        return $this->query("DELETE FROM marks WHERE id = '$id'");
    }
}
?>
