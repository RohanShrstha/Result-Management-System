<?php
class User extends Model {
    public function getAllUsers() {
        return $this->query("SELECT * FROM users")->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserById($id) {
        $id = $this->escape($id);
        $result = $this->query("SELECT * FROM users WHERE id = '$id'");
        return $result->fetch_assoc();
    }

    public function createUser($data) {
        $name = $this->escape($data['name']);
        $password = password_hash($this->escape($data['password']), PASSWORD_DEFAULT);
        $type = $this->escape($data['type']);
        return $this->query("INSERT INTO users (name, password, type) VALUES ('$name', '$password', '$type')");
    }

    public function updateUser($id, $data) {
        $id = $this->escape($id);
        $password = password_hash($this->escape($data['password']), PASSWORD_DEFAULT);
        return $this->query("UPDATE users SET password = '$password'");
    }

    public function deleteUser($id) {
        $id = $this->escape($id);
        return $this->query("DELETE FROM users WHERE id = '$id'");
    }

    public function verifyUser($name, $password) {
        $name = $this->escape($name);
        $result = $this->query("SELECT * FROM users WHERE name = '$name' LIMIT 1");
        $user = $result->fetch_assoc();

        // Check if the user exists and the password is correct
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Return user data if authenticated
        }

        return false; // Return false if authentication fails
    }
}
?>
