<?php

/* Connect on 'localhost' for database 'site_db'
 1. Start by creating a variable $link.
 2. The msqli_connect() function in PHP is usd to connect you to the database.
 3. localhost is a hostname that refers to the current computer used to access it.
 4. root is the server username, usbw is the password and the site_db is the database name.
*/
$link = mysqli_connect('localhost','******','*****','*******');

#5. If username, password and database are correct, 'connection ok' will be displayed on screen.

if (!$link) {
#6. Otherwise fail gracefully and explain the error.
	die('Could not connect to MySQL: ' .mysqli_error());
}

# echo 'Connection ok';	after checking it works, we don't need this anymore

