<!--
	The stating layout was downloaded from https://www.tutorialrepublic.com/ by Thomas Stolz
	The layout (Bootstrap Crud Data Table for Database with Modal Form) was contributed by Tutorial Republic
	URL: https://www.tutorialrepublic.com/snippets/preview.php?topic=bootstrap&file=crud-data-table-for-database-with-modal-form
	Date Accessed: 25-November-2021
	
-->
<?php
	require_once "adminHeader.php";
	require_once "../db/db.php";
?>

<?php
	if (isset($_POST['DeleteProd'])){
		$prodID = ($_POST['idProd']);
?>
		<div id="deleteProductModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="adminProcess.php" method="post">
						<div class="modal-body">					
							<p>Are you sure you want to delete this Product?</p>
							<p class="text-warning"><small>This action cannot be undone.</small></p>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" onclick="history.back()">
							<input type="submit" name="delProd" class="btn btn-danger" value="Delete">
							<input type="hidden" name="prodID" value="<?php echo $prodID; ?>">
						</div>
					</form>
				</div>
			</div>
		</div>
<?php
	}
	if (isset($_POST['DeleteEm'])){
		$emID = ($_POST['idEm']);
?>
		<div id="deleteEmailModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="adminProcess.php" method="post">
						<div class="modal-body">					
							<p>Are you sure you want to delete this Email?</p>
							<p class="text-warning"><small>This action cannot be undone.</small></p>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" onclick="history.back()">
							<input type="submit" name="delEm" class="btn btn-danger" value="Delete">
							<input type="hidden" name="emID" value="<?php echo $emID; ?>">
						</div>
					</form>
				</div>
			</div>
		</div>
<?php
	}
	if (isset($_POST['Edit'])){
		$prodID = ($_POST['idProd']);
		$prodDesc = ($_POST['descProd']);
		$prodPrice = ($_POST['priceProd']);
		$prodQt = ($_POST['qtProd']);
		$prodLink = ($_POST['linkProd']);
?>
		<div id="editProductModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="adminProcess.php" method="post">
						<div class="modal-body">					
							<div class="form-group">
								<label>Description</label>
								<textarea name="editDesc" value="<?php echo $prodDesc;?>"  type="text" class="form-control" required></textarea>
							</div>
							<div class="form-group">
								<label>Price</label>
								<input name="editPrice" value="<?php echo $prodPrice;?>" type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Quantity</label>
								<input name="editQuant" value="<?php echo $prodQt;?>" type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Product Pricture Link</label>
								<input name="editLink" value="<?php echo $prodLink;?>" type="text" class="form-control" required>
							</div>						
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" onclick="history.back()">
							<input type="submit" name ="editProd" class="btn btn-info" value="Save">
							<input type="hidden" name="prodID" value="<?php echo $prodID; ?>">
						</div>
					</form>
				</div>
			</div>
		</div>
<?php
	}
	if (isset($_POST['Send'])){
		$emSub = ($_POST['subject']);
		$emSend = ($_POST['sender']);
?>
		<div id="answerEmailModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="adminProcess.php" method="post">
						<div class="modal-body">					
							<div class="form-group">
								<label>Content</label>
								<textarea name="emContent" type="text" class="form-control" required></textarea>
							</div>					
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" onclick="history.back()">
							<input type="submit" name ="answerEm" class="btn btn-info" value="Send">
							<input type="hidden" name="subject" value="<?php echo $emSub; ?>">
							<input type="hidden" name="sender" value="<?php echo $emSend; ?>">
						</div>
					</form>
				</div>
			</div>
		</div>
<?php
	}
	if (isset($_GET['Add'])){
?>
		<div id="addProductModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="adminProcess.php" method ="post">
						<div class="modal-body">
							<div class="form-group">
								<label>Name</label>
								<input name="addName"type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea name="addDesc" type="text" class="form-control" required></textarea>
							</div>
							<div class="form-group">
								<label>Price</label>
								<input name="addPrice" type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Quantity</label>
								<input name="addQuant"type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Product Pricture Link</label>
								<input name="addLink" type="text" class="form-control" required>
							</div>				
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" value="Cancel" onclick="history.back()">
							<input type="submit" name="addProd" class="btn btn-success" value="Add">
						</div>
					</form>
				</div>
			</div>
		</div>
<?php
	}
	if (isset($_POST['sendNew'])){
?>
		<div id="addEmailModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="adminProcess.php" method ="post">
						<div class="modal-body">
							<div class="form-group">
								<label>Recipient</label>
								<input name="emailRec"type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Subject</label>
								<input name="emailSubject" type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Content</label>
								<textarea name="emailContent" type="text" class="form-control" required></textarea>
							</div>			
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" value="Cancel" onclick="history.back()">
							<input type="submit" name="addEmail" class="btn btn-success" value="Send">
						</div>
					</form>
				</div>
			</div>
		</div>
<?php
	}
?>