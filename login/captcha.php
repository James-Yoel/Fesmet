<?php
session_start();
function acakCaptcha() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
   
    $pass = array(); 
 
    $panjangAlpha = strlen($alphabet) - 2; 
    for ($i = 0; $i < 5; $i++) {
        $n = rand(0, $panjangAlpha);
        $pass[] = $alphabet[$n];
    }
 
    return implode($pass); 
}
 
$code = acakCaptcha();
$_SESSION["code"] = $code;
 
$wh = imagecreatetruecolor(173, 50);
 
$bgc = imagecolorallocate($wh, 127, 127, 127);
 
$fc = imagecolorallocate($wh, 0, 0, 0);
imagefill($wh, 0, 0, $bgc);
 
imagestring($wh, 10, 50, 15,  $code, $fc);
 
header('content-type: image/jpg');
imagejpeg($wh);
imagedestroy($wh);
?>