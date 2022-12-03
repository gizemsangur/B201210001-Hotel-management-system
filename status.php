<?php
 $cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
 $psq = pg_query("SELECT * FROM parkinglots");
include ('valet.php');

$id=$_GET['id'];
$status=$_GET['status'];

$q="UPDATE parkinglots SET status=$status where id=$id";
$result=pg_query($cn,$q);
if($result)
      {
        header('Location:valet.php');
      }


?>