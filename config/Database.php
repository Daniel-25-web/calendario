<?php

class Database{
    // Deberia usarse private para mas seguridad
    // Pero el video explicativo usa public
    public $host = 'localhost';
    public $user = 'root';
    public $pass = '';
    public $db = 'calendarios';
    public $con;

    function conectToDatabase(){
        $this->con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if ($this->con->connect_error) {
            die('Error conectando: ' . $this->con->connect_error);
        }
        return $this->con;
    }                                              
}

?>