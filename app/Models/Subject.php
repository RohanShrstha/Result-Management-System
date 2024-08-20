<?php
class Subject extends Model {
    // Retrieve all subjects
    public function getAll() {
        return $this->query("SELECT * FROM subjects")->fetch_all(MYSQLI_ASSOC);
    }

    // Retrieve a single subject by ID
    public function getById($id) {
        $id = $this->escape($id);
        $result = $this->query("SELECT * FROM subjects WHERE id = '$id'");
        return $result->fetch_assoc();
    }

    // Create a new subject
    public function create($data) {
        $name = $this->escape($data['name']);
        $theory = $this->escape($data['theory']);
        $practical = $this->escape($data['practical']);
        $passMarks = $this->escape($data['passMarks']);
        $fullMarks = $this->escape($data['fullMarks']);
        return $this->query("INSERT INTO subjects (name, theory, practical, passMarks, fullMarks) VALUES ('$name', '$theory', '$practical', '$passMarks', '$fullMarks')");
    }

    // Update an existing subject
    public function update($id, $data) {
        $id = $this->escape($id);
        $name = $this->escape($data['name']);
        $theory = $this->escape($data['theory']);
        $practical = $this->escape($data['practical']);
        $passMarks = $this->escape($data['passMarks']);
        $fullMarks = $this->escape($data['fullMarks']);
        return $this->query("UPDATE subjects SET name = '$name', theory = '$theory', practical = '$practical', passMarks = '$passMarks', fullMarks = '$fullMarks' WHERE id = '$id'");
    }

    // Delete a subject
    public function delete($id) {
        $id = $this->escape($id);
        return $this->query("DELETE FROM subjects WHERE id = '$id'");
    }
}
?>
