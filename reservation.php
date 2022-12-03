<?php

$cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
    $psq = pg_query("SELECT * FROM room_situation");
    if(isset($_POST["btnSave"])&&$_POST["btnSave"]=="Save")
        {
            $cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
            $c_name=$_POST["name1"];
            $c_surname=$_POST["surname1"];
            $c_phone=$_POST["phone_number1"];
            $c_mail=$_POST["mail1"];
            $c_nationalid=$_POST["nid1"];
            $c_roomtype=$_POST["room"];
            $checkin=$_POST["checkin"];
            $checkout=$_POST["checkout"];
            $query="call add_client('".$c_name."','".$c_surname."',".$c_phone.",".$c_nationalid.",'".$c_mail."',".$c_roomtype.",'".$checkin."','".$checkout."')";
            $res=pg_query($cn,$query);

            header("home.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      .loginbox{
        position: relative;
        top: 50%;
        left: 50%;
        width: 400px;
        padding: 40px;
        text-align:center;
        transform: translate(-50%, -50%);
        background: rgba(0,0,0,.5);
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(0,0,0,.6);
        border-radius: 10px;
      }
      #input
      {
        border-radius: 20px;
        border: none;
        background-color: rgba(244, 236, 236, 0.61);
        backdrop-filter: blur(5px);
      }
      #savebtn
      {
        position: relative;
        border-radius: 10px;
        border: none;
        top: 2px;
        background-color: rgba(244, 236, 236, 0.61);
        backdrop-filter: blur(5px);
      }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   
    <title>Reservation</title>
</head>
<body>
<section id="first">
        <h1 style="position:absolute; left: 10px; ">DRAGONFLY</h1>
        <div class="row" id="resdiv" style="height:100vh;background-color:antiquewhite;">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <div class="loginbox">
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="stafform" >
                      <span>Name:</span><br> <input id="input" type="text" name="name1"/><br>
                      <span>Surname:</span> <br><input id="input" type="text" name="surname1"/><br>
                      <span>Phone Number:</span><br> <input  id="input" type="text" name="phone_number1"/><br>
                      <span>mail:</span><br> <input  id="input"type="text" name="mail1"/><br>
                      <span>National ID:</span><br> <input  id="input"type="text" name="nid1"/><br>
                      <span>Room type:</span> 
                      <select name="room"  id="input">
                      <?php
                                $i=0;
                                while($row=pg_fetch_assoc($psq)) {
                                ?>
                                  <option ><?php echo $row["room_price"]; ?></option>
                                <?php
                                $i++;
                                }
                                ?>
                      </select><br>

                      <span>Check-in date:</span>
                      <input type="date" name="checkin" id="input"><br>
                      <span>Check-out date:</span>
                      <input type="date" name="checkout" id="input"><br>
                      <input type="submit" id="savebtn" value="Save" name="btnSave"/>
                </form>
            </div>
          </div>
          <div class="col-sm-4"></div>
        </div>
    </section>
</body>
</html>

            