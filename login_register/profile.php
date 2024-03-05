<?php include 'inc/header.php'; ?>
<div class="panel panel-default">
    <div style="max-width:600px;margin:0 auto;">
    <div class="panel-heading">
            <h2>
            User Profile<span class="pull-right"><a href="index.php" class="btn btn-primary">Back</a></span>
            </h2>
       
    </div>
    <div class="panel-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="Farjana Akter"/>
            </div>
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" name="username" class="form-control" value="farjana_dipa"/>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control" value="farjana96455@gmail.com"/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" value=""/>
            </div>
            <button class="btn btn-success" type="submit" name="register">Register</button>
        </form>
    </div>
    </div>
</div>


<?php include 'inc/footer.php'; ?>
