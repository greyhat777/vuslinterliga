<?php
/**
 * @package Module Responsive Contact Form for Joomla! 2.5 & 3.0
 * @version 2.2: mod_responsive_contact_form.php February,2013
 * @author Joomla Drive Team
 * @copyright (C) 2013- Joomla Drive
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

defined('_JEXEC') or die;

require('modules/mod_responsive_contact_form/formkey_class.php');

// Start the class
$formKey = new formKey();
$error = False;
// Is request?

if($_SERVER['REQUEST_METHOD'] == 'post')
{
	// Validate the form key
	if(!isset($_POST['form_key']) || !$formKey->validate())
	{
		// Form key is invalid, show an error
		$error = True;
	}
}

if(isset($_POST['sbutton']))
{
	$captcha_req = $params->get('captcha_req');
	$private_key = $params->get('private_key');

	if( $captcha_req == 1 )
	{
		require_once('recaptchalib.php');
		$resp = recaptcha_check_answer ($private_key,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);

		if (!$resp->is_valid) {
			// What happens when the CAPTCHA was entered incorrectly
			echo "<script>javascript:Recaptcha.reload();</script>"; // reload captcha
			$error = "Sorry, the verification code wasn't entered correctly. Try again."; // kill program and return error message
		}
		else{
			if(isset($_POST['email']))
				$email 			= $_POST['email'];
			$name 			= $_POST['name'];
			if(isset($_POST['phone']))
				$phone 			= $_POST['phone'];
			if(isset($_POST['type']))
				$type 			= $_POST['type'];
			if(isset($_POST['message']))
				$message 		= $_POST['message'];
					
			if(isset($email))
			{
				include("EmailAddressValidator.php"); // external class to verify email address
				$validator = new EmailAddressValidator;
				// validate email address
			
				if (!($validator->check_email_address($email))) { // if function returns false
				if( $captcha_req == 1 )
				{
					echo "<script>javascript:Recaptcha.reload();</script>"; // reload captcha
				}
				exit("Please ensure you have entered a valid email address."); // exit program with error message
				} // otherwise carry on
			}
			
			$admin_email 	= $params->get('admin_email');
			$cc_email 		= $params->get('cc_email');
			$bcc_email 		= $params->get('bcc_email');
			$success_notify	= $params->get('success_notify');
			$failure_notify	= $params->get('failure_notify');
			$ffield_name	= $params->get('ffield_name');
			$sfield_name	= $params->get('sfield_name');
			$tfield_name	= $params->get('tfield_name');
			$fofield_name	= $params->get('fofield_name');
			$fifield_name	= $params->get('fifield_name');
					
			$formcontent = "\nFrom: $name";
			if(isset($email)){
				$formcontent .= "\n\n".$sfield_name.": $email";
			}
			if(isset($phone)){
				$formcontent .= "\n\n".$tfield_name.": $phone";
			}
			if(isset($type)){
				$formcontent .= "\n\n".$fofield_name.": $type";
			}
			if(isset($message)){
				$formcontent .= "\n\n".$fifield_name.": $message";
			}
			// message should get wordwrapped after 70 chracters? Words?
			$message = wordwrap($formcontent, 70, "\r\n");
			
			// Enter a subject, only you will see this so make it useful
			$subject = "$name";
			if(isset($type)){
				$subject .= " for $type";
			}
			if(isset($_POST['email']))
				$sender = array($email, $name);	
			else
				$sender = $name;
			$mail = JFactory::getMailer();
			$mail->setSender($sender);
			$mail->addRecipient($admin_email);
			if(isset($cc_email))
				$mail->addCC($cc_email);
			if(isset($bcc_email))
				$mail->addBCC($bcc_email);
			$mail->setSubject($subject);
			$mail->Encoding = 'base64';	
			$mail->setBody($message);
			$status = $mail->Send();
			if ( $status !== true ) {
				$error = $failure_notify.'<br/>Error: '.$status;
			} else {
				$error = $success_notify;
			}
		}
	}
	else
	{
		if(isset($_POST['email']))
			$email 			= $_POST['email'];
		$name 			= $_POST['name'];
		if(isset($_POST['phone']))
			$phone 			= $_POST['phone'];
		if(isset($_POST['type']))
			$type 			= $_POST['type'];
		if(isset($_POST['message']))
			$message 		= $_POST['message'];
						
		if(isset($email))
		{
			include("EmailAddressValidator.php"); // external class to verify email address
			$validator = new EmailAddressValidator;
			// validate email address
		
			if (!($validator->check_email_address($email))) { // if function returns false
			if( $captcha_req == 1 )
			{
				echo "<script>javascript:Recaptcha.reload();</script>"; // reload captcha
			}
			exit("Please ensure you have entered a valid email address."); // exit program with error message
			} // otherwise carry on
		}
				
		$admin_email 	= $params->get('admin_email');
		$cc_email 		= $params->get('cc_email');
		$bcc_email 		= $params->get('bcc_email');
		$success_notify	= $params->get('success_notify');
		$failure_notify	= $params->get('failure_notify');
		$ffield_name	= $params->get('ffield_name');
		$sfield_name	= $params->get('sfield_name');
		$tfield_name	= $params->get('tfield_name');
		$fofield_name	= $params->get('fofield_name');
		$fifield_name	= $params->get('fifield_name');
		
		
		// Build form content
		$formcontent = "\nFrom: $name";
		if(isset($email)){
			$formcontent .= "\n\n".$sfield_name.": $email";
		}
		if(isset($phone)){
			$formcontent .= "\n\n".$tfield_name.": $phone";
		}
		if(isset($type)){
			$formcontent .= "\n\n".$fofield_name.": $type";
		}
		if(isset($message)){
			$formcontent .= "\n\n".$fifield_name.": $message";
		}
		// message should get wordwrapped after 70 chracters? Words?
		$message = wordwrap($formcontent, 70, "\r\n");
		
		// Enter a subject, only you will see this so make it useful
		$subject = "$name";
		if(isset($type)){
			$subject .= " for $type";
		}
		if(isset($_POST['email']))
			$sender = array($email, $name);	
		else
			$sender = $name;
		$mail = JFactory::getMailer();
		$mail->setSender($sender);
		$mail->addRecipient($admin_email);
		if(isset($cc_email))
			$mail->addCC($cc_email);
		if(isset($bcc_email))
			$mail->addBCC($bcc_email);
		$mail->setSubject($subject);
		$mail->Encoding = 'base64';	
		$mail->setBody($message);
		$status = $mail->Send();
		if ( $status !== true ) {
			$error = $failure_notify.'<br/>Error: '.$status;
		} else {
			$error = $success_notify;
		}
	}
}
?>
	<link href="modules/mod_responsive_contact_form/css/bootstrap.min.css" rel="stylesheet">
	<link href="modules/mod_responsive_contact_form/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="modules/mod_responsive_contact_form/css/style.css" rel="stylesheet">
	<section id="contact" class="content">
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form-horizontal contact-form" id="contact-form">
		  <?php $formKey->outputKey(); ?>
		  <fieldset>
			<div id="formResponse"><?php if($error) { echo($error); } ?></div>
			  <div class="control-group">
				<label class="control-label" for="inputName"><?php echo $params->get('ffield_name'); ?></label>
				<div class="controls">
				  <input class="input-80 required" name="name" type="text" id="inputName" placeholder="Name">
				</div>
			  </div>
			  <?php if($params->get('email_publish')) {?>			  
			  <div class="control-group">
				<label class="control-label" for="inputEmail"><?php echo $params->get('sfield_name'); ?></label>
				<div class="controls">
				  <input class="input-80 <?php if($params->get('email_req')==1){ echo "required"; } ?>" name="email" type="text" id="inputEmail" placeholder="E-Mail">
				</div>
			  </div>
			  <?php }
					if($params->get('phone_publish'))
					{
			  ?>
			  <div class="control-group">
				<label class="control-label" for="inputPhone"><?php echo $params->get('tfield_name'); ?></label>
				<div class="controls">
				  <input class="input-80 <?php if($params->get('phone_req')==1){ echo "required"; } ?> " name="phone" type="text" id="inputPhone" placeholder="Phone">
				</div>
			  </div>
			  <?php
					}
					if($params->get('subject_publish'))
					{
			  ?>
			  <div class="control-group">
				<label class="control-label" for="selectSubject"><?php echo $params->get('fofield_name'); ?></label>
				<div class="controls">
					<?php if( $params->get('subject_type') == 1){ ?>
					<select class="input-80" id="selectSubject" name="type">
					  <option value="question">Question</option>
					  <option value="support">Comments</option>
					  <option value="misc">Other</option>
					</select>
					<?php
						}
						else
						{
					?>
							<input class="input-80 required" name="type" type="text" id="selectSubject" placeholder="Subject">
					<?php
						}
					?>
				</div>
			  </div>
			  <?php
					}
					if($params->get('message_publish'))
					{
			  ?>
			  <div class="control-group">
				<label class="control-label" for="inputMessage"><?php echo $params->get('fifield_name'); ?></label>
				<div class="controls">
				  <textarea class="input-80 required" name="message" rows="12" id="inputMessage" placeholder="Please include as much detail as possible."></textarea>
				</div>
			  </div>
			  <?php
					}
					if( $params->get('captcha_req')==1 )
					{
			  ?>
			  <div class="control-group">
				<label class="control-label" for="recaptcha">Are you human?</label>
				<div class="controls" id="recaptcha">
				    <p>
						<?php
						  require_once('modules/mod_responsive_contact_form/recaptchalib.php');
						  $publickey = $params->get('public_key'); // Add your own public key here
						  echo recaptcha_get_html($publickey);
						?>
					</p>
				</div>
			  </div> 
				
			  <?php
					}
					
					if($params->get('admin_email'))
					{
			  ?>
			  <div class="control-group">
				<div class="controls">
				  <button type="submit" name="sbutton" value="Send" class="btn"><?php echo $params->get('bs_name');?></button>
				</div>
			  </div>
			  <?php
					}
					else
					{
			  ?>
						<p style="font-type:bold">Please Enter Admin E-Mail address in the backend.</p>
			  <?php
					}
			  ?>
			</fieldset>
		</form>
	</section>
<!-- javascript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="modules/mod_responsive_contact_form/js/jquery.validate.min.js"></script>
<script>
	// contact form validation
	$(document).ready(function(){

	 $('#contact-form').validate(
		 {
		  rules: {
			name: {
			  minlength: 3,
			  required: true
			},
			email: {
			  required: <?php if($params->get('email_req')==1)
								echo "true";
                              else
								echo "false";
						?>,
			  email: true
			},
			phone: {
			  minlength: 10,
			  required: <?php if($params->get('phone_req')==1)
								echo "true";
                              else
								echo "false";
						?>,
			  number: true
			},
			subject: {
			  minlength: 3,
			  required: true
			},
			message: {
			  minlength: 20,
			  required: true
			}
		  },
		  highlight: function(label) {
			$(label).closest('.control-group').addClass('error');
		  },
		  success: function(label) {
			label
			  .text('OK!').addClass('valid')
			  .closest('.control-group').addClass('success');
		  }
		 });

		// contact form submission, clear fields, return message
		

	}); // end document.ready
</script>