<?php include('constants.php')?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="admin1.css" />
    <title>Buss Planet -Admin Login</title>
  </head>
  <body>
    <div class="container">
        <div class="forms-container">
          <div class="signin-signup">
            <form action="#" method="POST" class="sign-in-form">
              <h2 class="title">Admin Login</h2>
              <br>
              <?php
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
              <br>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Username" />
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" />
              </div>
              <input action="#" type="submit" name="submit" value="Login" class="btn solid" />
              <div class="social-media">
                <a href="#" class="social-icon">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </div>
            </form>
        </div>
    </div>
    <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Welcome Admin</h3>
            <p>
              Manage your website here!!
            </p>
          </div>
          <img src="img/admin.svg" class="image" alt="" />
        </div>
    </div>
    </div>

    <script src="../JS/app.js"></script>
</body>
</html>

<?php
    //process the value from form and save it in database
    //check wether button is clicked or not
    
    if(isset($_POST['submit']))
    {
        //get data from form
        $username = $_POST['username'];
        $password = md5($_POST['password']);//password encryption with md5

        //SQL query  to check the data into database

        $sql = "SELECT * FROM tbl_admin WHERE
            username='$username' AND
            password='$password'
        ";

         $res = mysqli_query($conn, $sql);

         $count = mysqli_num_rows($res);

         if($count==1)
         {
            $_SESSION['login'] = "<div class='sucess'>Login Sucessfull</div>";
            $_SESSION['user'] = $username;
            header('location:'.SITEURL.'admin/admin.php');
         }
         else
         {
          $_SESSION['login'] = "<div class='error'>Username or Password did not match.</div>";
          header('location:'.SITEURL.'admin/admin-sign.php');
         }
    
    }

?>