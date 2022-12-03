<?php

$cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
    $psq = pg_query("SELECT * FROM room_situation");
    if(isset($_POST["btnSave"])&&$_POST["btnSave"]=="Save")
        {
            $cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
            $c_name=$_POST["name1"];
            $c_surname=$_POST["surname1"];
            $c_mail=$_POST["mail1"];
            $c_message=$_POST["text1"]  ;         
            $query="call add_contactform('".$c_name."','".$c_surname."','".$c_mail."','".$c_message."')";
            $res=pg_query($cn,$query);

        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dragonfly.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
      .contactbox{
        position: absolute;
        top: 1100px;
        left: 60%;
        height:500px ;
        width: 400px;
        padding: 40px;
        text-align:center;
        transform: translate(-50%, -50%);
        background: rgba(0,0,0,.5);
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(0,0,0,.6);
        border-radius: 10px;
        z-index: 1;
      }
      .contactbox input,.contactbox textarea{
        background: rgba(0,0,0,.5);
      }
    </style>
    <title>DRAGONFLY INN</title>
</head>
<body>
    <section id="first">
      
        <div class="row" id="selection" >
            <div class="col-sm-5" id="homefirst" >
              <h1 style="position:absolute; left: 10px; ">Dragonfly</h1>
              <img src="./beach.jpg" alt="" id="imagef" width="900" height="700">
            </div>
            <div class="col-sm-7" id="homesecond" style="background-color:antiquewhite ; color: rgb(0, 0, 0);">
                <h1 style="position: relative; top: 35%; text-align: center;">A boutique <br> hotel for those seeking <br> stillness.</h1>
                <button onclick="location.href='reservation.php'" style="background-color: transparent;position: relative;top: 35%;text-align: center;left: 43%;" >BOOK A ROOM</button>
                <i class="fa fa-angle-double-down" aria-hidden="true" style="position: relative;top:60%;left:30%;font-size:90px;" onclick="location.href='#section2'"></i>
            </div>
        </div>
        <div class="row" id="section2" style="height:100vh;">
            <div class="contactbox">
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="stafform" >
                <span>Name:</span><br> <input id="input" type="text" name="name1"/><br>
                <span>Surname:</span> <br><input id="input" type="text" name="surname1"/><br>
                <span>mail:</span><br> <input  id="input"type="text" name="mail1"/><br>
                <span>Message</span><br><textarea name="text1" cols="40" rows="5"></textarea>
                <input type="submit" id="savebtn" value="Save" name="btnSave"/>
          </form>

                <!--<h2>Address</h2>
                <p>Street: 161 Trumpeter Ave <br>

                  City: Soldotna <br>
                  
                  State: Alaska (AK) <br>
                  
                  Zipcode: 99669 <br>
                  
                  Country: USA</p>
                <h2>Phone Numbers</h2>
                <p>
                  (907) 262-2578 <br>
                  (907) 247-9199
                </p> -->
            </div>
           <div class="col-sm-12" style="background-color: antiquewhite;">
            <div>
              <img src="./hotel.jpg" alt="" width="700" height="500" style="position: absolute;left: 5%;top: 750px;">
            </div>
           </div>
           
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>