<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "head.php"; ?>
</head>

<body id="body" class="home-classic" ng-app="leagueApp" ng-controller="leagueController">
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
	<!-- HEADER -->
		<div class="main-wrapper">
			<div id="joinTeam" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-body">
							<div class="container-fluid modal-item">
								<div class="row justify-content-md-center">
									<div class="col-xl-5 col-lg-6 col-md-8">
										<div class="section-title text-center title-ex1">
											<h2>Join a Team</h2>
											<br>
										</div>
									</div>
								</div>
								<form>
									<div id="joinTeamError" class="hidden error-messsage"></div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">First Name</label>
										<div class="col-md-10">
											<input class="form-control" type="text" placeholder="Player First Name" id="firstNameJoinTeam">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Last Name</label>
										<div class="col-md-10">
											<input class="form-control" type="text" placeholder="Player Last Name" id="lastNameJoinTeam">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Email</label>
										<div class="col-md-10">
											<input class="form-control" type="email" placeholder="Player Email Address" id="emailJoinTeam">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Team Name</label>
										<div class="col-md-10">
											<select ng-init="getTeams()" ng-model="teamIDselect" id="teamJoinTeam" class="form-control">
													<option ng-repeat="x in teams" value="{{x.team_id}}">{{x.team_name}}</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Player Number</label>
										<div class="col-md-10">
											<input class="form-control" type="number" min="1" placeholder="Player Team Number" id="playerNumberJoinTeam">
										</div>
									</div>
									<div class="form-group row">
										<label for="example-text-input" class="col-md-2 col-form-label">Address</label>
										<div class="col-md-10">
											<input class="form-control" type="text" placeholder="Team Leader Address" id="address">
										</div>
									</div>
									<div class="form-group row">
										<label for="example-search-input" class="col-md-2 col-form-label">Phone Number</label>
										<div class="col-md-10">
											<input class="form-control" type="text" id="phoneNumber" placeholder="###-###-####">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Age</label>
										<div class="col-md-10">
											<input class="form-control" type="number" min="1" placeholder="Age" id="age">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Rate your self 1-5</label>
										<div class="col-md-10">
											<input class="form-control" type="number" min="1" max="5" placeholder="Rate your self 1-5" id="experience">
										</div>
									</div>
									<div class="form-group row">
										<label class="check-container col-md-12 col-form-label">I agree to the <a href="https://goo.gl/GZg5Aj" target="_blank">Night League Waiver</a>
											<input id="joinTeamWaiver" type="checkbox">
											<span class="checkmark"></span>
										</label>
										<br>
									</div>
									<div class="row">
										<center>
											<div class="col-md-10 offset-md-1">
												<button class="btn btn-primary btn-default card-btn" ng-click="joinTeam()" type="submit">
													Proceed to Payment
												</button>
											</div>
										</center>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- JAVASCRIPTS -->
		<?php include "js-compile.php"; ?>
</body>

</html>
