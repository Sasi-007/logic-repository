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
    <h3 class="f">POST LOGIC</h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="upload.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Date of The Submission"><b>Date of The Submission</b></label>
                        <input type="text" class="form-control" name="date" id="input" value="<?php echo date('d-m-Y')?>" />
                    </div>
                    <div class="form-group">
                        <label for="logic name"><b>Logic Name</b></label>
                        <input type="text" class="form-control" name="logic" required />
                    </div>
                    <div class="form-group">
                        <label for="logic explanation"><b>Logic Explanation</b></label>
                        <textarea class="form-control" rows="3" name="explanation" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="logic solution"><b>Logic Solution</b></label>
                        <textarea class="form-control" rows="6" name="solution" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="upload image"><b>Upload Image</b></label>
                        <input type="file" class="form-control" id="image" name="image" />
                    </div>
                    <input type="submit" class="btn btn-primary btn-lg" name="post" id="insert" value="POST">
                </form>
            </div>
        </div>
    </div>
    <?php
    include('footer.php');
    ?>
    <script>
        $(document).ready(function() {
            $('#insert').click(function() {
                var image_name = $('#image').val();
                if (image_name == '') {
                    alert("Please Select Image");
                    return false;
                } else {
                    var extension = $('#image').val().split('.').pop().toLowerCase();
                    if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        alert('Invalid Image File');
                        $('#image').val('');
                        return false;
                    }
                }
            });
        });

    </script>
</body>

</html>
