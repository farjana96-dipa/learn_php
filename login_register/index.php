<?php include 'inc/header.php'; 
    include 'lib/user.php';
    
    

    $user = new user();
   
?>
 

<?php
    
    $msg = Session::get("loginmsg");
    if(isset($msg)){
        echo $msg . "<br>";
    }
    
?>

        <!--body section-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>User List : <span class="pull-right"><Strong>Welcome!</Strong>
                    <?php
                        $name = Session::get("name");
                        
                        if(isset($name)){
                          echo $name;
                        }
                        else{
                            echo "name is not set<br>";
                        }
                    ?>
                </span></h2>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <th class="width:20%">Serial</th>
                    <th class="width:20%">Name</th>
                    <th class="width:20%">Username</th>
                    <th class="width:20%">Email Address</th>
                    <th class="width:20%">Action</th>

                    <tr>
                        <td>01</td>
                        <td>Farjana Akter Dipa</td>
                        <td>farjana_dipa</td>
                        <td>farjana96455@gmail.com</td>
                        <td><a href="profile.php?id=1" class="btn btn-primary">View</a></td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>Suraiya Akter</td>
                        <td>suraiya</td>
                        <td>suraiya@gmail.com</td>
                        <td><a href="profile.php?id=1" class="btn btn-primary">View</a></td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>Khadija Akter</td>
                        <td>khadija</td>
                        <td>khadija@gmail.com</td>
                        <td><a href="profile.php?id=1" class="btn btn-primary">View</a></td>
                    </tr>
                    <tr>
                        <td>04</td>
                        <td>Nurunnahar Akter</td>
                        <td>nurunnahar</td>
                        <td>nuru@gmail.com</td>
                        <td><a href="profile.php?id=1" class="btn btn-primary">View</a></td>
                    </tr>
                </table>
            </div>
        </div>

        <?php include 'inc/footer.php'; ?>



</body>
</html>