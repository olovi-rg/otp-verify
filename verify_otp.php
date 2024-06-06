<?php
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;

$sid = 'ACe488e3599419b231862f19ad1b0becf9';
$token = '571253783914db11766530ac9769cbf6';
$twilio = new Client($sid, $token);

$phoneNumber = $_POST['phoneNumber'];
$otp = $_POST['otp'];

try {
    $verification_check = $twilio->verify->v2->services('VAfa5a8b9a226b978fcef7d235c5c4abc5')
                                             ->verificationChecks
                                             ->create([
                                                 'to' => $phoneNumber,
                                                 'code' => $otp
                                             ]);

    if ($verification_check->status == 'approved') {
        echo "OTP verified successfully.";
    } else {
        echo "OTP verification failed.";
    }
} catch (Exception $e) {
    echo "Error verifying OTP: " . $e->getMessage();
}
?>
