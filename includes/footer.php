<footer>
<p>&copy; <?php echo date("Y"); ?> Newry Electronics</p>
</footer>
</div><!-- close div container -->
<script language="JavaScript">
var frmvalidator  = new Validator("contactform");
frmvalidator.addValidation("name","req","Please provide your name"); 
frmvalidator.addValidation("email","req","Please provide your email"); 
frmvalidator.addValidation("phone","req","Please enter your phonenumber"); 
frmvalidator.addValidation("email","email","Please enter a valid email address"); 
</script>
</body>
</html>