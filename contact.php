<?php
	/*
		Dosi - https://github.com/simonbingham/dosi
		
		Copyright (c) 2012, Simon Bingham
		
		Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation
		files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, 
		modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software 
		is furnished to do so, subject to the following conditions:
		
		The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
		
		THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES 
		OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE 
		LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR 
		IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
	*/
?>

<?php
	$metadescription = "";
	$metakeywords = "";
	$pagetitle = "";
	$page = basename( $_SERVER[ "PHP_SELF" ] );
	include( "includes/header.inc.php" );
	
	if( !isset( $_POST[ "fname" ] ) ) $_POST[ "fname" ] = "";
	if( !isset( $_POST[ "femail" ] ) ) $_POST[ "femail" ] = "";
	if( !isset( $_POST[ "fmessage" ] ) ) $_POST[ "fmessage" ] = "";
	
	// process enquiry form
	if( isset( $_POST[ "fsubmit" ] ) ) 
	{
		// validate enquiry
		if( !isset( $_POST[ "fname" ] ) || !Strlen( Trim( $_POST[ "fname" ] ) ) )
		{
			$_POST[ "fnameerror" ] = true;
			$_POST[ "ferror" ] = true;
		}
		if( !isset( $_POST[ "femail" ] ) || !preg_match( "(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})", $_POST[ "femail" ] ) )
		{
			$_POST[ "femailerror" ] = true;
			$_POST[ "ferror" ] = true;
		}
		if( !isset( $_POST[ "fmessage" ] ) || !Strlen( Trim( $_POST[ "fmessage" ] ) ) )
		{
			$_POST[ "fmessageerror" ] = true;
			$_POST[ "ferror" ] = true;
		}
		
		if( isset( $_POST[ "ferror" ] ) ) $message = "<p class='error'>Please amend the highlighted fields.</p>";
		
		// send enquiry
		if( !isset( $_POST[ "ferror" ] ) )
		{
			$to = "smnbin@gmail.com";
			$subject = "Website Enquiry";
			$message = "
			<html>
				<head>
					<title>Website Enquiry</title>
				</head>
				<body>
					<p>Please find attached an enquiry from your website.</p>
					<p>Name: " . $_POST[ "fname" ] . "</p>
					<p>Email address: " . $_POST[ "femail" ] . "</p>
					<p>Message:</p><p>" . $_POST[ "fmessage" ] . "</p>
				</body>
			</html>
			";			
			$headers  = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
			$headers .= "To: Simon Bingham <smnbin@gmail.com>" . "\r\n";
			$headers .= "From: Simon Bingham <smnbin@gmail.com>" . "\r\n";
			if( mail( $to, $subject, $message, $headers ) ){
				$message = "<p>Thank you. Your message has been received.</p>";
			}else{
				$message = "<p>Sorry. Your message could not be sent.</p>";
			}
			$_POST[ "fname" ] = "";
			$_POST[ "femail" ] = "";
			$_POST[ "fmessage" ] = "";			
		}
	}
?>

<h1>Contact</h1>

<?php if( isset( $message ) ) echo $message ?>

<form action="contact.php" method="post">
	<div <?php if( isset( $_POST[ "fnameerror" ] ) ) echo "class='error'" ?>>
		<label for="fname">Name:</label>
		<br /><input type="text" name="fname" id="fname" value="<?php echo $_POST[ 'fname' ] ?>" />
	</div>
	<div <?php if( isset( $_POST[ "femailerror" ] ) ) echo "class='error'" ?>>
		<label for="femail">Email address:</label>
		<br /><input type="text" name="femail" id="femail" value="<?php echo $_POST[ 'femail' ] ?>" />
	</div>
	<div <?php if( isset( $_POST[ "fmessageerror" ] ) ) echo "class='error'" ?>>
		<label for="fmessage">Message:</label>
		<br /><textarea name="fmessage" id="fmessage"><?php echo $_POST[ 'fmessage' ] ?></textarea>
	</div>
	<div>
		<input type="submit" name="fsubmit" id="fsubmit" value="Send" />
	</div>
</form>

<?php include_once "includes/footer.inc.php"; ?>