<?php
require_once('database.info.php');

class Database extends Model {
	function getHash($username, $password){
		$salt = APPLICATION_SALT;
		$secret = APPLICATION_SALT . "<+r+>" . strrev(APPLICATION_SALT);
		$password = $username . $password . $salt;
        return hash_hmac("whirlpool", hash_hmac("sha512", $password, $secret) . $salt,  $secret);
	}

}
?>


			