<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/style/main.css"); ?>" />
	<style type="text/css">

	</style>
</head>
<body>
<?php
if (isset($this->session->userdata['logged_in'])) {
	
	header("location: index.php/user_authentication/user_login_process");
}
?>
<?php
if (isset($logout_message)) {
	
	echo "<p class=\"bg-primary text-center\" style=\"padding-top:10px;padding-bottom:10px;\">";
		echo $logout_message;
	echo "</p>";
	
	
}
?>
<?php
if (isset($message_display)) {
	
	echo "<p class=\"bg-primary text-center\" style=\"padding-top:10px;padding-bottom:10px;\">";
		echo $message_display;
	echo "</p>";
	
	
}
?>



<div class="container">
<?php $this->load->helper('form');?>
	
	<?php
		
		
		if (isset($error_message)) {
			echo "<p class=\"bg-danger text-center\" style=\"padding-top:10px;padding-bottom:10px;\">";
			echo $error_message;
			echo "</p>";
		}
	echo validation_errors();
	

?>
        <div class="card card-container">
          <p id="profile-name" class="profile-name-card" ></p>
           <?php 
           $attributes = array('class' => 'form-signin');
			echo form_open('user_authentication/user_login_process',$attributes); ?>
                <span id="reauth-email" class="reauth-email"></span>
                <input  type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" value="Login" name="submit">Login</button>
           <?php form_close(); ?>
            
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>