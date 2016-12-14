<?php session_start();
?>
<!DOCTYPE html>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>login</title>

    <!-- Bootstrap core CSS -->
    <link href="styles/bootstrap.min.css" rel="stylesheet">

    <link href="styles/signin.css" rel="stylesheet">
    <link href="styles/cover.css" rel="stylesheet">
  </head>

  <body>

<?php

// Connect to the database
$conn = @mysql_connect("localhost","root","");
if (!$conn){
    die("Failed to connect database£º" . mysql_error());
}
$db=mysql_select_db("se1", $conn);
if(!$db)
{
  die("Failed to connect to MySQL:". mysql_error());
}


$email=$password="";
if(isset($_POST["submit"]))
{
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if (empty($_POST["email"])) 
  {
     echo "<script>alert('Email Address is empty!');location.href='login.php';</script>";
  } 
  else 
  {
     $email = test_input($_POST["email"]);
     
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
     {
       echo "<script>alert('Email Format is Error!');location.href='login.php';</script>";
     }
  }
  if (empty($_POST["password"])) 
  {
     echo "<script>alert('Password is Empty!');location.href='login.php';</script>";
  } 
  else 
  {
     $password= test_input($_POST["password"]);

     
  }
//Check the user
$check_query = mysql_query("SELECT * from Account where EmailAdd='$email' and Password='$password'"); 
if ($check_query)
{ 
  $row=mysql_fetch_array($check_query);

  if($row)
  {
    if(!empty($_POST["rembember"]))
    {
    $_SESSION["adminemail"]=$email;
    $_SESSION["adminpassword"]=$password;
    }
    echo "<script>alert('You have successfully logged in!');location.href='index.php';</script>";
  }
  else
  {
    echo "<script>alert('Your Account is not right!');location.href='login.php';</script>";
  }
}
}
}


function test_input($data) 
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

    <div class="container">

      <form class="form-signin" role="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <h2 class="form-signin-heading">Welcome to RU Healthy!</h2>
        <input type="email" class="form-control" placeholder="Email address" name="email" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <label class="checkbox">

        <input type="checkbox" value="remember-me" name="rembember"> Remember me
        </label>
        <a href="Forgetpassword.html">Forget Password?</a>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <a href="Signup.php">Join us!</a>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Log in</button>
      </form>

    </div> <!-- /container -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
