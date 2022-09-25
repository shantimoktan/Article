<?php
session_start();
include './config/index.php';
include './head/index.php';

if ($_GET['type'] == 'onlyAdmin') {
    echo "<script>alert('Only Admin can access this page.')</script>";
}
?>
<img src="" />
<main class="wrapper">
    <section class="hero">
        <h1><?php echo $_GET['categoryName'] ?></h1>
        </article>
    </section>
    <section class="articles">
        <ul>
            <?php
            $id = $_GET['id'];
            // select specifics article by category Id
            $selectArticlQuery = "SELECT * FROM article WHERE categoryId='$id'";
            $result = $conn->query($selectArticlQuery);
            while ($row = $result->fetch_assoc()) {
            ?>
                <li>
                    <figure>
                        <!-- Photo by Quentin Dr on Unsplash -->
                        <img src="./images/banners/3.jpg" alt="Several hands holding beer glasses">
                        <figcaption>
                            <h3><?php echo $row['title']; ?></h3>
                        </figcaption>
                    </figure>
                    <p class="content_card">
                        <?php echo $row['content']; ?>
                    </p>
                    <a class="articleLink" href="fullarticle.php?id=<?php echo $row['id']; ?>">Read Article</a>
                </li>
            <?php
            }
            ?>

        </ul>
    </section>
</main>

<footer>
    &copy; Northampton News 2017
</footer>

</body>

</html>