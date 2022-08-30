<?php
include "../app/config.php";
include "../app/helper.php";
$id = $_GET['id'] ?? null;
if (is_null($id)) {
    // page will be used for insert
    $mode = "Add";
} else {
    // page will be used for update
    $selNews = "SELECT * FROM countries WHERE id =$id";
    $exeNews = mysqli_query($conn, $selNews);
    $fetchNews = mysqli_fetch_assoc($exeNews);
    $title = $fetchNews['title'];
    $desc = $fetchNews['description'];
    $mode = "Update";
}
$msg = "";
if (isset($_POST['save'])) {
    // p($_POST);
    $name = $_POST['name'];
    if ($name != "") {
        // server side validation
        if (is_null($id)) {
            $qry = "INSERT INTO countries SET name = '$name'";
        } else {
            $qry = "UPDATE countries SET name = '$name' WHERE id=$id";
        }

        try {
            $flag = mysqli_query($conn, $qry); // true - false
        } catch (Exception $err) {
            $flag = false;
            // p($err->getMessage());            
        }
        if ($flag == true) {
            header("LOCATION:view-country.php");
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
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $mode ?> Country</h6>
        </div>
        <div class="card-body">
            <h4 class="text-center text-danger">
                <?php echo $msg ?>
            </h4>
            <form method="post">
                <div class="row">
                    <div class="col-12">
                        <label for="" class="form-lable">Name</label>
                        <input type="text" required name="name" class="form-control" value="<?php echo $name ?? '' ?>">
                    </div>
                    <div class="col-12 mt-2">
                        <button class="btn btn-primary" type="submit" name="save" value="clicked">
                            <?php echo $mode ?>
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
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('news_desc');
</script>