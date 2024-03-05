<?php include 'inc/header.php';
    include 'lib/user.php';
   
?>
<?php
    $user = new user();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        $userlog = $user->userLogin($_POST);
        
    }

?>
<div class="panel panel-default">
    <div class="panel-heading">
    <h2>User Login</h2>
    </div>
    <div class="panel-body">
    <?php
        if(isset($userlog)){
            echo $userlog . "<br>";
        }

     $msg = session::get("loginmsg");
    if(isset($msg)){
        echo $msg . "<br>";
    }
    

    ?>
    
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" name="email" class="form-control" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" />
            </div>
            <button class="btn btn-success" type="submit" name="login" value="login" ><a href="index.php">Login</a></button>
        </form>
    </div>
</div>
<?php include 'inc/footer.php'; ?>