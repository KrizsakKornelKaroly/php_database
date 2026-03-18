<?php 

    class db {

        //attributes
        public $db;

        
        //methods
        public function __construct()
        {
            $dbHost = 'localhost';
            $dbName = 'f1_2025';
            $dbUser = 'root';
            $dbPass = '';

            try {
                $this->db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
                $this->db->set_charset("utf8");

            } catch (Exception $err) {
                die('Hiba történt az adatbázis elérése során! (Hibakód: ' . $err->getCode() . ')');
            }
        }

        public function selectAll($table){
            return $this->db->query("SELECT * FROM $table")->fetch_all(MYSQLI_ASSOC);
        }

        public function selectById($table, $id){
            $stmt = $this->db->prepare("SELECT * FROM $table WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }

        public function insert($table, $data){

            $keys = implode(", ", array_keys($data));
            $values = "'".implode("', '", array_values($data))."'";

            return $this->db->query("INSERT INTO $table ($keys) VALUES ($values)");
        }



    }
?>