<?php

	echo '<!DOCTYPE html>
	<html>

	<head>
		 <meta charset="utf-8">
		 <title>XYZ Calendar</title>

		 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		 <link rel="stylesheet" type="text/css" href="../css/bp/css/bootstrap.css" media="screen">
		 <link rel="stylesheet" type="text/css" href="../css/main.css" media="screen">
		 <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		 <!--[if lt IE 9]>
			 <script src="../js/bootstrap/respond.min.js"></script>
			 <script src="../js/bootstrap/html5shiv.js"></script>
		 <![endif]-->

	</head>


		<body>

	<!--  -->
	<div class="container-fluid beginPart">
			<p class="p-start"> Header Part </p>
	</div>



	<!--  -->

	<!--  -->
	<div class="container-fluid bg-all bg-grey">
		<div class="row align-items-start no-gutters">
			<!-- Start of first square -->
			<div class = "col-8">

				<nav class="navbar navbar-expand-lg navbar-light bg-barra1">
			    <a class="navbar-brand" href="#">XYZ</a>
			    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>

			    <div class="collapse navbar-collapse" id="navbarNavDropdown-navbarText">
			      <ul class="navbar-nav justify-content-center">
			        <li class="nav-item">
			          <a class="nav-link white" href="#" >Home <span class="sr-only"></span></a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="../php/about.php">About</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="../php/features.php">Features</a>
			        </li>
							<li class="nav-item">
			          <a class="nav-link" href="../php/calendar.php">Calendar</a>
			        </li>

			      </ul>
			    </div>
			  </nav>

				<div class="container bodyContent">
					<p class="">We create an amazing calendar just for you.</p>
				</div>

			</div>
		  <!-- End of first square -->





			<!-- Start of Second square -->
			<div class="col-4">
				<div class="container-fluid hidden-sm-up barra2">
					<nav class="navbar navbar-expand-lg navbar-light bg-barra2">
						<div class="collapse navbar-collapse" id="navbarNavDropdown-navbarText">
							<ul class="navbar-nav justify-content-center">
								<li class="nav-item">
									<a class="nav-link" href="../php/login.php" >Login <!--<span class="sr-only"></span>--></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="../php/developer.php">Developers</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="../php/contact.php">Contact</a>
								</li>
							</ul>

						</div>
					</nav>
				</div>


				<div class="container bodyContent2">
					<p>Other Square</p>
				</div>

			</div>
			<!-- End of Second square -->
		</div>
	</div>




	<!--  -->

	<footer>
		<div class="container-fluid endPart">
				<p class="p-end"> End Part </p>
		</div>
	</footer>







			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		</body>
	</html>
';



?>
