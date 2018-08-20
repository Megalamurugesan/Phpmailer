<?php
ob_start();
include'../../includes/header.php';
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
	padding: 10px;
	
	background-position: 5% 5%;
    background-size: 1300px 300px;	
	background-repeat: no-repeat;
    
  }
  lable {
    color:yellow;
}
  

</style>
</head>
<body>
<br />
<h1>Thank You for Registration</h1>
<p>
<!--email -->
	
You are successfully Registered IN ABC COMMUNITY PORTAL with
EMAIL ID: <label for= "email"color:yellow; ><?php echo $_SESSION['email'];?></label>  <br></p>
<p id:x>use this email to login with community portal</br>  
</p>
Continue with <a href="../../login.php">login</a></br></br></br></br></br</br></br></br></br></br></br></br></br></br></br></br></br></br>
</body>  
<?php 
include('../../includes/footer.php');

?>
</html>
