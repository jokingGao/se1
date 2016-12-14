<?php session_start();
@$email=$_SESSION["adminemail"];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Contact us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="styles/font-awesome.min.css" />
    <link rel="stylesheet" href="styles/cover.css">

</head>
<body>
<?php
$conn = @mysql_connect("localhost","root","");
if (!$conn)
{
    die("Failed to connect database£º" . mysql_error());
}
$db=mysql_select_db("se1", $conn);
if(!$db)
{
  die("Failed to connect to MySQL:". mysql_error());
}

if($email == null)
	echo"<script>alert('you have to log in first!');location.href='login.php';</script>";

if(isset($_POST["submit"]))
{
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    if (empty($_POST["Message"])) 
      {
          echo "<script>alert('Message is empty!');location.href='Contactus.php';</script>";
      } 
    $Message=$_POST["Message"];
    $check_query=mysql_query("UPDATE Account SET Messages='$Message' WHERE EmailAdd='$email'");
    if($check_query)
     {
       echo "<script>alert('Your Message has been sent! We will process your request in 2 business days!');location.href='index.php';</script>";
     }
    else
     {
       echo "<script>alert('Error! Please try again later!');location.href='Contactus.php';</script>";
     }
  }
}
?>

<div class="container">

<div class="page-header">
    <h1>Contact us</h1>
</div>

<!-- Contact Form - START -->
<div class="container">
	<div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="well well-sm">
          <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
          <fieldset>
            <div class="form-group">
              <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
              <div class="col-md-8">
                <textarea class="form-control" name="Message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>
              </div>
            </div>
    
            <div class="form-group">
              <div class="col-md-12 text-center">
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                 <a href="index.php" class="btn btn-primary btn-lg">&nbsp&nbspBack&nbsp&nbsp</a>
              </div>
            </div>

          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>

<style>
    .header {
        color:#36A0FF;
        font-size:27px;
        padding:10px;
    }
    .bigicon {
        font-size:35px;
        color:#36A0FF;
    }
</style>
<!-- Contact Form - END -->

</div>

</body>
</html>