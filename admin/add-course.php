<?php
include "../app/config.php";
include "../app/helper.php";
$id = $_GET['id'] ?? null;
if (is_null($id)) {
    // page will be used for insert
    $mode = "Add";
} else {
    // page will be used for update
    $sel = "SELECT * FROM courses WHERE id =$id";
    $exe = mysqli_query($conn, $sel);
    $fetch = mysqli_fetch_assoc($exe);
    $name = $fetch['name'];
    $desc = $fetch['description'];
    $mode = "Update";
}
$msg = "";
if (isset($_POST['save'])) {
    $imagArr = $_FILES['image'];
    // p($imagArr);
    // die;
    if ($imagArr['name'] != "") {
        $imageName = rand() . time() . $imagArr['name']; // the name of that image
        $destination = "../gallery_img/" . $imageName;
        $imgFlag = move_uploaded_file($imagArr['tmp_name'], $destination);
    } else {
        if (isset($id)) {
            // update 
            $imageName = $_POST['old_image'];
            // p($imageName);
            // die;
        }
    }
    $name = $_POST['name'];
    $description  = $_POST['description'];
    $color = $_POST['color'];
    $original_fees  = $_POST['original_fees'];
    $discounted_fees  = $_POST['discounted_fees'] ?? 0;
    if ($name != "" && $description != "" && $color != "") {
        // server side validation
        if (is_null($id)) {
            $qry = "INSERT INTO courses SET 
                name = '$name', 
                description = '$description',
                fees = $original_fees,
                discounted = $discounted_fees,
                image = '$imageName',
                color = '$color'
                ";
        } else {
            $qry = "UPDATE courses SET 
                name = '$name', 
                description = '$description',
                fees = $original_fees,
                discounted = $discounted_fees,
                image = '$imageName',
                color = '$color'
                WHERE id = $id
                ";
        }

        try {
            $flag = mysqli_query($conn, $qry); // true - false
        } catch (Exception $err) {
            $flag = false;
            // p($err->getMessage());
        }
        if ($flag == true) {
            header("LOCATION:view-course.php");
        } else {
            $msg = "Unable to insert data, internal server error";
        }
    } else {
        echo "Error!!";
    }
}

include "common/header.php";
?>

<link rel="stylesheet" href="css/dropify.css">
<!-- Content Wrapper -->


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $mode ?> Course</h6>
        </div>
        <div class="card-body">
            <h4 class="text-center text-danger">
                <?php echo $msg ?>
            </h4>
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <label for="" class="form-lable">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name ?? '' ?>">
                    </div>
                    <div class="col-12 mt-2">
                        <div class="row">
                            <div class="col-4">
                                <label for="" class="form-lable">Color</label>
                                <input type="color" name="color" class="form-control" value="<?php echo $fetch['color']; ?>">
                            </div>
                            <div class="col-4">
                                <label for="" class="form-lable">Original Fees</label>
                                <input type="number" name="original_fees" class="form-control" value="<?php echo $fetch['fees']; ?>">
                            </div>
                            <div class="col-4">
                                <label for="" class="form-lable">Discounted Fees</label>
                                <input type="number" name="discounted_fees" class="form-control" value="<?php echo $fetch['discounted']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="" class="form-lable">Image</label>
                        <input type="file" name="image" data-default-file="../gallery_img/<?php echo $fetch['image'] ?>" class="dropify form-control" value="">
                    </div>
                    <input type="hidden" name="old_image" value="<?php echo $fetch['image'] ?>">
                    <div class="col-12 mt-2">
                        <label for="" class="form-lable">Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $desc ?? '' ?></textarea>
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
<script src="js/dropify.js"></script>
<script>
    CKEDITOR.replace('news_desc');
    $('.dropify').dropify();
</script>