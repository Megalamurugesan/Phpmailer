<?php
/**
 * ob_start() is output buffer start.
 * The ability to refer to an external fully qualified name with an alias,
 * or importing, is an important feature of namespaces.
 * In PHP, aliasing is accomplished with the use operator.
 * Classes Config, DBUtil, and User are imported.
 *
 */
ob_start();
//session_start();
require_once '../../includes/autoload.php';
include'../../includes/header.php';



use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;

/**
 * declare variables assigning as null
 */

$firstName=$lastName=$email=$password=$confirmPassword=$city=$country="";
$mail_subscribe="";
$formerror="";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $firstName=$_REQUEST["firstname"];
    $lastName=$_REQUEST["lastname"];
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    $confirmPassword=$_REQUEST["confirmpassword"];
    $city=$_REQUEST["city"];
    $country=$_REQUEST["country"];
    if(isset($_POST['mail_subscribe']))
    {
        $mail_subscribe='1';
    }
    else
    {
        $mail_subscribe='0';
    }
    /**
     * variables store in user variable
     */
    if($firstName!='' && $lastName!='' && $email!='' && $password!=''&& $confirmPassword!=''&& $city!=''&& $country!=''&& $mail_subscribe!=''){
        $UM=new UserManager();
        $user=new User();
        
        $user->firstName=$firstName;
        $user->lastName=$lastName;
        $user->email=$email;
        $user->password=$password;
        $user->confirmPassword=$confirmPassword;
        $user->city=$city;
        $user->country=$country;
        $user->mail_subscribe=$mail_subscribe;
        echo "Test:--".$mail_subscribe;
        $existuser=$UM->getUserByEmail($email);
        var_dump($user);
        if(!isset($existuser)){
            //var_dump($user);
            // Save the Data to Database
            /**
             * variables stored in session
             */
            
            $_SESSION['firstname'] = "$firstName";
                
            $_SESSION['lastname'] = "$lastName";
               
            $_SESSION['email']="$email";
                
            
            $_SESSION['password'] ="$password";
                
            
             $_SESSION['confirmpassword']  = "$confirmPassword";
            
             $_SESSION['city'] = "$city";
            
            
             $_SESSION['country'] = "$country";
             $_SESSION['mail_subscribe'] = "$mail_subscribe";
                
            
            header("Location:Registrationconfirm.php");
        }
        else{
            $formerror="User Already Exist";
        }
    }else{
        $formerror="Please fill in the fields";
    }
    
}


    
?>


<!DOCTYPE HTML>  
<html>
<head>

<style>
.error {color: #FF0000;}
body {
   background-color: snow;
    text-align: center;
	
    
	
    padding:5px;
   
    
	background-image:url("/Phpmailer/public/images/registration.png");
	background-position: 10% 10%;
    background-size:1300px 300px;
	background-repeat: no-repeat;
    
  
    
	background-repeat: no-repeat;
    
  }

</style>
</head>
<body><br><br>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<!--Start of Form-->
<form name='Registration' onsubmit='return validateForm()' method='post'>
<form method='post' action="Registration.php">	

<h2>sign up to join in the community portal.simply enter your details </h2>
<h1>Registration Form</h1>
<div><?=$formerror?></div>	
<!--firstName --> 
<label for= "firstname" >FIRSTNAME</label>
<input type="text" name="firstname" value="<?=$firstName?>" size="50"></br></br>
 <p id="err_firstname" style="color:red;"></p> </br>					
<!--firstName -->

<!--lastName -->   
<label for= "lastname">LASTNAME</label>	
<input type="text" name="lastname" value="<?=$lastName?>"  size="50"></br></br>
<p id="err_lastname" style="color:red;"></p> </br>	
<!--lastName -->
 
<!--city -->
<label for= "city">CITY</label>			
<input type="text" name="city" value="<?=$city?>"  size="50"> </br></br>
<p id="err_city" style="color:red;"></p> </br>		
<!--city -->

<!--country -->
<label for= "country">COUNTRY</label>			
<input type="text" name="country" value="<?=$country?>"  size="50"> </br></br>
<p id="err_country" style="color:red;"></p> </br>  	
<!--country -->

<!--email -->
<label for= "email">EMAIL ID</label>		
<input type="text" name="email" value="<?=$email?>"  size="50"></br></br>
<p id="err_email" style="color:red;"></p> </br>			
 <!--email -->
 
<!--password -->
<label for= "password">PASSWORD</label>
<input type="password" name="password" value="<?=$password?>" size="50"></br></br>
<p id="err_password" style="color:red;"></p> </br>	
<!--password -->
		
<!--confirmpassword -->
<label for= "password">CONFIRMPASSWORD</label>			
<input type="password" name="confirmpassword" value="<?=$confirmPassword?>"  size="50"></br></br>
<p id="err_confirmpassword" style="color:red;"></p> </br>	
<!--confirmpassword -->	
<input type="checkbox" name="mail_subscribe"  value="<?=$mail_subscribe?>" style="align:center"; >
<label for= "mail_subscribe">subscription for email</label><br></br>	
<input type="hidden" name="submitted" value="1"><input type="submit" name="submit" value="Submit">
<input type="reset" name="clear" value="clear Search" onclick="javascript:clearForm();"></br>	</br>	


 <a href="../../login.php"> LOGIN</a>
</form>			



</div></br>	</br>	</br>	

<!--End of Form-->
</body>
</html>
<?php 
include('../../includes/footer.php');

?>