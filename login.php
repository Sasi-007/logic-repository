<?php
        if(isset($_POST['sub']))
        {
            $username=$_POST['username'];
            $password=$_POST['password'];
           
           //$con=mysqli_connect("localhost","root"," ","logic_repository");
            $connect=mysqli_connect("localhost","root","","logic_repository");
            if(!$connect)
            {
                echo"database is not connected";
            }
            //$query="select *from login where 'username'=$username and 'password'=$password;";
             $query="select *from `login` where `username`='$username' and `password`='$password';";
            $result=mysqli_query($connect,$query);
            //echo"could not insert data:". mysqli_error($connect);
            if(mysqli_num_rows($result)==1)
            {
                $row=mysqli_fetch_array($result);
                session_start();
                $name=$row[0];
                $_SESSION['NAME']=$name;
                //echo $name;
                echo"<script>
                    location.href='home.php';
                </script>";
            }
            else
            {
               // echo"<script>
               // alert('username or password is incorrect');
               // location.href='index.php';
               // </script>";
                
                //echo"incoorect";
            
            }
        }
?>
