<?php
    session_start();
    if(!$_SESSION['NAME'])
    {
       echo"<script>location.href='index.php';</script>";
    }
    //echo $_SESSION['NAME'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Logic Repository</title>
    <!-- -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu&display=swap" rel="stylesheet">
    <!-- Bootstrap cdn for css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap for jquery and javascript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="home_css.css">
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <h3 class="f">VIEW LOGIC</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">S.NO</th>
                    <th scope="col">DATE OF SUBMISSION</th>
                    <th scope="col">LOGIC NAME</th>
                    <th scope="col">LOGIC EXPLANATION</th>
                    <th scope="col">LOGIC SOLUTION</th>
                    <th scope="col">IMAGE 
                    
                    <input class="form-control form-control-sm" style="display:inline-flex;width:126px;float:right"  id="myInput" type="text" placeholder="Search..">
                    </th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
                   $con=mysqli_connect("localhost","root","","logic_repository");
                  $username=$_SESSION['NAME'];
                    if(!$con)
                    {
                      echo"Database is not connected";
                    }
                   $query="select `date_of_submission`, `logic_name`, `logic_explanation`, `logic_solution`, `image` from `post` where `username`='$username';";
                    $result=mysqli_query($con,$query);
                   //echo"could not insert data:". mysqli_error($con);
                   $i=1;
                    while($row=mysqli_fetch_array($result))
                    {
                    
                ?>
                <tr>
                   <?php
                    echo"<th scope='row'>$i</th>";
                    echo"<td>$row[0]</td>";
                        ?>
                    <td><?php echo nl2br($row[1]);?></td>
                        
                    <td style="width:240px;"><?php echo nl2br($row[2]);?></td>
                     <td><?php echo nl2br($row[3]);?></td>
                    <?php
                    //echo"<td>$row[3]</td>";
                    echo'<td>
                     <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="350" width="400" class="img-thumnail" />  </td>';
                    $i++;
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
  $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      
    });
  });
});
</script>

    <?php
    include('footer.php');
    ?>
</body>

</html>
