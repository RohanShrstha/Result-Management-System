<?php
class Student extends Model {
    // Retrieve all students
    public function getAll() {
        return $this->query("SELECT * FROM students")->fetch_all(MYSQLI_ASSOC);
    }

    // Retrieve a single student by ID
    public function getById($id) {
        $id = $this->escape($id);
        $result = $this->query("SELECT * FROM students WHERE id = '$id'");
        return $result->fetch_assoc();
    }

    // Create a new student
    public function create($data) {
        $name = $this->escape($data['name']);
        $address = $this->escape($data['address']);
        $guardianName = $this->escape($data['guardianName']);
        $contact = $this->escape($data['contact']);
        $facultyDetailsId = $this->escape($data['facultyDetailsId']);

        return $this->query("INSERT INTO students (name, address, guardianName, contact, facultyDetailsId) 
                             VALUES ('$name', '$address', '$guardianName', '$contact', '$facultyDetailsId')");
    }

    // Update an existing student
    public function update($id, $data) {
        $id = $this->escape($id);
        $name = $this->escape($data['name']);
        $address = $this->escape($data['address']);
        $guardianName = $this->escape($data['guardianName']);
        $contact = $this->escape($data['contact']);
        $facultyDetailsId = $this->escape($data['facultyDetailsId']);

        return $this->query("UPDATE students 
                             SET name = '$name', address = '$address', guardianName = '$guardianName', contact = '$contact', facultyDetailsId = '$facultyDetailsId' 
                             WHERE id = '$id'");
    }

    // Delete a student
    public function delete($id) {
        $id = $this->escape($id);
        return $this->query("DELETE FROM students WHERE id = '$id'");
    }

    public function getAllByFacultyDetailsId($id) {
        $id = $this->escape($id);
        $result = $this->query("SELECT * FROM students WHERE facultyDetailsId = '$id'");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
