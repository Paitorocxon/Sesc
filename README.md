# SeSc Update [Σxponentia] ☢
Yes! the update has come! <br />
"But Pait, what is so special and new in this update?" <br>
Good question, Pait! for example the main.login.php! This little module works with SQL now.<br>
for a good an easy start i've also uploadet a file with all command concerning the sql setup.<br>

[+] SQL-Userlogin module with very small persmissionsystem<br />
[+] New Design. Everything is better than the old stylesheet.css<br />
[+] Brand new editor. You can switch between HTML and Normal
<br />
<br />

## Installation
Download sesc:<br />
```git clone git@github.com:Paitorocxon/Sesc.git```
<br />
Open '/sesclib/settings.php' and put your password and user in.<br />
Head to '/sesclib/modules/main.login.php' and change on line 52 
$pdo = new PDO('mysql:host=localhost;dbname=THE_DATABASE_NAME_IF_IT_HAS_A_DIFFERENT_NAME', $GLOBALS['DB_USERNAME'], $GLOBALS['DB_PASSWORD']);.<br />
<br />
