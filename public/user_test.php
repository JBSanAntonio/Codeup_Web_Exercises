<?php

require_once 'UserModel.php';

$user = User::all();

var_dump($user);

$newUser = new User();
$newUser->name = 'Fictional';
$newUser->email = 'fict@gmail.com';
$newUser->age = '15';

$newUser->save();

var_dump($newUser);

?>