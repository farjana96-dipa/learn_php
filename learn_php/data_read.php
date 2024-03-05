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
                    <td><a href="delete.php?id=<?php echo urlencode($row['id']); ?>">Edit</a></td>
                </tr>
                 <?php } ?>
                 <?php } else { ?>
                    <p>Data is not found.</p>
                    <?php } ?>   
            </table>

            <a href="create.php">Create</a>

        </div>
        <footer>All rights reserved farjana-dipa.com</footer>
    </section>
</body>
</html>