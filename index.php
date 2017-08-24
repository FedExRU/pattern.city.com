<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Pattern City</title>
	<meta name="description" 	content="Illustrative examples of design patterns">
	<meta property="og:title" 	content="Pattern City" />
	<meta property="og:type" 	content="website" />
	<meta property="og:url" 	content="http://localhost/pattern.city.com/">
	<meta property="og:image" 	content="assets/img/patterns/mayor.png" />
	<link rel="stylesheet" 		href="assets/css/style.css">
	<link rel="stylesheet" 		href="assets/libs/css/remodal.css">
	<link rel="stylesheet" 		href="assets/libs/css/remodal-default-theme.css">
</head>
<body>
	<div id="main">

		<header>
			<h1 class = "main-title">Welcome to the Patterns City</h1>
			<h2 class = "subtitle">What would you like to do in the next time?</h2>
		</header>

		<section id="patterns">

			<section class="wrapper">
				<div data-remodal-target="modal" data-modal="mayor" class="pattern">
					<img src="assets/img/patterns/mayor.png" alt="Meeting with mayor">
					<h2>Meeting with current mayor of this city. He will be glad to talk to you.</h2>
					<div class="go orange">
						<h3>It'll an honor for me!</h3>
					</div>
				</div>

				<div data-remodal-target="modal" data-modal="government" class="pattern">
					<img src="assets/img/patterns/government.png" alt="Meeting with government">
					<h2>This is the government of this city. Let them introduce themselves to you!</h2>
					<div class="go pink">
						<h3>Yeah, with pleasure!</h3>
					</div>
				</div>
			</section>

			<section class="wrapper">
				<div data-remodal-target="modal" data-modal="building" class="pattern">
					<img src="assets/img/patterns/build.png" alt="Building">
					<h2>Maybe we'll improve the city? Let's build something!</h2>
					<div class="go skyblue">
						<h3>This is good idea!</h3>
					</div>
				</div>
				<div data-remodal-target="modal" data-modal="emergency" class="pattern">
					<img src="assets/img/patterns/emergency.png" alt="Calling to emergency">
					<h2>You are in danger?! Call to 911 immediately!</h2>
					<div class="go red">
						<h3>Right! I need help!</h3>
					</div>
				</div>
			</section>

			<section class="wrapper">
				<div class="pattern">
					<img src="assets/img/patterns/sience.png" alt="Discovering a new technology">
					<h2>Live and learn! Let's discover new technology!</h2>
					<div class="go black">
						<h3>Sounds tempting! I'm in!</h3>
					</div>
				</div>

				<div data-remodal-target="modal" data-modal="celebration" class="pattern">
					<img src="assets/img/patterns/event.png" alt="Making a celebration">
					<h2>Let's have a grand celebration today!</h2>
					<div class="go yellow">
						<h3>Great!!</h3>
					</div>
				</div>

			</section>

			<section class="wrapper">
				<div data-remodal-target="modal" class="pattern">
					<img src="assets/img/patterns/embassy.png" alt="Meeting with ambassators">
					<h2>This is the embassy. Here you can meet our ambassadors.</h2>
					<div class="go cian">
						<h3>I need to talk with ambassator</h3>
					</div>
				</div>
			</section>
		</section>

		<div class="remodal" data-remodal-id="modal">
  			<button data-remodal-action="close" class="remodal-close"></button>
  			<div class="data-content"></div>
		</div>

		<footer>	</footer>
	</div>
</body>
<script src="assets/libs/js/jquery-3.2.1.min.js"></script>
<script src="assets/libs/js/remodal.min.js"></script>
<script src="assets/js/data-modal.js"></script>
<script src="assets/js/customization.js"></script>
<script src="assets/js/validation.js"></script>
</html>