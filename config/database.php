<?php
    require_once("config.php");
    class Database
    {
        public $connection;
        function __construct()
        {
            $this->db_connection;
        }
        public function db_connection()
        {
            $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            if ($this->connection->connect_errno) {
                die ("unable to connect ". $this->connection->connect_error);
            }
        }
        public function make_query($sql)
        {
            $result = $this->connection->query($sql);
            return $result;
        }
        private function confirm_query($result)
        {
            $this->confirm_query($result);
            if (!$result) {
                die ("Unable to make query ". $this->connection->error);
            }
        }
        public function escape_string($string)
        {
            $escaped_string = mysqli_real_escape_string($this->connection,$string);
            return $escaped_string;
        }
        public function insert_the_id()
        {
            return $this->connection->insert_id;
        }
    }
    $database = new Database();
?>