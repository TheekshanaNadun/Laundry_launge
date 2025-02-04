<?php
if(empty($_POST['bill'])) {
  http_response_code(500);
  exit();
}

$bill = strip_tags(htmlspecialchars($_POST['bill']));


$to = "info@example.com"; // Change this email to your //
	

if(!mail($to))
  http_response_code(500);
?>
