<?php
session_start();
include('./config/index.php');

if (!empty($_SESSION["ID"])) {
    $id = $_GET['id'];
    // if user is loggedIn delete category by Id
    $sql = "DELETE FROM category WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: adminCategories.php?active=admins&type=deleteSuccess");
    } else {
        header("Location: adminCategories.php?active=admins&type=deleteFail");
    }
}
