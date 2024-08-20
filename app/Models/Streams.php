<?php
class Streams extends Model {
    // Retrieve all streams
    public function getAll() {
        return $this->query("SELECT * FROM streams")->fetch_all(MYSQLI_ASSOC);
    }

    // Retrieve a single stream by ID
    public function getById($id) {
        $id = $this->escape($id);
        $result = $this->query("SELECT * FROM streams WHERE id = '$id'");
        return $result->fetch_assoc();
    }

    // Create a new stream
    public function create($data) {
        $name = $this->escape($data['name']);
        $facultyId = $this->escape($data['facultyId']);
        return $this->query("INSERT INTO streams (name, facultyId) VALUES ('$name', '$facultyId')");
    }

    // Update an existing stream
    public function update($id, $data) {
        $id = $this->escape($id);
        $name = $this->escape($data['name']);
        $facultyId = $this->escape($data['facultyId']);
        return $this->query("UPDATE streams SET name = '$name', facultyId = '$facultyId' WHERE id = '$id'");
    }

    // Delete a stream
    public function delete($id) {
        $id = $this->escape($id);
        return $this->query("DELETE FROM streams WHERE id = '$id'");
    }
}
?>
