<?php
session_start();
require 'includeFiles/config.php';
$message='';
if(isset($_POST['addNew'])){ //if addnew button is clicked
            //$message='Your button is just clicked';
    
    $cid=$_POST['cid'];
    $fullname=$_POST['fullname'];
    $address=$_POST['address'];
    $age=$_POST['age'];
    $sex=$_POST['sex'];
    $status=$_POST['status'];
    $company=$_POST['company'];
    $salary=$_POST['salary'];
    
    //check if the citizens is not already registerd
    $sql="SELECT * FROM citizen WHERE cid=:cid";
            $statement=$connection->prepare($sql);
            $statement->execute(
                array(
                    'cid'    =>  $_POST['cid'],
                )
                );
        $count=$statement->rowCount();
        if($count > 0)
        {
        $message='Citizen id already used/ taken';
        }
    else if(strlen($cid)>16){ //check length of citizen id
                    $message='Id must have 16 characters only ';
    }else if(empty($cid)){
        $message='All fields are required.. citizen id is required is required';
    }else if(strlen($cid)<16){
        $message='Id should not be less than 16 characters ';

    }
        else{
            
            //when there is no any error then, insert citizen into database
            
            $success_message = '';
              $sql = 'INSERT INTO citizen(cid, fullname, address, age, sex, status, company, salary) VALUES(:cid, :fullname, :address, :age, :sex, :status, :company, :salary)';
              $insert_statement = $connection->prepare($sql);
            
              if ($insert_statement->execute([':cid' => $cid, ':fullname' => $fullname, ':address' =>$address, ':age' =>$age, ':sex' =>$sex, ':status'=>$status, 'company'=>$company, 'salary'=>$salary])) {         
            $success_message = 'New Citizen Record added successfully';
              }
        }
}
?>

<?php require 'includeFiles/AtherHeader.php';?>
    <title>Citizen job status information status</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
<body>

 <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line"><b>Add new citizen to Citizens Job Status Information portal</b></h4>

                </div>

            </div>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h4>Add new citizen</h4>
        </div>
        <div class="card-body">
            <?php if (!empty($message)): ?>
            <div class="alert alert-danger">
                <?= $message; ?>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($success_message)): ?>
            <div class="alert alert-success">
                <?= $success_message; ?>
            </div>
            <?php endif; ?>
            
            <form method="post" action="AddNewCitizen.php">
                
                 <div class="form-group">
                    <label for="fullnames">Enter Citizen Identification card number</label>
                    <input type="text" name="cid" id="cid" class="form-control"  placeholder=" Citizen Identification card number.." size="16">
                </div>
                
                
                <div class="form-group">
                    <label for="fullnames">Enter Citizen FullNames</label>
                    <input type="text" name="fullname" id="fullname" class="form-control"  placeholder=" Citizen fullnames..">
                </div>
                
                <div class="form-group">
                    <label for="address">Enter Citizen Address</label>
                    <input type="text" name="address" id="address" class="form-control"  placeholder="Citizen Address..">
                </div>
                
                <div class="form-group">
                    <label for="age">Enter Citizen's age</label>
                    <input type="text" name="age" id="age" class="form-control"  placeholder="Citizen Ages..">
                </div>
                
                <div class="form-group">
                    <label for="sex">Choose  Citizen Gender Status</label>
                    <select class="custom-select custom-select-lg mb-3" name="sex">
                        <option  selected value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Choose  Citizen Job Status</label>
                    <select class="custom-select custom-select-lg mb-3" name="status">
                        <option  selected value="Employed">Employed</option>
                        <option value="Unemployed ">Unemployed </option>
                        <option value="Student">Student</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="company">Enter Citizen working Company</label>
                    <input type="text" name="company" id="company" class="form-control"  placeholder="Citizen working company.. / if is unemployeed please type NONE">
                </div>
                
                <div class="form-group">
                    <label for="salary">Enter Citizen Salary per month</label>
                    <input type="text" name="salary" id="salary" class="form-control"  placeholder="Citizen salary..  / if is unemployeed please type NONE">
                </div>
                
                <div class="form-group">
                <button type="submit" class="btn btn-info" name="addNew">ADD NEW CITIZEN</button>
                <button type="reset" class="btn btn-danger">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
</div>
     </div>
    </div>
</body>
    <style> .col-md-12{text-align: center;} </style>