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
					<a href="includes/logout.php"><h2><b>Logout</b></h2></a>
				</nav>
			</div>
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2><b>Manage Products</b></h2>
						</div>
						<div class="col-sm-6">
							<form action="includes/adminForms.php" method = "get">
							<input type="submit" name="Add" class="btn btn-success" value = "Add a New Product">
							</form>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Description</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Product Picture Link</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$querySQL = "SELECT * FROM `iron_product`";
							$result = $dbconn->query($querySQL);	
							if ($result) {
								while ($row = $result->fetch_assoc()) {
						?>
									<form action="includes/adminForms.php" method = "post">
										<tr>
											<th><?php echo $row["i_product_name"]; ?></th>
											<th><?php echo $row["i_product_desc"]; ?></th>
											<th><?php echo $row["i_product_price"]; ?></th>
											<th><?php echo $row["i_product_qt"]; ?></th>
											<th><?php echo $row["i_product_link"]; ?></th>
											<th>
												<input type="submit" name="Edit" class="btn btn-success" value="Edit">
												<input type="submit" name="DeleteProd" class="btn btn-danger" value="Delete">
												<input type="hidden" name="idProd" value="<?php echo $row["i_product_id"]; ?>">
												<input type="hidden" name="descProd" value="<?php echo $row["i_product_desc"]; ?>">
												<input type="hidden" name="priceProd" value="<?php echo $row["i_product_price"]; ?>">
												<input type="hidden" name="qtProd" value="<?php echo $row["i_product_qt"]; ?>">
												<input type="hidden" name="linkProd" value="<?php echo $row["i_product_link"]; ?>">
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