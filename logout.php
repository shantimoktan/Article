<?php
// clear sessions
session_start();
unset($_SESSION["ID"]);
unset($_SESSION["isAdmin"]);
unset($_SESSION["name"]);
header("Location:index.php");
