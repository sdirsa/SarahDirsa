<?php

  //new google recaptcha verify.
        $name;$email;$message;$captcha;
        if(isset($_POST['name'])){
          $visitor_email=$_POST['name'];
        }if(isset($_POST['email'])){
          $visitor_email=$_POST['email'];
        }if(isset($_POST['message'])){
          $message=$_POST['message'];
        }if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo 
            '<h3 style="font-family: sans-serif; text-align: center; color: #555; margin-top: 40px; margin-bottom: 20px;">Check the captcha verification box before sending.</h3>
            
			<div style="margin: 0 auto 40px auto; text-align: center;">
				<FORM>
					<INPUT TYPE="button" onClick="history.go(0)" VALUE="Refresh to try again" style="margin: 0 auto; text-align: center;">
				</FORM>
			</div>

            <a href="http://it.ojp.gov/default.aspx?area=privacy&page=1285"><p style="font-family: sans-serif; font-size: 12px; text-align: center; color: #555; margin-top: 30px;">U.S. Department of Justice, Electronic Communications Privacy Act of 1986 (ECPA)</p></a>';

          exit;
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LekEwETAAAAAM77grkqqv7WsiC23FxTprDsRVpL=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if($response.success==false)
        {
          echo 
            '<h3 style="font-family: sans-serif; font-style: bold; text-align: center; color: #555; margin-top: 40px; margin-bottom: 20px;">Captcha verification has failed.</h3>
            
			<div style="margin: 0 auto 40px auto; text-align: center;">
				<FORM>
					<INPUT TYPE="button" onClick="history.go(0)" VALUE="Refresh to try again" style="margin: 0 auto; text-align: center;">
				</FORM>
			</div>

            <a href="http://it.ojp.gov/default.aspx?area=privacy&page=1285"><p style="font-family: sans-serif; font-size: 12px; text-align: center; color: #555; margin-top: 30px;">U.S. Department of Justice, Electronic Communications Privacy Act of 1986 (ECPA)</p></a>';
        }else
        {
          echo '<h2 style="font-family: sans-serif; text-align: center; color: #555;"> Thank you for the message. </h2>';
        }
  //END new google recaptcha verify.

  //<h4 style="font-family: sans-serif; font-style: bold; text-align: center; color: #555; margin-top: 30px;">This window can be closed.</h4>

	// Your email address
	$email_to = 'sarahdirsa@gmail.com';

	// Your custom email subject
	$email_subject = 'A new message from sarahdirsa.com';

	// Send email (do not edit)
	if(isset($_POST['email'])) {

		$name = $_POST['name'];
		$email_from = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

		$email_message = 'Name: '.$name.'
';

		$email_message .= 'Email: '.$email_from.'
';

		$email_message .= 'Subject: '.$subject.'
';

		$email_message .= 'Message: '.$message;

		$headers = 'From: '.$email_from."\r\n".
		'Reply-To: '.$email_from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		@mail($email_to, $email_subject, $email_message, $headers);

		echo '<h6 style="font-family: sans-serif; text-align: center; color: #555; margin-top:20px; margin-bottom: 20px;"> Your message has been sent.<br />You can refresh the page or continue on using the site navigation.</h6>
				<div style="margin: 0 auto 40px auto; text-align: center;">
					<FORM>
						<INPUT TYPE="button" onClick="history.go(0)" VALUE="Refresh the page." style="margin: 0 auto; text-align: center;">
					</FORM>
				</div>';
	}

?>