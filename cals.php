<?php session_start();
@$data_step = $_SESSION['Data_step'];
@$data_calory = $_SESSION['Data_calory'];
@$data_distance = $_SESSION['Data_distance'];
@$data_active1 = $_SESSION['Data_active1'];
@$data_active2 = $_SESSION['Data_active2'];
@$data_active3 = $_SESSION['Data_active3'];
@$step_today = $_SESSION['stepT'];
@$calory_today = $_SESSION['caloryT'];
@$distance_today = $_SESSION['distanceT'];
@$active_today = $_SESSION['activeT'];
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
                    <h1 class="page-header">Dashboard</h1>
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
                            <i class="fa fa-bar-chart-o fa-fw"></i> One Week Calories
                            <div class="pull-right">
                                <div class="btn-group">
                                    Calories
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="graph2"></div>
<script type="text/javascript">
// Use Morris.Area instead of Morris.Line
Morris.Bar({
  element: 'graph2',
  data: [
    {x: '<?php echo $data_calory['24']['dateTime']; ?>', y: <?php echo $data_calory['24']['value']; ?>},
    {x: '<?php echo $data_calory['25']['dateTime']; ?>', y: <?php echo $data_calory['25']['value']; ?>},
    {x: '<?php echo $data_calory['26']['dateTime']; ?>', y: <?php echo $data_calory['26']['value']; ?>},
    {x: '<?php echo $data_calory['27']['dateTime']; ?>', y: <?php echo $data_calory['27']['value']; ?>},
    {x: '<?php echo $data_calory['28']['dateTime']; ?>', y: <?php echo $data_calory['28']['value']; ?>},
    {x: '<?php echo $data_calory['29']['dateTime']; ?>', y: <?php echo $data_calory['29']['value']; ?>},
    {x: '<?php echo $data_calory['30']['dateTime']; ?>', y: <?php echo $data_calory['30']['value']; ?>},
  ],
  xkey: 'x',
  ykeys: ['y'],
  labels: ['Calories']
}).on('click', function(i, row){
  console.log(i, row);
});
</script>
                        </div>
                        <!-- /.panel-body -->
                    </div>
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

</body>

</html>
