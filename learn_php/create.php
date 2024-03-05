

<?php
    define("db_host","localhost");
    define("db_user","root");
    define("db_pass","");
    define("db_name","ecom");

?>

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
               
            
                echo "Data insert succesfully.<br>";
            }
            else{
                die("Error : (" . $this->link->errno.")".$this->link->error);
                echo "Data insert Failed!<br>";
            }
        }
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP CRUD mysqli</title>
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
        table.tablone{
            width:800px;
            border:1px solid #fff;
            margin:20px 0px;
        }
        table.tableone th{
            width:100px;
        }
        table.tablone tr:nth-child(2n+1){
            background:#fff;
            height:30px;
        }
        table.tablone tr:nth-child(2n){
            background: #f1f1f1;
            height:30px;
        }
        table.tablone td{
            padding:5px 10px;
            text-align:center;
            color:black;
        }
    </style>
</head>
<body>
    <section class="main-content">
        <nav>
            <h3>PHP OPP CRUD mysqli.</h3>
        </nav>
        <div class="body-content" style="height:700px;">
           

            <?php
               $db = new databaseA();
               if(isset($_POST['submit'])){
                $name = mysqli_real_escape_string($db->link,$_POST['firstname']);
                $email = mysqli_real_escape_string($db->link,$_POST['email']);
                $age = mysqli_real_escape_string($db->link,$_POST['age']);
                $city = mysqli_real_escape_string($db->link,$_POST['city']);

                if($name == "" || $email == "" || $age == "" || $city == ""){
                    $error =  "Field must not be empty!";
                }
                else{
                   $query = "INSERT INTO customers(firstname,email,age,city) VALUES('$name','$email','$age','$city')";
                   $insert = $db->insert($query);
                }
               }
               
            ?>

            <?php
             if(isset($error)){
                echo "<span style='color:red'>".$error."</span>";
             }
            ?>
            <form action="create.php" method="post">
            <table>
                <tr>
                    <td>Name : </td>
                    <td><input type="text" name="firstname" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type="email" name="email" placeholder="Enter your email"></td>
                </tr>
                <tr>
                    <td>Age : </td>
                    <td><input type="number" name="age" placeholder="Enter your number"></td>
                </tr>
                <tr>
                    <td>City : </td>
                    <td><input type="text" name="city" placeholder="Enter your city"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="submit">
                    <input type="reset" value="cancel"></td>
                </tr>
                 
            </table>
            </form>
            <br><br>
            

            <?php
               $db = new databaseA();
               $query = "SELECT *FROM customers";
               $read = $db->select($query);
               
            ?>
            <table class="tablone">
                <tr>
                    
                    <th width="25%">NAME</th>
                    <th width="25%">EMAIL</th>
                    <th width="25%">AGE</th>
                    <th width="25%">CITY</th>
                    <th width="25%">ACTION</th>
                </tr>
               <?php if($read) { ?>
                <?php while($row = $read->fetch_assoc()) { ?>
                <tr>
                    
                    <td><?php echo $row['firstname'] ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                </tr>
                 <?php } ?>
                 <?php } else { ?>
                    <p>Data is not found.</p>
                    <?php } ?>   
            </table>

        </div>
        <footer>All rights reserved farjana-dipa.com</footer>
    </section>
</body>
</html>