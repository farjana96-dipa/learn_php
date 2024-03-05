<?php include "config.php" ?>


<?php
    class databaseA{
        public $host = db_host;
        public $user = db_user;
        public $pass = db_pass;
        public $name = db_name;

        public $link;
        public $error;

        public function __construct(){
            $this->connectDB();
        }

        private function connectDB(){
            $this->link = new mysqli($this->host,$this->user,$this->pass,$this->name);
            if(!$this->link){
                $this->error = "Connection fail".$this->link->connect_error;
                return false;
            }
        }

        public function select($query){
            $result = $this->link->query($query) or die ($this->link->error.__LINE__);
            if($result->num_rows>0){
                return $result;
            }
            else{
                return false;
            }
        }

        public function insert($query){
            $insert_row = $this->link->query($query) or die ($this->link->error.__LINE__);
            if($insert_row){  
                echo "<script>window.location.href='data_read.php';</script>";
                exit;
            
                echo "Data insert succesfully.<br>";
            }
            else{
                die("Error : (" . $this->link->errno.")".$this->link->error);
                echo "Data insert Failed!<br>";
            }
        }

        public function update($query){
            $update_row = $this->link->query($query) or die ($this->link->error.__LINE__);
            if($update_row){  
                echo "<script>window.location.href='data_read.php';</script>";
                exit;
                echo "Data Updated Succesfully.<br>";
            }
            else{
                die("Error : (" . $this->link->errno.")".$this->link->error);
                echo "Data insert Failed!<br>";
            }
        }
        public function delete($query){
            $delete_row = $this->link->query($query) or die ($this->link->error.__LINE__);
            if($delete_row){  
                echo "<script>window.location.href='data_read.php';</script>";
                exit;
                echo "<span style='color:green'>Data Deleted Succesfully.</span><br>";
            }
            else{
                die("Error : (" . $this->link->errno.")".$this->link->error);
                echo "Data insert Failed!<br>";
            }
        }
    }


?>


