<?php
class Faculty extends Model {
    // Retrieve all faculties
    public function getAll() {
        return $this->query("SELECT * FROM faculty")->fetch_all(MYSQLI_ASSOC);
    }

    // Retrieve a single faculty by ID
    public function getById($id) {
        $id = $this->escape($id);
        $result = $this->query("SELECT * FROM faculty WHERE id = '$id'");
        return $result->fetch_assoc();
    }


    // Create a new faculty
    public function create($data) {
        $name = $this->escape($data['name']);
        return $this->query("INSERT INTO faculty (name) VALUES ('$name')");
    }

    // Update an existing faculty
    public function update($id, $data) {
        $id = $this->escape($id);
        $name = $this->escape($data['name']);
        return $this->query("UPDATE faculty SET name = '$name' WHERE id = '$id'");
    }

    // Delete a faculty
    public function delete($id) {
        $id = $this->escape($id);
        return $this->query("DELETE FROM faculty WHERE id = '$id'");
    }
}
?>


<!--CREATE TABLE faculties (-->
<!--id INT AUTO_INCREMENT PRIMARY KEY,-->
<!--name VARCHAR(255) NOT NULL,-->
<!--streamsId INT,-->
<!--FOREIGN KEY (streamsId) REFERENCES streams(id) ON DELETE SET NULL-->
<!--);-->
