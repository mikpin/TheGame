<?php

//create_hash($password) and validate_password($password,$hash)
require "libs/PasswordHash.php";
require "libs/myDB.php";

function create_user(){
	$bytes = openssl_random_pseudo_bytes(32, $cstrong);
    $user   = bin2hex($bytes);
    $bytes = openssl_random_pseudo_bytes(32, $cstrong);
    $password   = bin2hex($bytes);
    $userhash=array('user'=>$user,'password'=>create_hash($password));
    $db->users->insert($userhash);
    echo (json_encode($userhash));
}

create_user();