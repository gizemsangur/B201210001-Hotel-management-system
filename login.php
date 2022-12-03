<?php
    session_start();
    $cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
    if(count($_POST)>0) {
      $cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
      $uname=$_POST["username"];
      $password=$_POST["password"];
      $sql="SELECT * FROM userlogin WHERE username= '".$uname."' AND password='".$password."' limit 1";

      $result=pg_query($cn,$sql);
      if(pg_num_rows($result)==1){
        header('Location:/' .$uname.  '.php');
        exit();
      }else{
        echo "wrong";
      }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>Log In</title>
</head>
<body>
    <section id="first">
      
        <div class="row"></div>
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4" id="formdivgiris">
              <form class="logform" name="formlog" action="" method="post">
                  <div class="mb-3">
                      <h1>Log in</h1>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                  </div>
                  <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" onclick="showpsw()" for="exampleCheck1">Show the password</label>
                  </div>
                  <input  type="submit" id="savebtn" value="save" name="btnsave"/>
                </form>
              
            
                
          </div>
          <div class="col-sm-4"></div>
        </div>

        
        
       
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

