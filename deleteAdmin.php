<?php
session_start();
include('./config/index.php');

// if user is loggedIn 
if (!empty($_SESSION["ID"])) {
    $id = $_GET['id'];
    // if user is loggedIn delete by Id
    $sql = "DELETE FROM users WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: manageAdmins.php?active=admins&type=deleteSuccess");
    } else {
        header("Location: manageAdmins.php?active=admins&type=deleteFail");
    }
}
