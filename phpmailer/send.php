<?php
require ("src/Exception.php");
require "src/PHPMailer.php";
require "src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if(isset ($_POST["send"])){
echo $_POST["message"],$_POST["subject"],$_POST["email"];

$mail = new PHPMailer(true);

$mail->IsSMTP();
$mail->Host = 'smtp-gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'kgyau43@gmail.com';
$mail->Password = 'xkzsmmovtiwfnket';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('kgyau43@gmail.com'); // Your gmail
$mail->addAddress($_POST["email"]);
$mail->isHTML(true);
$mail->Subject = $_POST["subject"];
$mail->Body = $_POST["message"];
$mail->send();


}

?>