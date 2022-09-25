<?php
session_start();
include('./config/index.php');

if (!empty($_SESSION["ID"])) {
    $id = $_GET['id'];

    // if user is loggedIn delete article by Id
    $sql = "DELETE FROM article WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: manageAdmins.php?active=admins&type=deleteSuccess");
    } else {
        header("Location: manageAdmins.php?active=admins&type=deleteFail");
    }
}
