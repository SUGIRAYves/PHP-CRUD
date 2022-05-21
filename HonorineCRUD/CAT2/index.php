<?php
session_start();
require 'includeFiles/config.php';
$message='';
if(isset($_POST['login'])){ //if login button is clicked
            //$message='Your buuton is just clicked';
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(empty($email)){
            $message='All fields are required.. Your email or username is required';
    }else if(empty($password)){
            $message='All fields are required.. Your password is required';
    }
    
    else{
            $sql="SELECT * FROM collector WHERE email=:email AND password=:password";
            $statement=$connection->prepare($sql);
            $statement->execute(
                array(
                    'email'    =>  $_POST['email'],
                    'password'    =>  $_POST['password']
                )
                );
        $count=$statement->rowCount();
        if($count > 0)
        {
            $_SESSION["email"] = $_POST["email"];
            
            header("location:collectorIndex.php");
        }
        else{
            $message='Invalid login information';
        }
    }
}
?>
<?php require 'includeFiles/indexheader.php';?>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
<body>

 <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line"><b>Welcome to Citizens Job Status Information portal</b></h4>

                </div>

            </div>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h4>Login to continue</h4>
        </div>
        <div class="card-body">
            <?php if (!empty($message)): ?>
            <div class="alert alert-danger">
                <?= $message; ?>
            </div>
            <?php endif; ?>
            <form method="post" action="index.php">
                
                <div class="form-group">
                    <label for="email">Enter your email or username</label>
                    <input type="text" name="email" id="email" class="form-control"  placeholder="Your email or username.." >
                </div>
                <div class="form-group">
                    <label for="password">Enter your password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Your email or password..">
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-info" name="login">LOGIN NOW</button>
                <button type="reset" class="btn btn-danger">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
</div>
     </div>
    </div>
</body>