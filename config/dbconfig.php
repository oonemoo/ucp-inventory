<?php

class DBconfig {
    private $host;
    private $user;
    private $password;
    private $database;
    private $conn;

    public function __construct($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->conn = $this->connectDB();
    }

    private function connectDB() {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($conn === false) {
          // Handle connection error
          die("ERROR: Could not  connect database." . mysqli_connect());
    }
    return $conn;
  }

  // Method to read data from a table
    public function readData($sql) {
      $result = mysqli_query($this->conn, $sql);
      $data =array();
      if ($result && mysqli_num_rows ($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $data[] = $row;
        }
      }
        return $data;
    }
    // You should also have methods for insert, update, delete, etc.
}

?>