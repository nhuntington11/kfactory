<?php

function sanitize($conn, $string) {
	return htmlentities(mysql_fix_string($conn, $string));
}

function mysql_fix_string($conn, $string) {
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}

?>