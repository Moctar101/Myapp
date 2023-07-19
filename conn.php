<?php
class Connection {
    private $database = 'TPCRUDPHP1.db'; // SQLite database file path
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $conn;

    public function open() {
        try {
            $this->conn = new PDO('sqlite:' . $this->database, null, null, $this->options);
            return $this->conn;
        } catch (PDOException $e) {
            echo 'There is some problem in connection: ' . $e->getMessage();
        }
    }

    public function close() {
        $this->conn = null;
    }
}
?>
