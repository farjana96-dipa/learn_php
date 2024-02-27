
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
    
      $db = new dataBase();
      $db->driver="mysql";
      $db->setDrive();
      $pp = clone $db;
      $pp->driver="mysqlite";
      $pp->setDrive();

      class dataBase{
        public $driver;
        public $link;

        public function setDrive(){
            if($this->driver=="mysql"){
               $mngmysql = new mysql();
               $this->link =  $mngmysql->setDB("phpmyadmin_mysql");
               $this->link =  $mngmysql->setUser("John Doe_mysql");
               $this->link =  $mngmysql->setHost("Local_host_mysql");
               $this->link =  $mngmysql->setPass("123_mysql");

            }
            else{
                $mngmysqlite = new mysqlite();
               $this->link = $mngmysqlite->setDB("phpmyadmin_mysqlite");
               $this->link = $mngmysqlite->setUser("John Doe_mysqlite");
               $this->link = $mngmysqlite->setHost("Local_host_mysqlite");
               $this->link = $mngmysqlite->setPass("123_mysqlite");
            }
        }
      }
        
        class A{
            private static $instance;
            public function __construct(){
                if(!self::$instance){
                    self::$instance = $this;
                    echo "Created new one<br>";
                    return self::$instance;
                }
                else{
                    echo "Old one<br>";
                    return self::$instance;
                }
            }
        }

         new A();
         new A();
         new A();
         new A();

         interface iterator{
            function rewind();
            function key();
            function current();
            function next();
            function valid();
         }

         class posts implements iterator{
            public $var;
            private $posts;
            public function __construct($posts){
                if(is_array($posts)){
                    $this->posts = $posts;
                }
            }

            public function rewind(){
                reset($this->posts);
            }
            public function current(){
                return current($this->posts);
            }
            public function next(){
                return next($this->posts);
            }
            public function key(){
                return key($this->var);
            }
            public function valid(){
                return ($this->current()!==false);
            }
         }
        

        $p = new post();
        foreach($p as $post){
            echo $post->get
        }

        ?>
        </div>
        <footer>All rights reserved farjana-dipa.com</footer>
    </section>
</body>
</html>