<?php 

 $link =  mysqli_connect("localhost", "root", "", "dayisi_work");


   
    
    

    


    if (isset($_POST['submit'])){

        $Uname = $_POST['uname'];
        $Pword = $_POST['pword'];

        $query = "SELECT * FROM `login_details` WHERE `username` = '$Uname'";
        $get_data = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($get_data);

 


        if (empty($Uname) || empty($Pword)){

            echo "<h4 class='container alert alert-danger' style='width: 250px; font-size: 15px;'>This field cannot be empty</h4>";

        } else if (mysqli_num_rows($get_data) == 0){

            echo "<h4 class='container alert alert-danger' style='width: 250px; font-size: 15px;'>Username doesn't exist</h4>";

        } else if (mysqli_num_rows($get_data) == 1){

            if ($row['password'] == $Pword){
                echo "<h4 class='container alert alert-success' style='width: 250px; font-size: 15px;'> You are Welcome $Uname</h4> ";
            } else{
                echo "<h4 class='container alert alert-danger' style='width: 300px; font-size: 15px;'>Username and Password don't match</h4>";
            }

          

        }
    }




    



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Sign up</title>
</head>
<body>

    <div class="container" style="margin-top: 10%;">
 
        <form action="" method = "POST" class="">



            <div class="form-group">
                <label for="uname">Username </label>
                <input name="uname"  placeholder="Enter Username" type="text" class="form-control" style="width: 250px;" >
            </div>            

            <div class="form-group">
                <label for="pword">Password</label>
                <input name="pword" placeholder="Enter Password" type="password" class="form-control" style="width: 250px;">
            </div>

            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
          
            <input type="submit" name="submit" class="btn btn-primary">




        </form>


    </div>




    
    
</body>
</html>