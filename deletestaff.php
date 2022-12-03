<?php
$cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
$psq = pg_query("SELECT * FROM staff");
if(isset($_GET['delete'])){
  $nid=$_GET['delete'];
  $result = pg_query($cn,"DELETE FROM staff WHERE staff.staff_id =$nid" );
  if($result)
  {
	echo "deleted";
	header('Location:staffinfo.php');
  }else{
	echo"error";
  }
}
?>