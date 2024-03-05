<?php
include_once 'Session.php';
include 'database.php';



    class user{
            private $db;

        public function __construct(){
            $this->db = new database();
        }

        public function userRegistration($data){
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
         

            $chkemail = $this->emailCheck($email);

            if($name =="" OR $username =="" OR $email =="" OR $password ==""){
                $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Field must not be empty.</div>";
                return $msg;
            }

            if(strlen($username) < 3){
                //echo strlen($username) . "<br>";
                $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Username is too sort.</div>";
                return $msg;
            }
            else if(preg_match('/[^a-z0-9_-]+/i',$username)){
                $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Username is contain only alpha,numerical,underscore,dashes.</div>";
                return $msg;
            }
            if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
                $msg = "<div class='alert alert-danger'><strong>Error ! </strong>This email is not valid.</div>";
                return $msg;
            }

            if($chkemail==true){
                $msg = "<div class='alert alert-danger'><strong>Error ! </strong>This email already exist.</div>";
                return $msg;
            }

            $sql = "INSERT INTO users(name,username,email,password) VALUES(:name,:username,:email,:password)";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':name',$name);
            $query->bindValue(':username',$username);
            $query->bindValue(':email',$email);
            $query->bindValue(':password',$password);
            $result = $query->execute();
            if($result){
                $msg = "<div class='alert alert-success'><strong>Success ! </strong>Thank you, You have been registered!</div>";
                return $msg;
            }
            else{
                $msg = "<div class='alert alert-danger'><strong>Sorry ! </strong>There has been error!</div>";
                return $msg;
            }

        }

        public function getLoginUser($email,$password){
            $sql = "SELECT *FROM users WHERE email = :email AND password = :password LIMIT 1";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':email',$email);
            $query->bindValue(':password',$password);
           
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
            
        }

        public function userLogin($data){
            $email = $_POST['email'];
            $password = md5($_POST['password']);
           // echo "from user page ".$email . "<br>";
            $chkemail = $this->emailCheck($email);

            if($email =="" OR $password ==""){
                $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Field must not be empty.</div>";
                return $msg;
            }

            if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
                $msg = "<div class='alert alert-danger'><strong>Error ! </strong>This email is not valid.</div>";
                return $msg;
            }

            if($chkemail==false){
                $msg = "<div class='alert alert-danger'><strong>Error ! </strong>This email not exist.</div>";
                return $msg;
            }

            $result = $this->getLoginUser($email,$password);
            //echo $result->id . "<br>" . $result->name . "<br>" . $result->username . "<br>";
            if($result){
                
                Session::init();
                Session::set("login",true);
                Session::set("id",$result->id);
                Session::set("name",$result->name);
                Session::set("username",$result->username);
                Session::set("loginmsg","<div class='alert alert-success'><strong>Success ! </strong>You are loggedIn!</div>");
               
                header("Location:index.php");
                exit; 
            }
            else{
                $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Data not found!</div>";
                return $msg;
            }
            
        }

        public function emailCheck($email){
            $sql = "SELECT email FROM users WHERE email = :email";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':email',$email);
            $query->execute();
            if($query->rowCount()>0){
                return true;
            }
            else{
                return false;
            }
        }
           
        
        
    }
?>


