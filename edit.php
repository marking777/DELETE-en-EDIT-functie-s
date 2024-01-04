<?php
include 'db.php';

try {
    $db = new Database();
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
         $db->updateUser($_POST['email'], $hash,$_GET['id']);
         header("Location:home2.php");
     }
 } catch (Exception $e) {
     echo "Error: " . $e->getMessage();
   }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>

<body>
    <form method="POST">
        <h2>Edit User</h2>
        <input type="text" name="email" placeholder="New email">
        <input type="password" name="password" placeholder="New password">
        <input type="submit">
    </form>
