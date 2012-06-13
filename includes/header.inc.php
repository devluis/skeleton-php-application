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

<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="<?php echo $metadescription ?>">
		<meta name="keywords" content="<?php echo $metakeywords ?>">

		<title><?php echo $pagetitle ?></title>

		<link rel="stylesheet" type="text/css" href="assets/css/core.css">

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="assets/js/core.js"></script>

		<link rel="shortcut icon" href="favicon.ico">
	</head>

	<body>
		<div class="print-header">print header content</div>
	
		<div class="container">
			<div class="header">
            	<p><a href="./" title="Return to home page">Home</a></p>
            </div> <!-- close header div --->

			<div class="navigation">
				<ul>
					<li><a href="./" <?php if( $page == "index.php" ) echo "class='selected'" ?>>Home</a></li>
					<li><a href="services.php" <?php if( $page == "services.php" ) echo "class='selected'" ?>>Services</a></li>
					<li><a href="about.php" <?php if( $page == "about.php" ) echo "class='selected'" ?>>About</a></li>
					<li><a href="contact.php" <?php if( $page == "contact.php" ) echo "class='selected'" ?>>Contact</a></li>
				</ul>
			</div> <!-- close navigation div --->

			<div class="content">