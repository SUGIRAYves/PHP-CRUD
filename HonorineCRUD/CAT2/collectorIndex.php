<?php
session_start();
require 'includeFiles/header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Citizen job status information status</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="js/bootstrap.min.js">
    </head>
    <body>
        

<?php
require 'includeFiles/config.php';
if(isset($_POST['btnSearch'])){
    echo "btn is clicked";
    
			$txt= $_POST['searck_key'];
    echo $txt;
			$search_sql=$db->prepare("SELECT * FROM citizen WHERE cid LIKE :s OR fullname LIKE :l OR address LIKE :a OR age LIKE :p OR sex LIKE :g");
			$search_sql->execute(array(
				':s'=>'%'.$txt.'%',
				':l'=>'%'.$txt.'%',
				':a'=>'%'.$txt.'%',
				':p'=>'%'.$txt.'%',
				':g'=>$txt.'%',
                

			));
}
?>

<?php
$sql = 'SELECT * FROM citizen';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<div class="container"><br>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="collectorIndex.php" style="font-weight:bold;padding:8px;">CITIZENS JOB STATUS INFORMATION PORTAL</a>
            </li>
        </ul>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
    </div>
    </div>
</nav><br>
    
          <form class="d-flex" method="post" action="collectorIndex.php">
        <input class="form-control me-2" type="search" placeholder="Citizen quick search..." aria-label="Search" name="searck_key" required>
        <button class="btn btn-outline-success" type="submit" name="SearchBtn">Citizen Search</button>
      </form>
    
    
  <div class="card mt-5">
    <div class="card-header">
      <h2>All citizens in our database</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
        <th>Citizen Identification Number</th>
        <th>Citizen fullName</th>
        <th>Address</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Job status</th>
        <th>Company</th>
        <th>Salary</th>
        <th>Collector action</th>    
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->cid; ?></td>
            <td><?= $person->fullname; ?></td>
            <td><?= $person->address; ?></td>
            <td><?= $person->age; ?></td>
            <td><?= $person->sex; ?></td>
            <td><?= $person->status; ?></td>
            <td><?= $person->company; ?></td>
            <td><?= $person->salary; ?></td>
            <td>
              <a onclick="return confirm('Are you sure you want to update this record ?')" href="edit.php?id=<?= $person->id ?>" class='btn btn-primary'>Edit</a>
                
                <a onclick="return confirm('Are you sure you want to delete this CItizen record?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-warning'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>