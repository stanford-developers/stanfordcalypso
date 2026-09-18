<?php
 
require "twilio-php-master/Services/Twilio.php";

$AccountSid = getenv("TWILIO_ACCOUNT_SID");
$AuthToken  = getenv("TWILIO_AUTH_TOKEN");

$client = new Services_Twilio($AccountSid, $AuthToken);
//Lawrence's
$from_number = "310-846-8172";
$my_number = "970-779-1536";
//Calypso's
//$from_number = "+19704260379";
//$my_number = "+19707791536";
echo "<br/> Sending Message...";
$message = $client->account->messages->create(array(
    "From" => $from_number,
    "To" => $my_number,
    "Body" => "Sent via Twilio, yo!",
));
 
// Display a confirmation message on the screen
echo "<br/> Sent message {$message->sid}";
?>
