<?php 
	// message Vars
	$msg = "";
	$msgClass = "";
	// check for submit
	if (filter_has_var(INPUT_POST, 'submit')) {
		// get form data
		$email = htmlspecialchars($_POST['email']);
		$name = htmlspecialchars($_POST['name']);
		$message = htmlspecialchars($_POST['message']);

		// check required fields
		if(!empty($email) && !empty($name) && !empty($message)) {
			
			// check email
			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				$msg = "Please enter valid email";
				$msgClass = "alert alert-danger";
			} else {
				// passed
				$toEmail = 'munoz.jeffrey95@yahoo.com';
				$subject = 'Contact Request From '. $name;
				$body = '<h2>Contact Request</h2>
						 <h4>Name</h4><p>'.$name.'</p>
						 <h4>Email</h4><p>'.$email.'</p>
						 <h4>Message</h4><p>'.$message.'</p>';

					// email headers
					$headers = "MIME-Version: 1.0" . "/r/n";
					$headers .= "Content-Type:text/html;charset=UTF-8" . "/r/n";

					// additional headers
					$headers .= "From: " . $name . "<".$email.">" . "/r/n";

					if(mail($toEmail, $subject, $body, $headers)) {
						// email sent
						$msg = "Your email has been sent";
						$msgClass = "alert-success";
					} else {
						$msg = "Your email was not sent";
						$msgClass = "alert-danger";
					}
			}

		} else {
			$msg = "Please fill in all fields";
			$msgClass = "alert alert-danger";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>worldofmanny.com</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,500" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/portfolio.css">
</head>

<body>
	
	<div class="container">
		
		<!-- About Header -->
		<section id="about">
			<h1 id="top">About Me</h1>
			<div class="row">
				
				<img id ="me" class="img-circle col-lg-6 col-md-6 col-sm-6 col-xs-12" src="assets/img/me.png" alt="Picture of Manny Munoz">

				<div id = "skills" class= "col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<h3>Experience With:</h3>
					<hr>
					<p>Html, Css(Bootstrap), Javascript(jQuery), Java, PHP, Git, Wordpress, Node.js, Express.js, MongoDB, Java, Visual Basic, Marketing, Branding, E-Commerce, Wordpress, Shopify, E-Commerce </p>

					<h3>Knowledge Of:</h3>
					<hr>
					<p>Agile, MVC, OOP, Responsive Design, Cross-browser Compatibility</p>
				</div>
			</div>
		</section>

		<!-- Projects -->
		<section id="projects">
			<h1>Projects</h1>
			<div class="row">
				<a class="col-lg-4 col-md-4 col-sm-6 col-xs-12 " href="http://bodyandsoulmasso.com"><img class="zoom img-responsive" src="assets/img/bnsWP.jpg" alt="WP Site for local massage parlor"></a>
				<a class="col-lg-4 col-md-4 col-sm-6 col-xs-12 " href="https://animalinashell.github.io/Mock-Development-Agency/"><img class="zoom img-responsive" src="assets/img/velocity.jpg" alt="Mock web design agency"></a>
				<a class="col-lg-4 col-md-4 col-sm-6 col-xs-12" href="https://codepen.io/lucasboy/details/mMGpYJ"><img class="zoom img-responsive" src="assets/img/todo.jpg" alt="Todo List Project"></a>
				<a class="col-lg-4 col-md-4 col-sm-6 col-xs-12" href="https://codepen.io/lucasboy/details/xLapBm"><img class="zoom 
				img-responsive" src="assets/img/color.jpg" alt="Color Game"></a>
				<a class="col-lg-4 col-md-4 col-sm-6 col-xs-12 " href="https://codepen.io/lucasboy/details/YxEmwE"><img class="zoom img-responsive" src="assets/img/weather.jpg" alt="Weather App"></a>
				<a class="col-lg-4 col-md-4 col-sm-6 col-xs-12 " href="https://codepen.io/lucasboy/details/QMqapb"><img class="zoom img-responsive" src="assets/img/quote.jpg" alt=" Random Quote Machine"></a>
			</div>
		</section>

		<!-- Contact form error -->
		<?php if ($msg != ''): ?>
			<div id = "error" class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
		<?php endif ?>

		<!-- Contact form -->
		<section id="contact">
			<h1>Contact Me</h1>
			<form action="portfolio.php" method="post">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ""; ?>">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ""; ?>">
				</div>
				<div class="form-group">
					<label>Message</label>
					<textarea name="message" class="form-control" value="<?php echo isset($_POST['message']) ? $message : ""; ?>"></textarea>
				</div>
				<br>
				<button type="submit" name="submit" class="btn btn-default button">Send</button>
			</form>
		</section>

		<!-- Footer -->
		<div class="container">
			<div class="row">
				<footer>
					<div id = "info" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<a href="tel:12163578651"><h4><i class="fa fa-phone" aria-hidden="true"></i> (216)-357-8651</h4></a>
						<h4><i class="fa fa-map-marker" aria-hidden="true"></i> Cleveland, Ohio</h4> 
						<h4><i class="fa fa-envelope" aria-hidden="true"></i> munoz.jeffrey95@yahoo.com</h4>
					</div>
					<div id = "social" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<a href="https://github.com/AnimalinAshell"><i class="fa fa-github" aria-hidden="true"></i></a>
						<a href="https://www.linkedin.com/in/jeffrey-munoz-107336b4/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						<a href="https://codepen.io/lucasboy/"><i class="fa fa-codepen" aria-hidden="true"></i></a>
					</div>
					<div id = "copyright" class="container">
						<div class="row">
							<div class="col-lg-12 col-md-12  col-sm-12">
								<p>By<span> Manny Munoz </span>&copy2017</p>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>

	</div>
	<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
	<script
		  src="https://code.jquery.com/jquery-3.2.1.min.js"
		  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  crossorigin="anonymous"></script>	
	<script src="assets/js/script.js"></script>
</body>
</html>