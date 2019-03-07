<html lang="en">

<head>
	<?php include "head.php"?>
</head>

<body id="body" class="b-element" ng-app="leagueApp" ng-controller="leagueController">
	<!-- Preloader -->
	<div id="preloader" class="smooth-loader-wrapper">
		<div class="smooth-loader">
			<div class="loader1">
				<div class="loader-target">
					<div class="loader-target-main"></div>
					<div class="loader-target-inner"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="main-wrapper bg-sand">
		<section ng-init="getTeams()">
			<div>
				<div class="row ">
					<div class="col-md-6" ng-repeat="x in teams | orderBy: '-standing'">
						<div ng-click="teamSelect(x.team_id, $index+1)" class="media blog-media">
							<a><img class="d-flex" src="{{x.team_image}}" alt="Generic placeholder image"></a>
							<div class="circle">
								<h5 class="day"># {{$index + 1}}</h5>
							</div>
							<div class="media-body">
								<a href="">
									<h5 class="mt-0">{{x.team_name}}</h5>
								</a>
								<strong>Wins:</strong>&nbsp; {{x.wins}}
								<br>
								<strong>Loses:</strong>&nbsp; {{x.loses}}
								<br>
								<ul>
									<li>Members: {{x.team_count}}</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>


	<!-- JAVASCRIPTS -->
	<?php include "js-compile.php";?>

</body>

</html>
