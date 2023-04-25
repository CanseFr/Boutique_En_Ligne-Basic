<?php
    class connect extends PDO{

    const HOST = "localhost";
    const DB = "gestionclients";
    const USER = "root";
    const PSW = "Rootoorn";

    public function __construct(){
        try {
            parent::__construct("mysql:dbname=".self::DB.";host=".self::HOST,self::USER,self::PSW);
            echo "<p style='color:green'>"."Connecté". "</p>" . PHP_EOL; // class='ok'  
        } catch (PDOException $e) {
            echo $e->getMessage() . " " . $e->getFile() . " " . $e->getLine();
        }
        }
    }
?>