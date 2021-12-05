<!--
	The stating layout was downloaded from https://www.tutorialrepublic.com/ by Thomas Stolz
	The layout (Bootstrap Crud Data Table for Database with Modal Form) was contributed by Tutorial Republic
	URL: https://www.tutorialrepublic.com/snippets/preview.php?topic=bootstrap&file=crud-data-table-for-database-with-modal-form
	Date Accessed: 25-November-2021
	
-->
<?php
	require_once "db/db.php";
	require_once "includes/adminHeader.php";
?>
<!DOCTYPE html>
<html lang="en">
<body>
	<div class="container-xl">
		<div class="table-responsive">
			<div>
				<nav class="nav d-flex justify-content-between">
					<a href="adminProduct.php"><h2><b>Manage Products</b></h2></a>
					<a href="adminEmail.php"><h2><b>Manage Emails</b></h2></a>
				</nav>
			</div>
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2><b>Emails Received</b></h2>
						</div>
							<div class="col-sm-6">
								<form action="includes/adminForms.php" method = "post">
								<input type="submit" name="sendNew" class="btn btn-success" value = "Send a New Email">
							</form>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
				<thead>
						<tr>
							<th>Subject</th>
							<th>Content</th>
							<th>Sender</th>
							<th>Action</th>
						</tr>
					</thead>
				<tbody>
						<?php
							$querySQL = "SELECT * FROM `iron_mail` WHERE `i_mail_recipient_email` = 'admin@admin.org'";
							$result = $dbconn->query($querySQL);	
							if ($result) {
								while ($row = $result->fetch_assoc()) {
						?>
									<form action="includes/adminForms.php" method = "post">
										<tr>
											<th><?php echo $row["i_mail_subject"]; ?></th>
											<th><?php echo $row["i_mail_text"]; ?></th>
											<th><?php echo $row["i_mail_sender_email"]; ?></th>
											<th>
												<input type="submit" name="Send" class="btn btn-success" value="Answer Email">
												<input type="submit" name="DeleteEm" class="btn btn-danger" value="Delete">
												<input type="hidden" name="idEm" value="<?php echo $row["i_mail_id"]; ?>">
												<input type="hidden" name="subject" value="<?php echo $row["i_mail_subject"]; ?>">
												<input type="hidden" name="sender" value="<?php echo $row["i_mail_sender_email"]; ?>">
											</th>
										</tr>
									</form>
						<?php
								}
							}
						?>
					</tbody>
				</table>
						<table class="table table-striped table-hover">
				<thead>
						<tr>
							<th>Subject</th>
							<th>Content</th>
							<th>Recipient</th>
							<th>Action</th>
						</tr>
					</thead>
				<tbody>
						<?php
							$querySQL = "SELECT * FROM `iron_mail` WHERE `i_mail_sender_email` = 'admin@admin.org'";
							$result = $dbconn->query($querySQL);	
							if ($result) {
								while ($row = $result->fetch_assoc()) {
						?>
									<form action="includes/adminForms.php" method = "post">
										<tr>
											<th><?php echo $row["i_mail_subject"]; ?></th>
											<th><?php echo $row["i_mail_text"]; ?></th>
											<th><?php echo $row["i_mail_recipient_email"]; ?></th>
											<th>
												<input type="submit" name="Send" class="btn btn-success" value="Answer Email">
												<input type="submit" name="DeleteEm" class="btn btn-danger" value="Delete">
												<input type="hidden" name="idEm" value="<?php echo $row["i_mail_id"]; ?>">
												<input type="hidden" name="subject" value="<?php echo $row["i_mail_subject"]; ?>">
												<input type="hidden" name="sender" value="<?php echo $row["i_mail_sender_email"]; ?>">
											</th>
										</tr>
									</form>
						<?php
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>        
	</div>
</body>
</html>