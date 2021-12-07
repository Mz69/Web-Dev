<?php
	require_once "../db/db.php";

	if (isset($_POST['delProd'])){
		if (isset($_POST['prodID'])){
			$id = ($_POST['prodID']);
			$dbconn->query("DELETE FROM `iron_product` WHERE `i_product_id` = '$id'");
			header("Location: ../adminProduct.php");
		}
	}
	
	if (isset($_POST['delEm'])){
		if (isset($_POST['emID'])){
			$id = ($_POST['emID']);
			$dbconn->query("DELETE FROM `iron_mail` WHERE `i_mail_id` = '$id'");
			header("Location: ../adminEmail.php");
		}
	}
	
	if (isset($_POST['editProd'])){
		if (isset($_POST['prodID'])){
			$id = ($_POST['prodID']);
			$desc = cleanUserInput($_POST['editDesc']);
			$price = cleanUserInput($_POST['editPrice']);
			$qt = cleanUserInput($_POST['editQuant']);
			$link = cleanUserInput($_POST['editLink']);
			$dbconn->query("UPDATE `iron_product` SET `i_product_desc`='$desc',`i_product_price`='$price', `i_product_qt`='$qt', `i_product_link`='$link' WHERE `i_product_id` = '$id'");
			$dbconn->query("UPDATE `iron_product_imgs` SET `i_img_path`='$link' WHERE `i_product_id` = '$id'");
			header("Location: ../adminProduct.php");
		}
	}
	
	if (isset($_POST['answerEm'])){
		$recipient = cleanUserInput($_POST['sender']);
		$sub = cleanUserInput($_POST['subject']);
		$subject = "Re:" . $sub;
		$content = cleanUserInput($_POST['emContent']);
		$sender = "admin@admin.org";
		$dbconn->query("INSERT INTO `iron_mail`(`i_mail_recipient_email`, `i_mail_sender_email`, `i_mail_subject`, `i_mail_text`) VALUES ('$recipient', '$sender', '$subject', '$content')");
		header("Location: ../adminEmail.php");
	
	}
	
	if (isset($_POST['addProd'])){
		$name = cleanUserInput($_POST['addName']);
		$desc = cleanUserInput($_POST['addDesc']);
		$price = cleanUserInput($_POST['addPrice']);
		$qt = cleanUserInput($_POST['addQuant']);
		$link = cleanUserInput($_POST['addLink']);
		$dbconn->query("INSERT INTO `iron_product`(`i_product_name`, `i_product_desc`, `i_product_price`, `i_product_qt`, `i_product_link`) VALUES ('$name','$desc','$price','$qt','$link')");
		$dbconn->query("INSERT INTO `iron_product_imgs`(`i_product_id`, `i_img_path`) VALUES(LAST_INSERT_ID(), '$link')");
		header("Location: ../adminProduct.php");
	}
	
	if (isset($_POST['addEmail'])){
		$recipient = cleanUserInput($_POST['emailRec']);
		$subject = cleanUserInput($_POST['emailSubject']);
		$content = cleanUserInput($_POST['emailContent']);
		$sender = "admin@admin.org";
		$dbconn->query("INSERT INTO `iron_mail`(`i_mail_recipient_email`, `i_mail_sender_email`, `i_mail_subject`, `i_mail_text`) VALUES ('$recipient', '$sender', '$subject', '$content')");
		header("Location: ../adminEmail.php");
	}
?>
