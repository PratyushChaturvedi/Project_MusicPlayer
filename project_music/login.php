<?php include('constants.php')?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
    <link rel="stylesheet" href="login.css">
    <title>login and signup page</title>
</head>

<body>
    
    <!-- <img class="bg" src="bg.jpg" alt="Error"> -->
    <div class="d1">
        <div class="form_container">
            <div class="button_box">
                <div id="btn"></div>
                <button type="button" class="login_but" onclick="login()">Log In</button>
                <button type="button" class="login_but" onclick="signup()">Sign Up</button>
            </div>

            <?php

                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

              if(isset($_SESSION['login']))
              {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
              }

              if(isset($_SESSION['no-login-message']))
              {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
              }
              ?>

            <form id="login" class="input-group">
                <input type="text" name="username" id="name" class="input-field" placeholder="User Id" required>
                <input type="password" name="password" id="passward" class="input-field" placeholder="Enter Password"
                    required>
                <input type="checkbox" class="check-box"><span id="login-span">Remember Password</span>

                <button type="submit" name="submit" class="submit-btn">Log in</button>
               <a href="https://www.youtube.com/watch?v=1XevoCeOQ9c">Forgot Passward?</a>

               <p id="login-with">Or login with</p>
            </form>
            
            <?php
    //process the value from form and save it in database
    //check wether button is clicked or not
    
    if(isset($_POST['submit']))
    {
        //get data from form
        $username = $_POST['username'];
        $password = md5($_POST['password']);//password encryption with md5

        //SQL query  to check the data into database

        $sql = "SELECT * FROM tbl_user WHERE
            username='$username' AND
            password='$password'
        ";

         $res = mysqli_query($conn, $sql);

         $count = mysqli_num_rows($res);

         if($count==1)
         {
            $_SESSION['login'] = "<div class='sucess'>Login Sucessfull</div>";
            $_SESSION['user'] = $username;
            header('location:'.SITEURL.'login.php');
         }
         else
         {
          $_SESSION['login'] = "<div class='error'>Username or Password did not match.</div>";
          header('location:'.SITEURL.'login.php');
         }
    
    }

?>

            <form id="signup" class="input-group">
                <input type="text" name="username" class="input-field" placeholder="User Id" required>

                <input type="email" name="email" id="email" class="input-field" placeholder="Email Id" required>
                <input type="password" name="passward" id="passward" class="input-field" placeholder="Enter Passward"
                    required>
                <input type="checkbox" class="check-box">
                <span id="signup-span"><a href="http://127.0.0.1:5500/terms.html">I agree to the terms and conditions</span></a>
                <input type="submit" name="submit1" value="Sign up" class="submit-btn" />
                
                <!-- 
                <div class="fr">
                    <input type="text" placeholder="email">
                </div>
                <div class="fr1">
                    <input type="submit" value="send">
                </div> -->

            </form>
        </div>
    </div>





    <div class="social-menu">

        <ul>
            <li><a href=""><i class="fa fa-facebook"></i></a></li>
            <li><a href=""><i class="fa fa-twitter"></i></a></li>
            <li><a href=""><i class="fa fa-instagram"></i></a></li>
            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
        </ul>
    </div>
    
</div>


<script>
        var x = document.getElementById("login");
        var y = document.getElementById("signup");
        var z = document.getElementById("btn");

        function signup() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }

    </script>


</body>

</html>

<?php
              //process the value from form and save it in database
              //check wether button is clicked or not
              
              if(isset($_POST['submit1']))
              {
                  //button clicked
                  //echo"Button Clicked";

                  //get data fron form
                  
                  $username = $_POST['username'];
                  $email = $_POST['email'];
                  $password = md5($_POST['password']);//password encryption with md5

                  //SQL query  to save the data into database

                  $sql = "INSERT INTO tbl_user SET
                      username='$username',
                      email='$email',
                      password='$password'
                  ";

                  //execute query and save data in database
                  $res1 = mysqli_query($conn, $sql) or die(mysqli_error($conn,$sql));
              
                  //check wether query is inserted or not
                  if($res1==TRUE)
                  {
                      //Data Inserted
                      //echo "Data Inserted";
                      $_SESSION['add']= "<div class='sucess'>Sign Up sucessful</div>";

                      header("location:".SITEURL.'login.php');
                  }
                  else
                  {
                      //Failed to insert data
                      //echo "failed to insert data";
                      $_SESSION['add']= "<div class='error'>Failed to Add User</div>";

                      header("location:".SITEURL.'login.php');
                  }
              }

          ?>

