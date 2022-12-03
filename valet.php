<?php
  error_reporting(0);
  @ini_set('display_errors', 0);
    $cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
    $psq = pg_query("SELECT * FROM parkinglots");
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Parking Lots</title>
</head>
<body>
    <section id="first">
        <nav class="navbar navbar-expand-lg bg-light" id="navbar">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Dragonfly Inn <br>Parking Lots </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  
                </ul>
              </div>
            </div>
        </nav>
        <div class="row"></div>
        <div class="row">
          <div class="col-sm-4"></div>
            <div class="col-sm-4">
            <table class="table  table-striped">
                            <tr>
                                <th>Id</th>
                                
                                
                                <th>Status</th>
                            </tr>
                            <?php
                            $i=0;
                            while($row=pg_fetch_assoc($psq)) {
                            ?>
                              
                                <tr>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td>
                                      <?php
                                        if($row['status']==1){
                                          echo '<p><a href="status.php?id='.$row['id'].'&status=0">enable</a></p>';
                                        }else{
                                          echo '<p><a href="status.php?id='.$row['id'].'&status=1">disable</a></p>';
                                        }
                                      ?>
                                    </td>
                                    
                                </tr>
                            <?php
                            $i++;
                            }
                            ?>
                              
                        </table>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </section>

    <script src="test.js"></script>
</body>
</html>