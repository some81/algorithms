<?php

class DB {
    private $server = 'localhost';
    private $user = 'arr_user';
    private $pass = 'crashcourse';
    private $dbName = 'logs';
    public $conn,$db;
    
    public function __construct(){
        $this->conn = mysql_connect($this->server,$this->user,$this->pass);
        if($this->conn){
            $this->db = mysql_select_db($this->dbName,$this->conn);
        } else {
            echo "Can't connect to Mysql";
        }
    }
    
    public function query($sql){
        if(!empty($sql)){
            $query = mysql_query($sql);
            return $query;
        }
    }
    
    
    
}