<?php
session_start();
if ($_SESSION["isAdmin"] != 'TRUE') {
    header("Location: index.php?type=onlyAdmin");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>
    <div class="admin_container">
        <nav class="side_nav">
            <ul>
                <li class="has-subnav">
                    <a class="<?php echo $_GET['active'] == 'article' ? 'active_nav' : '' ?>" href="adminArticles.php?active=article">
                        <i class="fa fa-file fa-icon"></i>
                        <span class="nav-text">
                            Articles
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a class="<?php echo $_GET['active'] == 'category' ? 'active_nav' : '' ?>" href="adminCategories.php?active=category">
                        <i class="fa fa-list-alt fa-icon"></i>
                        <span class="nav-text">
                            Categories
                        </span>
                    </a>

                </li>
                <li>
                    <a class="<?php echo $_GET['active'] == 'admins' ? 'active_nav' : '' ?>" href="manageAdmins.php?active=admins">
                        <i class="fa fa-users fa-icon"></i>
                        <span class="nav-text">
                            Manage Admin
                        </span>
                    </a>

                </li>
            </ul>

            <ul class="logout">
                <li>
                    <a href="index.php">
                        <i class="fa fa-home fa-icon"></i>
                        <span class="nav-text">
                            Home
                        </span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fa fa-power-off fa-icon"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="main_admin_area">