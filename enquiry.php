<?php
include "app/config.php";
include "app/helper.php";
include "common/header.php";
?>
<!-- right part of the middle portion starts here -->
<div class="middle-right enq-height">
	<div class="page-status">
		<h1>Enquiry</h1>
		<h2><i onclick='window.location.href = "index.php" '> Home /</i> Enquiry</h2>
	</div>
	<div class="mainwebsitecontent">
		<form>
			<div class="formrow">
				<div class="formlable">Gender : </div>
				<div class="inputform">
					<input type="radio" name="sex" id="male" class="" />Male
					<input type="radio" name="sex" id="female" class="" />Female
				</div>
			</div>
			<div class="formrow">
				<div class="formlable">Name : </div>
				<div class="inputform"><input type="text" name="name" id="name" class="inputbox" /></div>
			</div>
			<div class="formrow">
				<div class="formlable">Contact No : </div>
				<div class="inputform"><input type="text" name="contact" id="contact" class="inputbox" /></div>
			</div>
			<div class="formrow">
				<div class="formlable">Country : </div>
				<div class="inputform">
					<select name="country" id="country">
						<option value="">---Select---</option>
						<option value="1">India</option>
						<option value="2">USA</option>
						<option value="3">Australia</option>
					</select>
				</div>
			</div>
			<div class="formrow">
				<div class="formlable">State : </div>
				<div class="inputform">
					<select name="state" id="state">
						<option value="">---Select---</option>
						<option value="1">Rajasthan</option>
						<option value="2">Maharastra</option>
						<option value="3">Punjab</option>
						<option value="4">Kerela</option>
						<option value="5">New York</option>
						<option value="6">Malbourne</option>
						<option value="7">Syndey</option>
					</select>
				</div>
			</div>
			<div class="formrow">
				<div class="formlable">City : </div>
				<div class="inputform">
					<select name="city" id="city">
						<option value="">---Select---</option>
						<option value="1">Jodhpur</option>
						<option value="2">Jaipur</option>
						<option value="3">Mumbai</option>
						<option value="4">Washington DC</option>
						<option value="5">New York</option>
					</select>
				</div>
			</div>
			<div class="formrow">
				<div class="formlable">Address : </div>
				<div class="inputform">
					<textarea name="address" id="address" class="textarea"></textarea>
				</div>
			</div>
			<div class="formrow">
				<div class="formlable">Email : </div>
				<div class="inputform"><input type="text" name="email" id="email" class="inputbox" /></div>
			</div>
			<div class="formrow">
				<div class="formlable">Enquiry : </div>
				<div class="inputform"><textarea name="enquiry" id="enquiry" class="textarea"></textarea></div>
			</div>
			<div class="formrow">
				<div class="formlable"><input type="submit" value="Send" class="button" /></div>
			</div>
		</form>
	</div>
</div>
<!-- right part of the middle portion starts here -->
<div class="clear"></div>
</div>
<!-- middle portion with  links, new , banner and course ends here -->
<?php
include "common/footer.php";
?>