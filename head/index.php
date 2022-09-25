<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.css" />
    <title>Northampton News - Home</title>
</head>

<body>
    <header>
        <section>
            <h1>Northampton News</h1>
        </section>
    </header>
    <nav>
        <ul class="navs">
            <?php
            // check if user is logged in or not & and so option according
            if (!empty($ID = $_SESSION["ID"])) {
            ?>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="manageAdmins.php">Admin Area</a></li>
            <?php
            } else {
            ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php
            }
            ?>
            <li><a href="#">Select Category</a>
                <ul>
                    <?php
                    // select categories and show on ul
                    $selectCategoryQuery = "SELECT * FROM category";
                    $result = $conn->query($selectCategoryQuery);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <li value="<?php echo $row['id']; ?>"> <a class="articleLink" href="/articles.php?categoryName=<?php echo $row['name']; ?>&id=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a></li>

                    <?php
                    }
                    ?>
                </ul>
            </li>
        </ul>
    </nav>