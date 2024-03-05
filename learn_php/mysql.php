
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .main-content{
            width:70%;
            margin:auto;
            height:100vh;
            
            top:0;
            padding:0;
        }
        nav{
            background:black;
            color:white;
            text-align:center;
            padding:20px 0px;
        }
        .body-content{
          
            background-color: #efeaea;
            padding:30px;
        }
        footer{
            background:black;
            color:white;
            text-align:center;
            padding:20px 0px;
        }
      
    </style>
</head>



<body>
    <section class="main-content">
        <nav>
            <h3>PHP training with live project.</h3>
        </nav>
        <div class="body-content" style="height:700px;">
        <h2>Learn PHP_OOP Training with Live Project</h2>

       
        <form action="" method="post">
            <table>
                <tr>
                    <td>Enter the first number : </td>
                    <td><input type="number" name="num1"></td>
                </tr>
                <tr>
                    <td>Enter the second number : </td>
                    <td><input type="number" name="num2"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="submit" name="paichi">
                    <input type="reset" value="clear"></td>
                </tr>
            </table>
        </form>

        <?php
        
      spl_autoload_register(function($class_name){
           include $class_name.".php";
      });
     
      define("DB_HOST","localhost");
      define("DB_USER","root");
      define("DB_PASS","");
      define("DB_NAME","ecom");

      class database{
        public $host = DB_HOST;
        public $user = DB_USER;
        public $pass = DB_PASS;
        public $name = DB_NAME;

        public $link;
        public $error;

        private function connectDB(){
            $this->link = new mysqli($this->host, $this->user, $this->pass, $this->name);
            if(!$this->link){
                $this->error = "Connection fail.".$this->link->connect_error;
                return false;
            }
            else{
                echo "Successfull.";
            }
        }
        public function __construct(){
            $this->connectDB();
        }
        public function select(){
            $result = $this->link->query($query) or die ($this->link->error.__LINE__);
        }


      }


      $db = new database();
      $query = "SELECT *FROM customers";
      $read = $db->select(query);
     
   ?>
   
     
      
        </div>
        <footer>All rights reserved farjana-dipa.com</footer>
    </section>
</body>
</html>

