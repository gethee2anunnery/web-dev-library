<?php

$fromName = $_GET['from_name'];
$fromEmail = $_GET['from_email'];
$toEmail = $_GET['to_email'];
$subject = $_GET['subject'];
$body = $_GET['body'];
$phpVersion = phpversion();

$redirectUrl = $_GET['redirect_to'];
if (empty($redirectUrl)) {
	$redirectUrl = "index.php";
}

$headers = <<<END
From: {$fromName} <{$fromEmail}>
Reply-To: {$fromEmail}
X-Mailer: PHP/{$phpVersion}

END;

mail($toEmail, $subject, $body, $headers);

header("Location: {$redirectUrl}?sent=true");







?>