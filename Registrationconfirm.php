<?php
ob_start();
require_once '../../includes/autoload.php';
include'../../includes/header.php';

use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;
 


//session_start();

$user = null;

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
$firstName = $_SESSION['firstname'];
$lastName = $_SESSION['lastname'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$confirmPassword = $_SESSION['confirmpassword'];
$city = $_SESSION['city'];
$country = $_SESSION['country'];
$mail_subscribe = $_SESSION['mail_subscribe'];

/*$user=new User();
$user->firstName=$firstName;
$user->lastName=$lastName;
$user->email=$email;
$user->password=$password;
$user->confirmPassword=$confirmPassword;
$user->city=$city;
$user->country=$country;*/

}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$UM=new UserManager();
$existuser=$UM->getUserByEmail( $_SESSION['email']);

$user=new User();
$user->firstName = $_SESSION['firstname'];
$user->lastName = $_SESSION['lastname'];
$user->email = $_SESSION['email'];
$user->password = $_SESSION['password'];
$user->confirmPassword = $_SESSION['confirmpassword'];
$user->city = $_SESSION['city'];
$user->country = $_SESSION['country'];
$user->mail_subscribe = $_SESSION['mail_subscribe'];

var_dump($user);
if (is_null($existuser)){
        $UM->saveUser($user);
        header("Location:registerthankyou.php");
}
else
{
    header("Location:Registration.php");
}
}
/*echo "Registration confirmation Form"."<br>";
echo "firstname is: ".$firstName."<br>";
echo "lastname is: ".$lastName."<br>";
echo "email is: ".$email."<br>";
echo "password is: ".$password."<br>";
echo "confirmpassword is: ".$confirmPassword."<br>";
echo "city is: ".$city."<br>";
echo "country is: ".$country."<br>";*/
?>
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
<style>
.error {color: #FF0000;}
body {
   background-color:snow;
    text-align: center;
	padding: 5px;
	background-image:url("/Phpmailer/public/images/girl.PNG");
	background-position: 10% 10%;
    background-size: 1400px 300px;	
	background-repeat: no-repeat;
    
  }

</style>

</head></br>	</br>	
<body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<!--Start of Form-->
	<form method='post' action="Registrationconfirm.php" onsubmit=returnvalidate();>
	
<h2>Registration confirmation form</h2>

<!--firstName -->
    
FIRST NAME: <label for="firstname" ><?php echo $_SESSION['firstname'];?></label></br>
</br>
					
<!--firstName -->
<!--lastName -->   
LAST NAME: <label for="lastname"><?php echo  $_SESSION['lastname'];?></label></br>    
</br>
<!--lastName -->
 <!--email -->
EMAIL ID: <label for= "email"><?php echo $_SESSION['email'];?></label></br>  		
</br>			
 <!--email -->
<!--password -->
PASSWORD: <label for="password" hidden ><?php echo $_SESSION['password'];?></label></br> 
 
</br>			
<!--confirmpassword -->
CONFIRMPASSWORD: <label for= "confirmpassword" hidden><?php echo $_SESSION['confirmpassword'];?></label></br>
</br>  	
<!--city -->
 
CITY: <label for= "city"><?php echo $_SESSION['city'];?></label>	</br>  
</br>			
<!--city -->
<!--country -->
COUNTRY: <label for="country"><?php echo $_SESSION['country'];?></label></br> 		
</br>		
 	
<!--country -->
<!--subscribe -->
SUBSCRIBE: <label for="mail_subscribe"><?php echo $_SESSION['mail_subscribe']?>;</label></br>
<!--subscribe  -->

</br>  </br>   
<input type="submit" name="confirm" value="confirm" ; onclick="javascript:clearForm();"><input type="submit" name="back" value="back" onclick="javascript:clearForm();">
</form>			

</br>  </br>  </br>  </br> 



<!--End of Form-->
</body> 
</html>

<?php 
include('../../includes/footer.php');

?>