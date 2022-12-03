<?php
$cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
$psq = pg_query("SELECT * FROM room_situation");
if(isset($_GET['delete'])){
  $rid=$_GET['delete'];
  $result = pg_query($cn,"DELETE FROM room_situation WHERE room_situation.room_id ='$rid'" );
  if($result)
  {
	echo "deleted";
	header('Location:roomsituation.php');
  }else{
	echo"error";
  }
}
?>