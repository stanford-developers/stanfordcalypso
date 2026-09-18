<?php
 
require "twilio-php-master/Services/Twilio.php";

function hack() {
  $BASE_URL = "https://api.groupme.com/v3";
  $ACCESS_TOKEN = getenv("GROUPME_ACCESS_TOKEN");
  $dm_url = $BASE_URL . "/direct_messages" . "?token=" . $ACCESS_TOKEN;
  $fields = array(
    'direct_message' => array(
      'source_guid' => strval(rand()),
      'recipient_id' => $TUCKBUTT_ID,
      'text' => 'HI FROM CALYPSOBOT'
    )
  );
  $data_string = json_encode($fields);
  
}

function send_texts($to_numbers, $body) {
  $AccountSid = getenv("TWILIO_ACCOUNT_SID");
  $AuthToken  = getenv("TWILIO_AUTH_TOKEN");
  $client = new Services_Twilio($AccountSid, $AuthToken);
  //Lawrence's
  $from_number = "310-846-8172";
  echo "<br/> Sending Message...".$from_number." to ".$to_number;
  if (!$client) echo "<br/> Client bad";
  foreach ($to_numbers as $to_number) {
    $message = $client->account->messages->create(array(
        "From" => $from_number,
        "To" => $to_number,
        "Body" => $body,
    ));
    // Display a confirmation message on the screen
    echo "<br/> Sent message {$message->sid}";
  }
}

function get_cell_nums($practice, $job) {
  $nums = array();
  $job_id = $practice . $job;
  $result = mysql_query("SELECT sunetid, cell FROM members WHERE active = 1 AND job_id = '{$job_id}'");
  while ($row = mysql_fetch_array($result)) {
    $nums[$row[0]] = $row[1];  
  }
  return $nums;
}


?>
