<?php
include "../app/config.php";
include "../app/helper.php";
$msg = "";
if (isset($_POST['save'])) {
    // p($_POST);
    $title = $_POST['news_title'];
    $desc  = $_POST['news_desc'];
    if ($title != "" && $desc != "") {
        // server side validation
        $qry = "INSERT INTO news SET title = '$title', description = '$desc'";
        try {
            $flag = mysqli_query($conn, $qry); // true - false
        } catch (Exception $err) {
            $flag = false;
        }
        if ($flag == true) {
            header("LOCATION:view-news.php");
        } else {
            $msg = "Unable to insert data, internal server error";
        }
    } else {
        echo "Error!!";
    }
}

include "common/header.php";
?>
<!-- Content Wrapper -->


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add News</h6>
        </div>
        <div class="card-body">
            <h4 class="text-center text-danger">
                <?php echo $msg ?>
            </h4>
            <form method="post">
                <div class="row">
                    <div class="col-12">
                        <label for="" class="form-lable">Title</label>
                        <input type="text" required name="news_title" class="form-control" value="<?php echo $title ?? '' ?>">
                    </div>
                    <div class="col-12 mt-2">
                        <label for="" class="form-lable">Description</label>
                        <textarea name="news_desc" required id="editor" class="form-control" cols="30" rows="10"><?php echo $desc ?? '' ?></textarea>
                    </div>
                    <div class="col-12 mt-2">
                        <button class="btn btn-primary" type="submit" name="save" value="clicked">
                            Add
                        </button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- End of Main Content -->
<?php include "common/footer.php"; ?>