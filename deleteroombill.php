
<?php
 $cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
 $psq = pg_query("SELECT * FROM room_bill");
 global $psq;
 if(isset($_GET['delete']))
 {
     $cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
     $nid=$_GET['delete'];
     $query="call delete_bill(".$nid.")";
 
     $res=pg_query($cn,$query);

     if($res)
     {
    
        echo "Deleted";
        header('Location:roombills.php');
      
        
     }else
      echo"didnt";
 }   
?>