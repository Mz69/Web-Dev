<?php
    require_once "includes/header.php";
?>

<link rel="stylesheet" href="css/contactForm.css">

<div id="content">

    <div id="contact-form">
        <h1>Contact us</h1>
        <form action="includes/adminProcess.php" method="POST">
            <div class="form-row">
                <label>E-mail address:</label>
                <input type="text" name="e-mail">
            </div>
			
			<div class="form-row">
                <label>Subject:</label>
                <input type="text" name="subject">
            </div>

            <div class="form-row">
                <label>Message:</label>
                <textarea name="message"></textarea>
            </div>

            <div>
                <input name="submit-contact" type="submit" id="submit-contact" value="Submit">
            </div>
        </form>
    </div>

    <div id="other-contact">
        <h1>Other way to contact us</h1>
        
        <p>Office address: xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
        <p>Office telephone number: xxxxxxxxxx</p>
    </div>
</div>

<script src="js/script.js"></script>

<?php
    require_once "includes/footer.php";
?>