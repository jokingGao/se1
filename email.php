<?php
session_start();
@$email = $_SESSION["adminemail"];

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

$rowSQL = mysql_query( "SELECT MAX( PlanNum ) AS max FROM plan ;" );
$row = mysql_fetch_array( $rowSQL );
$largestNumber = $row['max']; 

$rst = mysql_query("SELECT * from plan where EmailAdd='$email' AND PlanNum='$largestNumber'");
$v = mysql_fetch_assoc($rst);

date_default_timezone_set("America/New_York");

$date = $v["StartDate"];
$time = $v["StartTime"];
echo $date;
echo " ";
echo $time;
echo " ";

$dateArray = explode('-', $date);
$y = $dateArray[0];
$m = $dateArray[1];
$d = $dateArray[2];
echo " ";
echo $y;
echo " ";
echo $m;
echo " ";
echo $d;

$timeArray = explode(':', $time);
$h = $timeArray[0];
$min = $timeArray[1];
$s = $timeArray[2];
echo " ";
echo $h;
echo " ";
echo $min;
echo " ";
echo $s;
echo " ";


$still = mktime($h, $min, $s, $m, $d, $y) - time();
echo $still;

if($still < 1800){

	require 'PHPMailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'nunugao@gmail.com';                 // SMTP username
	$mail->Password = 'Aa,123321';                    // SMTP password
	$mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('from@example.com', 'RUHealthy');
	$mail->addAddress('sevenlulu@outlook.com', 'Lulu');     // Add a recipient
	//$mail->addAddress('ellen@example.com');               // Name is optional
	$mail->addReplyTo('info@example.com', 'Information');
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'RU Healthy Reminder';
	$mail->Body    = $message; 
	$message = '<h4>Dear RU Healthey user: </h4>'
	$message .= '<h5>You have a upcoming workout plan:</h5>'
	$message .= ''
	$mail->Body    = 'Dear RU Healthy user You have a upcoming work out plan: <li>body</li>';

	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Message has been sent';
	}
//	break;
}





?>