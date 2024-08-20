<?php
class Model {
    protected $db;

    public function __construct() {
        // Connect to the database
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->db->connect_error) {
            die("Database connection failed: " . $this->db->connect_error);
        }
    }

    // Example method to execute a query
    protected function query($sql) {
        $result = $this->db->query($sql);
        if ($result === false) {
            echo "Error: " . $this->db->error;
            return false;
        }
        return $result;
    }

    // Method to safely escape strings before using in queries
    protected function escape($value) {
        return $this->db->real_escape_string($value);
    }

    // Close the database connection when the model is destroyed
    public function __destruct() {
        $this->db->close();
    }

    public function loadModel($model) {
        require_once 'app/Models/' . $model . '.php';
        return new $model();
    }
}
?>
