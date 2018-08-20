<?php
//include('includes/header.php');
include './public/includes/header.php';

require_once './PHPMailerAutoload.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $subject=$_REQUEST["subject"];
    $message=$_REQUEST["message"];
    

$mail = new PHPMailer();
$mail->setFrom('xxx', 'Admin');

$mail->Subject = $subject;
$mail->isHTML(TRUE);
$mail->Body = $message;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = TRUE;
 

$mail->Username = 'xxx';
$mail->Password = 'yyy';

$mysql = mysqli_connect('localhost','root','xxx');
mysqli_select_db($mysql,'db1');
$result = mysqli_query($mysql,'select * from table zzz');
foreach($result as $row){
	
	$mail->addAddress($row['email'],$row['firstname']);
	if(!$mail->send()){
		echo $mail->ErrorInfo;
		break;
	}
	
	{
	    
	    echo "message sent to:".$row['email'];
	}
	$mail->clearAddresses();
}
}

?>
<!DOCTYPE HTML>  
<html>
<head>
<style type="text/css">
body {

   
   background-color:lightblue;
   }
form
{
  text-align:center;
}
h3 {
    color: purple;
    text-align: center;
}

</style>
</head>
<body>
<br><br>
<form method='post' action="" >
<h3>BULK MAILING TO ALL USERS</h3><br><br>
  Subject:<br><br>
  <input type="text" name="subject" value="<?php $subject?>" style=" height: 30px; width:280px; "><br><br>
  Message:<br><br>
                  
  <input type="text" id="area" name="message"  value="<?php $message?>"  style=" height: 100px; width:280px; "><br><br>
 
  <td colspan="3" align="center">
   <input type="submit" name="send" value="send" onclick="javascript:clearForm();">
   
   </td>
 
</form><br><br><br><br><br><br><br><br><br>
</body><br>
</html>
<?php
include('./public/includes//footer.php');
?>
