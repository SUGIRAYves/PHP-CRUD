<?php
session_start();
require 'includeFiles/header.php';
?>

<?php
require 'includeFiles/config.php';
if(isset($_POST['btnSearch'])){
    echo "btn is clicked";
    
			/*$txt= $_POST['txtSearch'];
			$sql=$db->prepare("SELECT * FROM employee WHERE fname LIKE :s OR lname LIKE :l OR address LIKE :a OR position LIKE :p OR gender LIKE :g");
			$sql->execute(array(
				':s'=>'%'.$txt.'%',
				':l'=>'%'.$txt.'%',
				':a'=>'%'.$txt.'%',
				':p'=>'%'.$txt.'%',
				':g'=>$txt.'%',
                

			));*/
}
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