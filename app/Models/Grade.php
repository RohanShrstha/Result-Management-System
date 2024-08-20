<?php
class Grade extends Model {
    // Retrieve all grades
    public function getAll() {
        return $this->query("SELECT * FROM grades")->fetch_all(MYSQLI_ASSOC);
    }

    // Retrieve a single grade by ID
    public function getById($id) {
        $id = $this->escape($id);
        $result = $this->query("SELECT * FROM grades WHERE id = '$id'");
        return $result->fetch_assoc();
    }

    // Create a new grade
    public function create($data) {
        $name = $this->escape($data['name']);
        return $this->query("INSERT INTO grades (name) VALUES ('$name')");
    }

    // Update an existing grade
    public function update($id, $data) {
        $id = $this->escape($id);
        $name = $this->escape($data['name']);
        return $this->query("UPDATE grades SET name = '$name' WHERE id = '$id'");
    }

    // Delete a grade
    public function delete($id) {
        $id = $this->escape($id);
        return $this->query("DELETE FROM grades WHERE id = '$id'");
    }
}
?>
