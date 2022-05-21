<?php
session_start();
require 'includeFiles/config.php';
$message='';
$id = $_GET['id'];
$sql = 'SELECT * FROM citizen WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if(isset($_POST["update"])){
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
    
    if(strlen($cid)>16){ //check length of citizen id
                    $message='Id must have 16 characters only ';
    }else if(empty($cid)){
        $message='All fields are required.. citizen id is required is required';
    }else if(strlen($cid)<16){
        $message='Id should not be less than 16 characters ';
    }else{ 
            //when there is no any error then, insert citizen into database
            $success_message = '';        
            
      $update_sql = 'UPDATE citizen SET cid=:cid, fullname=:fullname, address=:address, age=:age, sex=:sex, status=:status, company=:company, salary=:salary WHERE id=:id';
      $update_statement = $connection->prepare($update_sql);
      if ($update_statement->execute([':cid' => $cid, ':fullname' => $fullname, ':address'=>$address, ':age'=>$age, ':sex'=>$sex, ':status'=>$status, ':company'=>$company, ':salary'=>$salary, ':id' => $id])) {
        header("Location: collectorIndex.php");
      }

    }

}


 ?>
<?php require 'includeFiles/header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Collector make modification on citizen record</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-danger">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="cid">Citizen Identification Card Number</label>
          <input value="<?= $person->cid; ?>" type="text" name="cid" id="cid" class="form-control">
        </div>
          
          <div class="form-group">
          <label for="fullname">Citizen FullNames</label>
          <input value="<?= $person->fullname; ?>" type="text" name="fullname" id="fullname" class="form-control">
        </div>
          
          <div class="form-group">
          <label for="address">Citizen Address</label>
          <input value="<?= $person->address; ?>" type="text" name="address" id="address" class="form-control">
        </div>
          
        <div class="form-group">
          <label for="age">Citizen Age</label>
          <input type="text" value="<?= $person->age; ?>" name="age" id="age" class="form-control">
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
          <label for="company">Citizen Working company</label>
          <input type="text" value="<?= $person->company; ?>" name="company" id="company" class="form-control">
        </div>
          
           <div class="form-group">
          <label for="salary">Citizen Salary</label>
          <input type="text" value="<?= $person->salary; ?>" name="salary" id="salary" class="form-control">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-info" name="update">MODIFY CITIZEN RECORD NOW</button>
          <button type="reset" class="btn btn-danger">CANCEL</button>
        </div>
      </form>
    </div>
  </div>
</div>