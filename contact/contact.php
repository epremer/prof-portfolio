<?php
if($_POST)
{
require('constant.php');
    
    $user_name      = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $user_email     = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	$content   = filter_var($_POST["content"], FILTER_SANITIZE_STRING);
    
    if(empty($user_name)) {
		$empty[] = "<b>Name</b>";		
	}
	if(empty($user_email)) {
		$empty[] = "<b>Email</b>";
	}
	if(empty($content)) {
		$empty[] = "<b>Comments</b>";
	}

	if(!empty($empty)) {
		$output = json_encode(array('type'=>'error', 'text' => implode(", ",$empty) . ' Required!'));
        die($output);
	}
	
	if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){ //email validation
	    $output = json_encode(array('type'=>'error', 'text' => '<b>'.$user_email.'</b> is an invalid Email, please correct it.'));
		die($output);
	}


	
	//reCAPTCHA validation
	if (isset($_POST['g-recaptcha-response'])) {
		
		require('component/recaptcha/src/autoload.php');		
		
		$recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY, new \ReCaptcha\RequestMethod\SocketPost());

		$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

		  if (!$resp->isSuccess()) {
				$output = json_encode(array('type'=>'error', 'text' => '<b>Captcha</b> Validation Required!'));
				die($output);				
		  }	
	}
	// EMAIL TO BE CONTACTED //
	$toEmail = "elizabethpremer@gmail.com";  // change this email to wherever you want messages to be sent
	$mailHeaders = "From: " . $user_name . "<" . $user_email . ">\r\n";
	$mailBody = "User Name: " . $user_name . "\n";
	$mailBody .= "User Email: " . $user_email . "\n";
	$mailBody .= "Content: " . $content . "\n";
	

	if (mail($toEmail, "Contact Mail", $mailBody, $mailHeaders)) {
	    $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_name .', thank you for contacting me. Please allow 24-48 hours for a response, although it usually takes me less than that.'));
	    die($output);
	} else {
	    $output = json_encode(array('type'=>'error', 'text' => 'Unable to send email, please contact'.SENDER_EMAIL));
	    die($output);
	}
}
?>