<?php

global $pdo;
$pdo = new \PDO(
    'mysql:host=localhost:3306;dbname=test',
    "root",
    "FROST_01"
);
$res = $pdo->query('select * from users;');

$users = [];

while($user = $res->fetch()){
    $users[] = $user;
}

function getUser($id){

    global $pdo;
    $res = $pdo->query('select * from users where `id` = '.$id.';');

    return $res->fetch();
}
function saveUser($name,$date, $email,$number){
    global $pdo;

    $sqlString = "INSERT INTO users (ФИО, дата рождения, e-mail, номер телефона) VALUES ('$name','$date','$email','$number')";

    return $pdo->exec($sqlString);
}


function deleteUser($id){
    global $pdo;

    $sqlString = "DELETE FROM users WHERE id = '$id'";

    return $pdo->exec($sqlString);
}