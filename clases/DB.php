<?php

	class DB{

    protected $db;

    public function DB(){

    $conn = NULL;

        try{
            $conn = new PDO("pgsql:host=127.0.0.1;dbname=eduisys", "postgres", "cl4v3d3postg73s17!");
            //$conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                echo 'ERROR: ' . $e->getMessage();
            }    
            $this->db = $conn;
    }
    
    public function getConnection(){
        return $this->db;
    }
}

?>
