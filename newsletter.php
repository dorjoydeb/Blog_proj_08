<?php



if(!$_POST) exit;



function tommus_email_validate($email) { return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email); }


$email = $_POST['email'];



if(trim($email) == '') {

	exit('<div class="error_message">Please enter email address.</div>');

} else if(trim($email) == 'Email') {

	exit('<div class="error_message">Please enter email address.</div>');

} else if(!tommus_email_validate($email)) {

	exit('<div class="error_message">You have entered an invalid e-mail address.</div>');

} 



$address = 'hello@email.com';



$e_subject = 'You\'ve got a new subscriber.';

$e_body = "You have a new subscriber to your Newsletter. The subscriber's email is as follows." . "\r\n" . "\r\n";

$e_content = "\"$email\"" . "\r\n" . "\r\n";



$msg = wordwrap( $e_body . $e_content, 70 );



$headers = "From: Newsletter Form" . "\r\n";

$headers .= "Reply-To: $email" . "\r\n";

$headers .= "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type: text/plain; charset=utf-8" . "\r\n";

$headers .= "Content-Transfer-Encoding: quoted-printable" . "\r\n";



if(mail($address, $e_subject, $msg, $headers)) { echo "<fieldset><div id='success_page'><p>Your subscription was successful.</p></div></fieldset>"; }