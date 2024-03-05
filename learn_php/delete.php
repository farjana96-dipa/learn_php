<?php
  include "database.php";
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
             if(isset($_GET['msg'])){
                echo "<span style='color:green'>".$_GET['msg']."</span>";
             }
           ?>

            <?php
               $id = $_GET['id'];
              // echo "Id is : ". $id."<br>";
               $db = new databaseA();
               $query = "SELECT *FROM customers WHERE id=$id";
               $get_data = $db->select($query)->fetch_assoc();

               if(isset($_POST['submit'])){
                $name = mysqli_real_escape_string($db->link,$_POST['firstname']);
                $email = mysqli_real_escape_string($db->link,$_POST['email']);
                $age = mysqli_real_escape_string($db->link,$_POST['age']);
                $city = mysqli_real_escape_string($db->link,$_POST['city']);

                if($name == "" || $email == "" || $age == "" || $city == ""){
                    $error =  "Field must not be empty!";
                }
                else{
                    $query = "UPDATE customers SET firstname='$name',email='$email',age='$age',city='$city' 
                    WHERE id=$id ";
                    $update = $db->update($query);
                }
               }
               
            ?>
           <?php
             if(isset($error)){
                echo "<span style='color:red'>".$error."</span>";
             }
            ?>

            <?php
                if(isset($_POST['delete'])){
                    $query = "DELETE FROM customers WHERE id=$id ";
                    $deleteData = $db->delete($query);
                }
            ?>
            <form action="delete.php?id=<?php echo $id; ?>" method="post">
            <table>
                <tr>
                    <td>Name : </td>
                    <td><input type="text" name="firstname" value="<?php echo $get_data['firstname']; ?>"></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type="email" name="email" value="<?php echo $get_data['email']; ?>"></td>
                </tr>
                <tr>
                    <td>Age : </td>
                    <td><input type="number" name="age" value="<?php echo $get_data['age']; ?>"></td>
                </tr>
                <tr>
                    <td>City : </td>
                    <td><input type="text" name="city" value="<?php echo $get_data['city']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="submit">
                    <input type="reset" value="cancel">
                    <input type="submit" name="delete" Value="Delete" /></td>
                </tr>
                 
            </table>
            </form>
            <br><br>
            <a href="data_read.php">Go Back</a>
        </div>
        <footer>All rights reserved farjana-dipa.com</footer>
    </section>
</body>
</html>