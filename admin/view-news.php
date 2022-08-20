<?php
include "../app/config.php";
include "../app/helper.php";
$msg = "";
if (isset($_GET['id'])) {
    $newsId = $_GET['id'];
    $qry = "DELETE FROM news WHERE id = $newsId";
    try {
        $flag = mysqli_query($conn, $qry);
    } catch (Exception $err) {
        $flag = false;
    }
    if ($flag == true) {
        $msg = "Data deleted successfully";
    } else {
        $msg = "Unable to delete the data";
    }
}

include "common/header.php";
?>
<!-- Content Wrapper -->


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View News</h6>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Title</th>
                        <th width="40%">Description</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                $sel = "SELECT * FROM news"; // step 1
                $exe = mysqli_query($conn, $sel); // step 2
                // $fetch = mysqli_fetch_assoc($exe);
                // p($fetch);
                // SELECT <cols> FROM <table_name>
                // <cols> - * (All Columns)
                ?>
                <tbody>
                    <?php
                    $sr = 1;
                    while ($fetch = mysqli_fetch_assoc($exe)) { // step 3
                    ?>
                        <tr>
                            <td>
                                <?php echo $sr ?>
                            </td>
                            <td>
                                <?php echo $fetch['title'] ?>
                            </td>
                            <td width="40%">
                                <?php echo $fetch['description'] ?>
                            </td>
                            <td>
                                <?php
                                if ($fetch['status'] == 1) {
                                ?>
                                    <button class="btn btn-success">Active</button>
                                    <!-- Active -->
                                <?php
                                } else {
                                ?>
                                    <button class="btn btn-warning">Inactive</button>
                                    <!-- Inactive -->
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo $fetch['created_at'] ?>
                            </td>
                            <td>
                                <i class="text-primary fa fa-pen"></i>
                                &nbsp;
                                &nbsp;
                                <a href="view-news.php?id=<?php echo $fetch['id'] ?>">
                                    <!-- get request -->
                                    <i class="text-danger fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                        $sr++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- End of Main Content -->
<?php include "common/footer.php"; ?>
<?php
if ($msg != "") :
?>
    <script>
        showSnackbar("<?php echo $msg ?>", <?php echo $flag ?>)
    </script>
<?php
    $msg = "";
endif;
?>