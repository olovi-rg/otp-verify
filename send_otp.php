<?php
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;

$sid = 'ACe488e3599419b231862f19ad1b0becf9';
$token = '571253783914db11766530ac9769cbf6';
$twilio = new Client($sid, $token);

$phoneNumber = $_POST['phoneNumber'];

try {
    $verification = $twilio->verify->v2->services('VAfa5a8b9a226b978fcef7d235c5c4abc5')
                                      ->verifications
                                      ->create($phoneNumber, 'sms');

    echo "OTP sent successfully to $phoneNumber. Verification SID: " . $verification->sid;
} catch (Exception $e) {
    echo "Error sending OTP: " . $e->getMessage();
}
?>
