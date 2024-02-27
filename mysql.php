<?php
    class mysql{
        public $host;
        public $db;
        public $ps;
        public $us;

        public function setDB($db){
            $this->db = $db;
            echo $this->db."<br>";
           
        }
        public function setHost($host){
            $this->host = $host;
            echo $this->host."<br>";
        }
        public function setUser($us){
            $this->us = $us;
            echo $this->us."<br>";
        }
        public function setPass($ps){
            $this->ps = $ps;
            echo $this->ps."<br>";
        }
        
    }

?>