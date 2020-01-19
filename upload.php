<?php
    session_start();
    if(isset($_POST['post']))
    {
        $username=$_SESSION['NAME'];
        $date=date('d-m-Y');
        $logic_name=$_POST['logic'];
        $logic_explanation=$_POST['explanation'];
        $logic_solution=$_POST['solution'];
       // $logic_image=$_POST['image'];
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
       // $query = "INSERT INTO tbl_images(name) VALUES ('$file')";  
        $con=mysqli_connect("localhost","root","","logic_repository");
        if(!$con)
        {
            echo"Database is not connected";
        }
        $query="insert into `post` values('$username','$date','$logic_name','$logic_explanation','$logic_solution','$file');";
        $result=mysqli_query($con,$query);
        //echo"could not insert data:". mysqli_error($con);
        if($result)
        {
            echo"<script>
            location.href='home.php';
            </script>";
        }
        else
        {
            echo"fail";
        }
    }
?>