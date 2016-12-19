<?php session_start();
//@$step_today = $_SESSION['STEP'];
//@$calory_today = $_SESSION['CALORY'];
//@$distance_today = $_SESSION['DISTANCE'];
//@$active_today = $_SESSION['ACTIVE'];
//@$sleep_today = $_SESSION['SLEEP'];
require_once('FitbitClient.class.php');

if (isset($_GET['logout'])) {
   session_destroy();
   session_start();
}

if ((!isset($_SESSION['authFitbit']) || $_SESSION['authFitbit'] != 1) && isset($_REQUEST['code'])) {
   // Callback
   $fclient = new FitbitClient($_REQUEST['code']);
   $_SESSION['parameters'] = $fclient->getParameters();
   $_SESSION['authFitbit'] = 1;
}

if ((!isset($_SESSION['authFitbit']) || $_SESSION['authFitbit'] != 1)) {
   // First connection
   FitbitClient::getAuthorizationCode();
}

if (isset($_SESSION['authFitbit']) && $_SESSION['authFitbit'] == 1) {
   // Standard mode
   $fclient = new FitbitClient();
   $fclient->setParameters($_SESSION['parameters']);

   //print_r($fclient->getUserProfile());
   $userProfile = $fclient->getUserProfile();
   $user_weight = $userProfile['user']['weight'];
   $user_height = $userProfile['user']['height'];
   $BMI = $user_weight/($user_height*$user_height/10000);
   $avgStep = $userProfile['user']['averageDailySteps'];
   $_SESSION['BMI'] = $BMI;
   $_SESSION['avgStep'] = $avgStep;
   //print_r($fclient->getHeartRateIntraday());

   //Step
   $_SESSION['Steps'] = $fclient->getUserSteps();
   $_SESSION['Data_step'] = $_SESSION['Steps']['activities-steps'];
   //print_r($_SESSION['Steps']);
   //echo '<br />';
   //echo '<br />';
   $step_today = $_SESSION['Data_step']['30']['value'];
   $_SESSION['stepT'] = $step_today;
   //$_SESSION['STEP'] = $step_today;
   //print_r($step_today);

   //Calories
   $_SESSION['Calories'] = $fclient->getUserCalories();
   $_SESSION['Data_calory'] = $_SESSION['Calories']['activities-calories'];
   //print_r($_SESSION['Calories']);
   //echo '<br />';
   //echo '<br />';
   $calory_today = $_SESSION['Data_calory']['30']['value'];
   $_SESSION['caloryT'] = $calory_today;
   //$_SESSION['CALORY'] = $calory_today;
   //print_r($calory_today);

   //Distance
   $_SESSION['Distances'] = $fclient->getUserDistances();
   $_SESSION['Data_distance'] = $_SESSION['Distances']['activities-distance'];
   //print_r($_SESSION['Distances']);
   //echo '<br />';
   //echo '<br />';
   $distance_today = $_SESSION['Data_distance']['30']['value'];
   $_SESSION['distanceT'] = $distance_today;
   //$_SESSION['DISTANCE'] = $distance_today;
   //print_r($distance_today);

   //LightlyActive
   $_SESSION['ActiveLightly'] = $fclient->getUserActiveLightly();
   $_SESSION['Data_active1'] = $_SESSION['ActiveLightly']['activities-minutesLightlyActive'];
   //print_r($_SESSION['ActiveLightly']);
   //echo '<br />';
   //echo '<br />';
   $activelightly_today = $_SESSION['Data_active1']['30']['value'];
   //print_r($activelightly_today);

   //FairlyActive
   $_SESSION['ActiveFairly'] = $fclient->getUserActiveFairly();
   $_SESSION['Data_active2'] = $_SESSION['ActiveFairly']['activities-minutesFairlyActive'];
   //print_r($_SESSION['ActiveFairly']);
   //echo '<br />';
   $activefairly_today = $_SESSION['Data_active2']['30']['value'];
   //print_r($activefairly_today);

   //VeryActive
   $_SESSION['ActiveVery'] = $fclient->getUserActiveVery();
   $_SESSION['Data_active3'] = $_SESSION['ActiveVery']['activities-minutesVeryActive'];
   //print_r($_SESSION['ActiveVery']);
   //echo '<br />';
   $activevery_today = $_SESSION['Data_active3']['30']['value'];
   //print_r($activevery_today);

   //ActiveMinutes
   //$_SESSION['ActiveTime'] = $_SESSION['ActiveLightly'] + $_SESSION['ActiveFairly'] + $_SESSION['ActiveVery'];
   //print_r($_SESSION['ActiveTime']);

   //ActiveMinute_today
   //echo '<br />';
   $active_today = $activelightly_today + $activefairly_today + $activevery_today;
   $_SESSION['activeT'] = $active_today;
   //$_SESSION['ACTIVE'] = $active_today;
   //print_r($active_today);

   //SleepMinute_today
   $_SESSION['Sleep'] = $fclient->getUserSleep();
   $_SESSION['Data_sleep'] = $_SESSION['Sleep']['sleep-minutesAsleep'];
   //print_r($_SESSION['Sleep']);
   //echo '<br />';
   //echo '<br />';
   $sleep_today = $_SESSION['Data_sleep']['30']['value'];
   $_SESSION['sleepT'] = $sleep_today;
   //$_SESSION['SLEEP'] = $sleep_today;
   //print_r($sleep_today);

   $_SESSION['Goals'] = $fclient->getUserGoal();
   //print_r($_SESSION['Goals']);
   $goal_active = $_SESSION['Goals'][goals][activeMinutes];
   $goal_calory = $_SESSION['Goals'][goals][caloriesOut];
   $goal_distance = $_SESSION['Goals'][goals][distance];
   $goal_step = $_SESSION['Goals'][goals][steps];
   /*
   print_r($goal_step);
   print_r($goal_calory);
   print_r($goal_distance);
   print_r($goal_active);
   */
}
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <script src="morris.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
    <script src="examples/lib/example.js"></script>
    <!--<link rel="stylesheet" href="lib/example.css">-->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
    <link rel="stylesheet" href="morris.css">

</head>

<body>

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
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> User profile</a>
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
                    <h1 class="page-header"><i class="fa fa-dashboard"></i> Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-arrows-h fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo "$step_today" ?></div>
                                    <div>steps</div>
                                </div>
                            </div>
                        </div>
                        <a href="steps.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-fire fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo "$calory_today" ?></div>
                                    <div>cals</div>
                                </div>
                            </div>
                        </div>
                        <a href="cals.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-map-marker fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo "$distance_today" ?></div>
                                    <div >miles</div>
                                </div>
                            </div>
                        </div>
                        <a href="miles.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-clock-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo "$active_today" ?></div>
                                    <div>Active mins</div>
                                </div>
                            </div>
                        </div>
                        <a href="active.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Goals and daily achivements
                            <div class="pull-right">
                                
                            </div>
                        </div>

                        <div class="panel-body">
                            <div id="graph"></div>
<script type="text/javascript">
// Use Morris.Area instead of Morris.Line
Morris.Line({
  element: 'graph',
  data: [
    {x: 10, y: <?php echo $goal_step; ?>, z: <?php echo $step_today; ?>},
    {x: 20, y: <?php echo $goal_calory; ?>, z: <?php echo $calory_today; ?>},
    {x: 30, y: <?php echo $goal_distance; ?>, z: <?php echo $distance_today; ?>},
    {x: 40, y: <?php echo $goal_active; ?>, z: <?php echo $active_today; ?>}
  ],
  xkey: 'x',
  ykeys: ['y','z'],
  labels: ['Goal', 'Actual']
}).on('click', function(i, row){
  console.log(i, row);
});
</script>
                        </div>

                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Goals and daily achivements
                            <div class="pull-right">
                                
                            </div>
                        </div>

                        <div class="panel-body">
                            <div id="graphb"></div>
<script type="text/javascript">
// Use Morris.Area instead of Morris.Line
Morris.Bar({
  element: 'graphb',
  data: [
    {x: 10, y: <?php echo $goal_step; ?>, z: <?php echo $step_today; ?>},
    {x: 20, y: <?php echo $goal_calory; ?>, z: <?php echo $calory_today; ?>},
    {x: 30, y: <?php echo $goal_distance; ?>, z: <?php echo $distance_today; ?>},
    {x: 40, y: <?php echo $goal_active; ?>, z: <?php echo $active_today; ?>}
  ],
  xkey: 'x',
  ykeys: ['y','z'],
  labels: ['Goal', 'Actual']
}).on('click', function(i, row){
  console.log(i, row);
});
</script>
                        </div>

                    </div>
                    <!-- /.panel -->
                    
                    <!-- /.panel -->
                
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
    <!--
    <script src="scripts/raphael.min.js"></script>
    <script src="scripts/morris.min.js"></script>
    <script src="scripts/morris-data.js"></script>
    -->

    <!-- Custom Theme JavaScript -->
    <script src="scripts/sb-admin-2.js"></script>

    
</body>

</html>
