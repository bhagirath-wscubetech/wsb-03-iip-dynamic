<?php
include "app/config.php";
include "app/helper.php";
$id = $_GET['id'] ?? null;
if (is_null($id)) {
    header("LOCATION:404.php");
} else {
    // page will be used for update
    $selNews = "SELECT * FROM news WHERE id =$id";
    $exeNews = mysqli_query($conn, $selNews);
    if (mysqli_num_rows($exeNews) > 0) {
        $fetchNews = mysqli_fetch_assoc($exeNews);
        $title = $fetchNews['title'];
        $desc = $fetchNews['description'];
    } else {
        header("LOCATION:404.php");
    }
}
include "common/header.php";
?>
<!-- right part of the middle portion starts here -->
<div class="middle-right">
    <div class="page-status">
        <h1><?php echo $title ?></h1>
        <h2><i onclick='window.location.href = "index.php" '> Home /</i> Read News:</h2>
    </div>
    <div class="about-content">
        <?php echo $desc ?>
    </div>
</div>
<!-- right part of the middle portion starts here -->
<div class="clear"></div>
</div>
<!-- middle portion with  links, new , banner and course ends here -->

<?php
include "common/footer.php";
?>
