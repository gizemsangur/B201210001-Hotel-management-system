
<?php
 $cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
 $psq = pg_query("SELECT * FROM staff");
 $psq2 = pg_query("SELECT * FROM categoryofwork");
 global $psq;
 if(isset($_POST["btnSave"])&&$_POST["btnSave"]=="Save")
 {
     $cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
     $worker_name=$_POST["name"];
     $worker_sname=$_POST["surname"];
     $worker_salary=$_POST["salary"];
     $worker_national_id=$_POST["nid"];
     $category_work=$_POST["category"];
     $query="call add_staff('".$worker_name."','".$worker_sname."',".$worker_salary.",".$worker_national_id.",'".$category_work."')";
     $res=pg_query($cn,$query);
     if($res)
     {
    
        echo "Saved";
        header('Location:createstaff.php');
      
        
     }
 }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
          .menu,.staff-menu-bar,.room-menu-bar,.client-menu-bar, .menu-bar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            list-style-type: none;
            margin: 0;
            padding: 0;
            background: #f7f7f7;
            z-index:10;  
            overflow:hidden;
            box-shadow: 2px 0 18px rgba(0, 0, 0, 0.26);
        }
        .menu li a{
        display: block;
        text-indent: -500em;
        height: 5em;
        width: 5em;
        line-height: 5em;
        text-align:center;
        color: #72739f;
        position: relative;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        transition: background 0.1s ease-in-out;
        }
        .menu li a:before {
        font-family: FontAwesome;
        speak: none;
        text-indent: 0em;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        font-size: 1.4em;
        }
        .menu li a.search:before {
        content: "\f002";
        }
        .menu li a.archive:before {
        content: "\f187";
        }
        .menu li a.pencil:before {
        content: "\f040";
        }
        .menu li a.contact:before {
        content: "\f003";
        }
        .menu li a.about:before {
        content: "\f007";
        }
        .menu li a.home:before {
        content: "\f039";
        }
        .staff-menu-bar li a:hover,.client-menu-bar li a:hover,.room-menu-bar li a:hover,
        .menu-bar li a:hover,
        .menu li a:hover,
        .menu li:first-child a {
        background: #267fdd;
        color: #fff;
        }
        .menu-bar{
            overflow:hidden;
            left:5em;
            z-index:5;
            width:0;
            height:0;
            transition: all 0.1s ease-in-out;
        }
        .staff-menu-bar{
            overflow:hidden;
            left:5em;
            z-index:5;
            width:0;
            height:0;
            transition: all 0.1s ease-in-out;
        }
        .room-menu-bar{
            overflow:hidden;
            left:5em;
            z-index:5;
            width:0;
            height:0;
            transition: all 0.1s ease-in-out;
        }
        .client-menu-bar{
            overflow:hidden;
            left:5em;
            z-index:5;
            width:0;
            height:0;
            transition: all 0.1s ease-in-out;
        }
        .menu-bar li a{
        display: block;
        height: 4em;
        line-height: 4em;
        text-align:center;
        color: #72739f;
        text-decoration:none;  
        position: relative;
        font-family:verdana;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        transition: background 0.1s ease-in-out;
        }
        .staff-menu-bar li a{
        display: block;
        height: 4em;
        line-height: 4em;
        text-align:center;
        color: #72739f;
        text-decoration:none;  
        position: relative;
        font-family:verdana;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        transition: background 0.1s ease-in-out;
        }
        .room-menu-bar li a{
        display: block;
        height: 4em;
        line-height: 4em;
        text-align:center;
        color: #72739f;
        text-decoration:none;  
        position: relative;
        font-family:verdana;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        transition: background 0.1s ease-in-out;
        }
        .client-menu-bar li a{
        display: block;
        height: 4em;
        line-height: 4em;
        text-align:center;
        color: #72739f;
        text-decoration:none;  
        position: relative;
        font-family:verdana;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        transition: background 0.1s ease-in-out;
        }
        .menu-bar li:first-child a{
            height:5em;
            background: #267fdd;
            color: #fff;    
            line-height:5
        }
        .staff-menu-bar li:first-child a{
            height:5em;
            background: #267fdd;
            color: #fff;    
            line-height:5
        }
        .room-menu-bar li:first-child a{
            height:5em;
            background: #267fdd;
            color: #fff;    
            line-height:5
        }
        .client-menu-bar li:first-child a{
            height:5em;
            background: #267fdd;
            color: #fff;    
            line-height:5
        }
        .para{
            color:#033f72;
            padding-left:100px;
            font-size:3em;
            margin-bottom:20px;
        }

        .open{
            width:10em;
            height:100%;
        }

        @media all and (max-width: 500px) {
            .container{
                margin-top:100px;
            }
            .menu{
                height:5em;
                width:100%;
            }
            .menu li{
                display:inline-block;
                float:left;
            }
            .menu-bar li a{
                width:100%;
            }
            .staff-menu-bar li a{
                width:100%;
            }
            .room-menu-bar li a{
                width:100%;
            }
            .client-menu-bar li a{
                width:100%;
            }
            .menu-bar{
                width:100%;
                left:0;
                height:0;
            }
            .staff-menu-bar{
                width:100%;
                left:0;
                height:0;
            }
            .room-menu-bar{
                width:100%;
                left:0;
                height:0;
            }
            .client-menu-bar{
                width:100%;
                left:0;
                height:0;
            }
            .open{
                width:100%;
                height:auto;
            }
            .para{
            padding-left:5px;
        }  
        }
        @media screen and (max-height: 34em){
        .menu li,.staff-menu-bar,.room-menu-bar,.client-menu-bar,
        .menu-bar {
            font-size:70%;
        }
        }
        @media screen and (max-height: 34em) and (max-width: 500px){
        .menu{
                height:3.5em;
            }
        }
    </style>
    <title>Management Database</title>
</head>
<body>
<ul class="menu">
<li title="home"><a href="management01.php" class="fa-home">menu</a></li>
<li title="staff"><a href="#" class="staff-button fa-user">Staff</a></li>
<li title="Room"><a href="#" class="room-button fa-bed">Room</a></li>
<li title="Client"><a href="#" class="client-button fa-money">Client</a></li>
</ul>


<ul class="staff-menu-bar">
  <li><a href="#" class="staff-button">Menu</a></li>
  <li><a href="staffinfo.php">Staff Informations</a></li>
  <li><a href="createstaff.php">Create Staff</a></li>
</ul>
<ul class="room-menu-bar">
  <li><a href="#" class="staff-button">Menu</a></li>
  <li><a href="roomsituation.php">Room Informations</a></li>
  <li><a href="createroom.php">Create Room</a></li>
</ul>
<ul class="client-menu-bar">
  <li><a href="#" class="client-button">Menu</a></li>
  <li><a href="clientinfo.php">Client Informations</a></li>
  <li><a href="roombills.php">Room Billls</a></li>
  <li><a href="oldroombill.php">Old Room Billls</a></li>
</ul>
            <div class="row" style="text-align:center"><h1>Create Staff</h1></div>
            <div class="row">
              <div class="col-sm-4"></div>
              <div class="col-sm-4">
              
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="stafform">
                            <span>Name:</span><br><input id="input" type="text" name="name"/><br>
                            <span>Surname:</span><br><input id="input"type="text" name="surname"/><br>
                            <span>Salary:</span><br><input id="input" type="text" name="salary"/><br>
                            <span>National ID:</span><br><input id="input"type="text" name="nid"/><br>
                            <span>Categroy of work:</span><br>
                            <select name="category"  id="input">
                      <?php
                              $i=0;
                              while($row=pg_fetch_assoc($psq2)) {
                              ?>
                                <option ><?php echo $row["name"]; ?> </option>
                              <?php
                              $i++;
                              }
                              ?>
                    </select><br>
                            <input type="submit" id="savebtn"value="Save" name="btnSave"/>
                        </form>
              </div>
              <div class="col-sm-4"></div>
            </div>
            <script src="nav.js"></script>
</body>
</html>