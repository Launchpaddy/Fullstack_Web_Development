<?php
// we are going to be using sessions
session_start();


// dbconnect gets us access to our database
require('dbConnect.php');
$db = get_db();

// getting info from form and doing some sanitizing and adding data to our session.
$username = htmlspecialchars($_POST['username']);
$_SESSION['username'] = $username;


$password = htmlspecialchars($_POST['password']);
$_SESSION['password'] = $password;

// This is how we hash our password so we don't have
// any of our users actual passwords on our server
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$displayName = htmlspecialchars($_POST['displayName']);
$_SESSION['displayName'] = $displayName;


// Ideally we don't want to set our session until we have checked this
// but I'm not so sure php wont just do it anyways no mater what the order of
// our code is. ether way we can reset the session correctly later.
if (!isset($username) || $username == "" || !isset($password) || $password == "")
{
   header("Location: login.php");
   die(); // we always include a die after redirects.
}


// How we insert into our user table
$query = "INSERT INTO users(username, password, display_name)
VALUES (:username, :password, :displayName);";


// prepare the statement
$stmt = $db->prepare($query);

// be do some more checking to make sure nobody has put
// icky things in our query
$stmt->bindValue(":username",    $username, PDO::PARAM_STR);
$stmt->bindValue(":password",    $hashedPassword, PDO::PARAM_STR);
$stmt->bindValue(":displayName", $displayName, PDO::PARAM_STR);

// run everything
$stmt->execute();

// Redirect to the login page
header('location:login.php');
die();

?>
