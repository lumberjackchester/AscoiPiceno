<?php
  /**
   * Sets error header and json error message response.
   *
   * @param  String $messsage error message of response
   * @return void
   */
  function errorResponse ($messsage) {
    header('HTTP/1.1 500 Internal Server Error');
    die(json_encode(array('message' => $messsage)));
  }

  /**
   * Pulls posted values for all fields in $fields_req array.
   * If a required field does not have a value, an error response is given.
   */
  function constructMessageBody () {
    $fields_req =  array("name" => true, "email" => true, "message" => true);
    $message_body = "";
    foreach ($fields_req as $name => $required) {
      $postedValue = $_POST[$name];
      if ($required && empty($postedValue)) {
        errorResponse("$name is required.");
      } else {
        $message_body .= ucfirst($name) . ":  " . $postedValue . "\n";
      }
    }
    return $message_body;
  }

  header('Content-type: application/json');
  
  
    $access = date("Y/m/d H:i:s");
    error_log("Sending Captcha: $access value: ({$_SERVER['RECAPTCHA_SECRET_KEY']})");
  

  //do Captcha check, make sure the submitter is not a robot:)...
  $url = 'https://www.google.com/recaptcha/api/siteverify';
 $opts = array('http' =>
    array(
      'method'  => 'POST',
      'header'  => 'Content-type: application/x-www-form-urlencoded',
      'content' => http_build_query(array('secret' => $_SERVER['RECAPTCHA_SECRET_KEY'], 'response' => $_POST["g-recaptcha-response"]))
    )
  );
  
    $access = date("Y/m/d H:i:s");
    
    error_log("Sending Captcha: $access {$opts} ({$_SERVER['HTTP_USER_AGENT']})");
  $context  = stream_context_create($opts);
  $result = json_decode(file_get_contents($url, false, $context, -1, 40000));

  if (!$result->success) {

    $access = date("Y/m/d H:i:s");
  syslog(LOG_WARNING, "Captcha Failure: $access {$opts} ({$_SERVER['HTTP_USER_AGENT']})");
    errorResponse('reCAPTCHA checked failed!');
  }
  
 ////attempt to send email
  $headers = 'From: admin@picenowines.com' . "\r\n" .
    'Reply-To: lumberjackchester@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$messageBody = constructMessageBody();
syslog (LOG_DEBUG, $messageBody);
$mailed = mail($_SERVER['FEEDBACK_EMAIL'] , "Someone submitted thier contact info on PicenoWines.com.", $messageBody, $headers);
if($mailed){    
    header('HTTP/1.1 200 OK');
    echo "Email was sent!";

}else{
    echo "Email was not sent :(";
} 

?>
