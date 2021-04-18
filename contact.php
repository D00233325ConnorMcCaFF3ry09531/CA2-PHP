
<!-- the head section -->
 <div class="container">
 <script src="validation.js"></script>
<?php
include('includes/header.php');
?>

<h1>Contact us</h1>
<form method="POST" name="contactform" action="contact-form-handler.php"> 
<p>
<label for='name'>Your Name:</label> <br>
<input type="text" name="name">
</p>
<p>
<label for='email'>Email Address:</label> <br>
<input type="text" name="email" id="email" onBlur="email_validation();"> <br><span id="email_err"></span>
</p>
<p>
<label for='phone'>Phone: (9 digits) e.g (000000000)</label><br>
<input type="text" name="phone" id="phone" onBlur="phone_validation();" placeholder="9 digit phonenumber .e.g. (000000000)" pattern="^[0-9]{9}$"><br><span id="phone_err"></span>
</p>
<label for='message'>Message:</label> <br>
<textarea name="message"></textarea>
</p>


<input type="submit" value="Submit"><br>
</form>  
<script language="JavaScript">
var frmvalidator  = new Validator("contactform");
frmvalidator.addValidation("name","req","Please provide your name"); 
frmvalidator.addValidation("email","req","Please provide your email"); 
frmvalidator.addValidation("phone","req","Please enter your phonenumber"); 
frmvalidator.addValidation("email","email","Please enter a valid email address"); 
</script>
    <?php
include('includes/footer.php');
?>