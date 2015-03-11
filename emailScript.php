<?php
/**
 * Helping Pilot
 * a script to send an image vi email
 * 
 * @author koketso mabuela
 */


$to = 'koketso@debugsolutions.co.za,glenton92@gmail.com'; // replace my email destinations with yours 
$subject = 'a file for you';
$fileName = "20150301_130259.jpg";//replace my image with your path
$message = "Hi,".PHP_EOL." Please find attached image".PHP_EOL." Thanks"; //you can change the email body also
$attachment = chunk_split(base64_encode(file_get_contents($fileName)));
$filename = $fileName;

$boundary =md5(date('r', time())); 

$headers = "From: noreply@debugsolutions.co.za\r\nReply-To: noreply@debugsolutions.co.za"; //you can alter the headers, I assume you're going to need to 
$headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"_1_$boundary\"";

$message="This is a multi-part message in MIME format.

--_1_$boundary
Content-Type: multipart/alternative; boundary=\"_2_$boundary\"

--_2_$boundary
Content-Type: text/plain; charset=\"iso-8859-1\"
Content-Transfer-Encoding: 7bit

$message

--_2_$boundary--
--_1_$boundary
Content-Type: application/octet-stream; name=\"$filename\" 
Content-Transfer-Encoding: base64 
Content-Disposition: attachment 

$attachment
--_1_$boundary--";

mail($to, $subject, $message, $headers);


//************************************************************************* end of file ********************************************************************************************
?>
