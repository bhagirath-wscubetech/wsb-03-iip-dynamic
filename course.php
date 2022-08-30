<?php
include "app/config.php";
include "app/helper.php";
include "common/header.php";
?>
<!-- right part of the middle portion starts here -->
<div class="middle-right">
	<div class="page-status">
		<h1>Courses</h1>
		<h2><i onclick='window.location.href = "index.php" '> Home /</i> Courses</h2>
	</div>
	<div class="course-content">
		<div class="row1">
			<!-- Start -->
			<?php
			$selCourse = "SELECT * FROM courses WHERE status = 1 ORDER BY name ASC";
			$exeCourse = mysqli_query($conn, $selCourse);
			while ($fetchCourse = mysqli_fetch_assoc($exeCourse)) :
				$themeColor = $fetchCourse['color'];
			?>
				<div class="course-1">
					<div class="course-1-icon" style="background: <?php echo $themeColor ?>">
						<div class="icon-1">
							<img src="gallery_img/<?php echo $fetchCourse['image'] ?>">
						</div>
					</div>

					<div class="c-1" style="border-color:<?php echo $themeColor ?>;color:<?php echo $themeColor ?>">
						<?php echo $fetchCourse['name'] ?>
					</div>
				</div>
			<?php
			endwhile;
			?>
			<!-- End -->
		</div>
	</div>
</div>
<!-- right part of the middle portion starts here -->
<div class="clear"></div>
</div>
<?php
include "common/footer.php";
?>