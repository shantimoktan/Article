<?php
session_start();
if ($_SESSION["isAdmin"] != 'TRUE') {
    header("Location: index.php?type=onlyAdmin");
}
include('./config/index.php');
include('./adminArea.php');
include('./config/utils.php');

// show alert according to $_GET types
if ($_GET['type'] === 'update') {
    echo "<script>alert('Article updated successfully');</script>";
} elseif ($_GET['type'] == 'deleteSuccess') {
    echo "<script>alert('Article deleted successfully');</script>";
} elseif ($_GET['type'] == 'deleteFail') {
    echo "<script>alert('Something went wrong when deleting article');</script>";
} elseif ($_GET['type'] == 'addArticle') {
    echo "<script>alert('Article Added successfully');</script>";
} elseif ($_GET['type'] == 'addArticleFail') {
    echo "<script>alert('Something went wrong when adding article');</script>";
}
?>
<header>
    <h2>Articles</h2>
    <hr>
    <br>
</header>
<div class="add_admin_container">
    <a href="addArticle.php?active=article"><button class="action_btn add_btn">Add Articles</button></a>
</div>
<table>
    <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Article</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    <?php
    if (!empty($_SESSION["ID"])) {
        // prepare select article query
        $selectArticlQuery = "SELECT * FROM article";
        $result = $conn->query($selectArticlQuery);
        $sn = 0;
        // show articles in lopped table
        while ($row = $result->fetch_assoc()) {
    ?>
            <tr>
                <td><?php echo ++$sn; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td style="width:300px">
                    <p class="td_content"><?php echo $row['content']; ?></p>
                </td>
                <td><?php echo getCategorybyId($row['categoryId'], $conn); ?></td>
                <td style="text-align:center;">
                    <a href="editArticle.php?active=article&id=<?php echo $row['id']; ?>"><button class="action_btn edit_btn">Edit</button></a>
                    <a href="deleteAdmin.php?id=<?php echo $row['id']; ?>"><button class="action_btn delete_btn">Delete</button></a>
                </td>
            </tr>
    <?php
        }
    } else {
        header("Location: index.php?type=loginAgain");
    }
    ?>
</table>
</div>
</div>
</body>

</html>