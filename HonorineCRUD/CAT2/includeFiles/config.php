<?php
$dsn = 'mysql:host=localhost;dbname=citizensjobstatus';
$username='root';
$password='';
$options=[];
try{
    //Creating PDO instance
    $connection=new PDO($dsn,$username,$password,$options);
}
catch (PDOException $e){
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}