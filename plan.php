<?php session_start();
@$email = $_SESSION["adminemail"];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RU Healthy</title>

    <!-- Bootstrap Core CSS -->
    <link href="styles/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="styles/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="styles/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="styles/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="styles/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- time picker -->
    <link rel="styleshee" type="text/css" href="styles/jquery.timepicker.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap-datepicker.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

$result = mysql_query("SELECT * from plan where EmailAdd='$email'");
$value = mysql_fetch_assoc($result);

if(isset($_POST["submit"]))
{
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  { 
    if(@$_POST["StartDate"] != null){    
    $StartDate=$_POST["StartDate"];
    mysql_query("UPDATE plan SET StartDate='$StartDate' WHERE EmailAdd='$email'");
    }
    if(@$_POST["StartTime"] != null){    
    $StartTime=$_POST["StartTime"];
    mysql_query("UPDATE plan SET StartTime='$StartTime' WHERE EmailAdd='$email'");
    }
    if(@$_POST["EndTime"] != null){
    $EndTime=$_POST["EndTime"];
    mysql_query("UPDATE plan SET EndTime='$EndTime' WHERE EmailAdd='$email'");
    }
    if(@$_POST["EndDate"] != null){
    $EndDate=$_POST["EndDate"];
    mysql_query("UPDATE plan SET EndDate='$EndDate' WHERE EmailAdd='$email'");
    }

    //Body checkbox
    if(@$_POST["Body"] != null){

    $result = "";
    foreach ($_POST["Body"] as $i) {
        //$result .= $i;
        $result = implode(",",$_POST["Body"]);
    }

    mysql_query("UPDATE plan SET Body='$result' WHERE EmailAdd='$email'");
    }

  }
}
?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">RU Healthy</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="friends.php"><i class="fa fa-facebook fa-fw"></i> Friends</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Fitting<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="plan.php">Plan</a>
                                </li>
                                <li>
                                    <a href="gym.php">GYM</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="suggestion.php"><i class="fa fa-tag fa-fw"></i> Suggestion</a>
                        </li>
                        <li>
                            <a href="contactus.php"><i class="fa fa-envelope-o fa-fw"></i> Contact Us</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-calendar-o"></i> Plan</h1>
                </div>
                <!-- /.col-lg-12 -->

                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <i class="fa fa-edit fa-fw"></i> Input plan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >
                                        <h4><i class="fa fa-clock-o"></i> Please select a time: </h4>
                                        <p id="basicExample">
                                            <input type="text" class="date start" name="StartDate" />
                                            <input type="text" class="time start ui-timepicker-input" name="StartTime" /> to
                                            <input type="text" class="time end ui-timepicker-input" name="EndTime" />
                                            <input type="text" class="date end" name="EndDate" />
                                        </p>
                                        <br>
                                        <h4><i class="fa fa-user"></i> Please select body parts you want to fit: </h4>

                                        <div class="form-group">
                                            <label>Upper</label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="Breast" name="Body[]">Breast
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="Back" name="Body[]">Back
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="Shoulder" name="Body[]">Shoulder
                                            </label>
                                            <label class="checkbox-inline">
                                            <input type="checkbox" value="Arms" name="Body[]">Arms
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>Core</label>
                                            <label class="checkbox-inline">
                                            <input type="checkbox" value="Abs" name="Body[]">Abs
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>Lower</label>
                                            <label class="checkbox-inline">
                                            <input type="checkbox" value="Gluteus" name="Body[]">Gluteus
                                            </label>
                                            <label class="checkbox-inline">
                                            <input type="checkbox" value="Legs" name="Body[]">Legs
                                            </label>
                                        </div>

                                        <button type="submit" class="btn btn-default" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                    <!--/.plan form -->
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <i class="fa fa-calendar-o fa-fw"></i> Generated Plan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge danger"><i class="fa fa-check"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Assignment 1</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> from <?php  echo $value['StartDate']; echo " "; echo $value['StartTime'];?> to <?php  echo $value['EndDate']; echo " "; echo $value['EndTime'];?></small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <ul>
                                                <?php  
                                                    $array = explode(',', $value['Body']);
                                                    foreach ($array as $i) {
                                                        echo "<li>";
                                                        echo $i;
                                                        echo "</li>";
                                                    }
                                                ?>

                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge danger"><i class="fa fa-check"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Assignment 1</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> from to</small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <ul>
                                                <li>List Item</li>
                                                <li>List Item</li>
                                                <li>List Item</li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge danger"><i class="fa fa-check"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Assignment 1</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> from to</small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <ul>
                                                <li>List Item</li>
                                                <li>List Item</li>
                                                <li>List Item</li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge danger"><i class="fa fa-check"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Assignment 1</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> from to</small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <ul>
                                                <li>List Item</li>
                                                <li>List Item</li>
                                                <li>List Item</li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                
                                
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                </div>
                <!-- /.col-lg-12 -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="scripts/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="scripts/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="scripts/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="scripts/raphael.min.js"></script>
    <script src="scripts/morris.min.js"></script>
    <script src="scripts/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="scripts/sb-admin-2.js"></script>

    <!-- time picker -->
    <script type="text/javascript" src="scripts/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="scripts/jquery.timepicker.js"></script>
    <script type="text/javascript" src="scripts/datepair.js"></script>
    <script>
    // initialize input widgets first
    $('#basicExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'G:i'
    });

    $('#basicExample .date').datepicker({
        'format': 'yyyy/m/d',
        'autoclose': true
    });

    // initialize datepair
    var basicExampleEl = document.getElementById('basicExample');
    var datepair = new Datepair(basicExampleEl);
    </script>

</body>

</html>
