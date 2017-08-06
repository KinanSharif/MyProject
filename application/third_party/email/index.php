<?php 

function sendemail($array)
{
	require_once('PHPMailer/class.phpmailer.php');
			
	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	//$mail->Username = 'sheikhabdulrehman8@gmail.com';                 // SMTP username
	//$mail->Password = '03464357146007';                           // SMTP password
	$mail->Username = 'sheikhabdulrehman8@gmail.com';                 // SMTP username
	$mail->Password = '03464357146007';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->From = $mail->Username;
	$mail->FromName = $array['FromName'];
	//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
	$mail->addAddress($array['addAddress']);               // Name is optional

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $array['Subject'];
	$mail->Body    = $array['Body'];
	$mail->AltBody = $array['AltBody'];
	$respond = "";
	if(!$mail->send()) {
		$respond = $mail->ErrorInfo;
	} else {
		
		$respond = "Message has been sent";
	}
	return $respond; 
}

?>