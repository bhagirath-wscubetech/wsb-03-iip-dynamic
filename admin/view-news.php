<?php
include "../app/config.php";
include "../app/helper.php";
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
                        <td>Sr.</td>
                        <td>Title</td>
                        <td width="40%">Description</td>
                        <td>Status</td>
                        <td>Created At</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- End of Main Content -->
<?php include "common/footer.php"; ?>