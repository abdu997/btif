
    <html lang="en">

    <head>
        <!-- ANGULAR SCRIPTS -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="js/angular.min.js"></script>
        <script src="js/app.js"></script>
        <script src="js/angular-sanitize.js"></script>
        <link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body id="body" class="b-element bg-sand" ng-app="leagueApp" ng-controller="leagueController">
        <div class="main-wrapper">
            <div>
							<div class="tab">
									<button class="tablinks" ng-click="getTeams()" onclick="openCity(event, 'Teams')">Teams</button>
									<button class="tablinks" ng-click="getSchedule()" onclick="openCity(event, 'Schedule')">Schedule</button>
									<button class="tablinks" ng-click="adminGetPlayers()" onclick="openCity(event, 'Players')">Players</button>
									<button class="tablinks" ng-click="getUnpaid()" onclick="openCity(event, 'Registrar')">Registrar</button>
									<button class="tablinks" ng-click="adminReadAdmins()" onclick="openCity(event, 'Admins')">Admins</button>
									<button ng-click="logout()" style="background: red; color: white;" class="tablinks">Logout</button>
							</div>
						</div>

            <div id="Teams" class="tabcontent">
                <section ng-init="getTeams(); getSchedule(); adminReadAdmins()" class=" bg-sand">
                    <div>
                        <div class="row">
                            <div class="col-md-2">
                                <h3>Team Form</h3>
                                <br>
                                <form id="teamCreate">
                                    <label>Team Name</label>
                                    <input type="text" id="teamName" class="form-control" placeholder="Team Name" autofocus>
                                    <input class="btn btn-lg btn-primary btn-block" type="submit" ng-click="adminAddTeam()" value="{{adminTeamBtn}}">
                                </form>
                            </div>
                            <div class="col-md-10">
                                <div class="member_desc">
                                    <input type="text" placeholder="Search" ng-model="searchTeams" class="form-control" style="width: 200px;">
																		<div class="table-responsive">
	                                    <table class="table">
	                                        <thead>
																							<tr>
																								<th></th>
		                                            <th>Team ID</th>
		                                            <th>Team Name</th>
		                                            <th></th>
		                                            <th></th>
																							</tr>
	                                        </thead>
	                                        <tbody>
	                                            <tr ng-repeat="x in teams">
																									<td class="table-index">{{$index + 1}}</td>
	                                                <td>{{x.team_id}}</td>
	                                                <td>{{x.team_name}}</td>
	                                                <td>
	                                                    <button ng-click="adminEditTeam(x.team_id, x.team_name)">edit</button>
	                                                </td>
	                                                <td>
	                                                    <button ng-click="adminDeleteTeam(x.team_id)">delete</button>
	                                                </td>
	                                            </tr>
	                                        </tbody>
	                                    </table>
																		</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div id="Schedule" class="tabcontent">
                <section ng-init="getSchedule(); getTeams()" class="bg-sand">
                    <div>
                        <div class="row">
                            <div class="col-md-2">
                                <h3>League Schedule</h3>
                                <br>
                                <form id="scheduleForm">
                                    <label>Team 1</label>
                                    <select ng-model="team1" id="team1" ng-change="scheduleTeamSelect()" class="form-control">
                                        <option ng-repeat="x in teams" value="{{x.team_id}}">{{x.team_name}}</option>
                                    </select>
                                    <label>Team 2</label>
                                    <select ng-model="team2" id="team2" ng-change="scheduleTeamSelect()" class="form-control">
                                        <option ng-repeat="x in teams" value="{{x.team_id}}">{{x.team_name}}</option>
                                    </select>
                                    <label>Team 1 Result</label>
                                    <input id="team1Result" type="number" min="0" class="form-control">
                                    <label>Team 2 Result</label>
                                    <input id="team2Result" type="number" min="0" class="form-control">
                                    <label>Game Date</label>
                                    <input id="scheduleDate" type="date" class="form-control">
                                    <label>Game Time</label>
                                    <input id="scheduleTime" type="time" class="form-control">
                                    <label>Game Location</label>
                                    <input id="scheduleLocation" type="text" class="form-control">
                                    <input class="btn btn-lg btn-primary btn-block" type="submit" ng-click="adminAddEditSchedule()" value="{{adminScheduleBtn}}">
                                </form>
                            </div>
                            <div class="col-md-10">
																<div class="table-responsive">
	                                <table class="table" style="overflow-x: scroll;">
	                                    <input type="text" placeholder="Search" ng-model="searchSchedule" class="form-control" style="width: 200px;">
	                                    <thead>
	                                        <tr>
																							<th></th>
	                                            <th>Game #</th>
	                                            <th>Teams</th>
	                                            <th>Date</th>
	                                            <th>Start Time</th>
	                                            <th>Location</th>
	                                            <th>Results</th>
	                                            <th>Winner</th>
	                                            <th></th>
	                                            <th></th>
																							<th></th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                        <tr ng-repeat="x in schedule | filter: searchSchedule">
																							<td class="table-index">{{$index + 1}}</td>
	                                            <th>{{x.game_id}}</th>
	                                            <td><strong>{{x.team1_name}}</strong>&nbsp;v.&nbsp;<strong>{{x.team2_name}}</strong></td>
	                                            <td>{{x.date}}</td>
	                                            <td>{{x.game_start}}</td>
	                                            <td>{{x.location}}</td>
	                                            <td>{{x.team1_result}} : {{x.team2_result}}</td>
	                                            <td><strong>{{x.winner_name}}</strong></td>
	                                            <td>
	                                                <button ng-click="adminEditSchedule(x.game_id, x.team1_id, x.team2_id, x.date, x.game_start, x.location, x.team1_result, x.team2_result)">edit</button>
	                                            </td>
	                                            <td>
	                                                <button ng-click="adminDeleteSchedule(x.game_id)">delete</button>
	                                            </td>
																							<td>
	                                                <button ng-click="addStatsModal(x.game_id, x.team1_id, x.team2_id)"
																									data-target="#addStatsModal"
																									data-toggle="modal">Add Stats</button>
	                                            </td>
	                                        </tr>
	                                    </tbody>
	                                </table>
																</div>
                            </div>
                        </div>
                    </div>
										<!-- Modal -->
										<div class="modal fade" id="addStatsModal" role="dialog">
											<div class="modal-dialog">
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<div class="modal-body">
														<form id="createStat">
															<label>Player</label>
															<select ng-model="playersSelect" id="playersSelect" class="form-control">
																	<option ng-repeat="x in playersStatsForm" value="{{x.player_id}}">{{x.first_name}} {{x.last_name}} [{{x.team_name}}]</option>
															</select>
															<label>Points</label>
															<input type="number" min="0" class="form-control" id="statsPoints">
															<label>Assists</label>
															<input type="number" min="0" class="form-control" id="statsAssists">
															<label>Rebounds</label>
															<input type="number" min="0" class="form-control" id="statsRebounds">
															<label>Blocks</label>
															<input type="number" min="0" class="form-control" id="statsBlocks">
															<label>Turnovers</label>
															<input type="number" min="0" class="form-control" id="statsTurnovers">
															<input class="form-control" type="submit" ng-click="adminAddStats()">
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>

											</div>
										</div>
                </section>
            </div>

            <div id="Players" class="tabcontent">
                <section ng-init="adminGetPlayers()" class=" bg-sand">
                    <div>
                        <div class="row">
                            <div class="col-md-2">
                                <h3>Players</h3>
                                <br>
                                <form id="playerCreate">
                                    <label>Player First Name</label>
                                    <input type="text" id="firstNamePlayer" class="form-control" autofocus>
                                    <label>Player Last Name</label>
                                    <input type="text" id="lastNamePlayer" class="form-control" autofocus>
                                    <label>Player email</label>
                                    <input type="email" id="emailPlayer" class="form-control" autofocus>
                                    <label>Team</label>
                                    <select ng-model="team_select" id="playerTeam" ng-change="scheduleTeamSelect()" class="form-control">
                                        <option ng-repeat="x in teams" value="{{x.team_id}}">{{x.team_name}}</option>
                                    </select>
                                    <label>Player #</label>
                                    <input type="number" min="0" class="form-control" id="playerNumber">
																		<label>Player Phone Number</label>
                                    <input type="text" id="phoneNumberPlayer" class="form-control" autofocus>
                                    <label>Player Address</label>
                                    <input type="text" id="addressPlayer" class="form-control" autofocus>

																		<label>Player Experience</label>
																		<input type="number" min="1" max="5" class="form-control" id="playerExperience">

																		<label>Age</label>
                                    <input type="number" min="1" class="form-control" id="playerAge">

                                    <input class="btn btn-lg btn-primary btn-block" type="submit" ng-click="adminCreateEditPlayer()" value="{{adminPlayerBtn}}">
                                </form>
                            </div>
                            <div class="col-md-10">
                                <div class="member_desc">
                                    <input type="text" placeholder="Search" ng-model="searchPlayers" class="form-control" style="width: 200px;">
																		<div class="table-responsive">
	                                    <table class="table">
	                                        <thead>
																							<tr>
																								<th></th>
		                                            <th>Player ID</th>
		                                            <th>Player Name</th>
		                                            <th>Email</th>
		                                            <th>Player #</th>
		                                            <th>Team</th>
																								<th>Address</th>
																								<th>Phone Number</th>
																								<th>Experience</th>
																								<th>Age</th>
		                                            <th></th>
		                                            <th></th>
																							</tr>
	                                        </thead>
	                                        <tbody>
	                                            <tr ng-repeat="x in adminPlayers | filter: searchPlayers">
																									<td class="table-index">{{$index + 1}}</td>
	                                                <td>{{x.player_id}}</td>
	                                                <td>{{x.first_name}} {{x.last_name}}</td>
	                                                <td>{{x.email}}</td>
	                                                <td>{{x.player_number}}</td>
	                                                <td>{{x.team_name}}</td>
																									<td>{{x.address}}</td>
																									<td>{{x.phone_number}}</td>
																									<td>{{x.experience}}</td>
																									<td>{{x.age}}</td>
	                                                <td>
	                                                    <button ng-click="adminEditPlayer(x)">edit</button>
	                                                </td>
	                                                <td>
	                                                    <button ng-click="adminDeletePlayer(x.player_id)">delete</button>
	                                                </td>
	                                            </tr>
	                                        </tbody>
	                                    </table>
																		</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
						<div id="Registrar" class="tabcontent">
								<section ng-init="getUnpaid()" class=" bg-sand">
										<div>
												<div class="row">
														<div class="col-md-12">
																<div class="member_desc">
																		<input type="text" placeholder="Search" ng-model="searchUnpaid" class="form-control" style="width: 200px;">
																		<div class="table-responsive">
																			<table class="table">
																					<thead>
																							<tr>
																								<th></th>
																								<th>Record ID</th>
																								<th>First Name</th>
																								<th>Last Name</th>
																								<th>Email</th>
																								<th>Team Name</th>
																								<th>Player Number</th>
																								<th>Address</th>
																								<th>Phone Number</th>
																								<th>Stars</th>
																								<th>Age</th>
																								<th>Paid</th>
																								<th></th>
																								<th></th>
																							</tr>
																					</thead>
																					<tbody>
																							<tr ng-repeat="x in unpaid | filter: searchUnpaid">
																									<td class="table-index">{{$index + 1}}</td>
																									<td>{{x.record_id}}</td>
																									<td>{{x.first_name}}</td>
																									<td>{{x.last_name}}</td>
																									<td>{{x.email}}</td>
																									<td>{{x.team_name}}</td>
																									<td>{{x.player_number}}</td>
																									<td>{{x.address}}</td>
																									<td>{{x.phone_number}}</td>
																									<td>{{x.experience}}</td>
																									<td>{{x.age}}</td>
																									<td>{{x.paid}}</td>
																									<td>
																											<button ng-click="adminPaidUnpaid(x.record_id)">paid</button>
																									</td>
																									<td>
																											<button ng-click="adminDeleteUnpaid(x.record_id)">delete</button>
																									</td>
																							</tr>
																					</tbody>
																			</table>
																		</div>
																</div>
														</div>
												</div>
										</div>
								</section>
						</div>
						<div id="Admins" class="tabcontent">
								<section ng-init="getUnpaid()" class=" bg-sand">
										<div>
												<div class="row">
													<div class="col-md-2">
															<h3>Admins</h3>
															<br>
															<form id="adminForm">
																	<label>Full Name</label>
																	<input type="text" id="adminFullName" class="form-control" autofocus>
																	<label>Email</label>
																	<input type="email" id="adminEmail" class="form-control" autofocus>
																	<label>Password</label>
																	<input type="text" id="adminPassword" class="form-control" autofocus>
																	<input class="btn btn-lg btn-primary btn-block" type="submit" ng-click="adminCreateEditUser()" value="{{adminUserBtn}}">
															</form>
													</div>
														<div class="col-md-10">
																<div class="member_desc">
																		<input type="text" placeholder="Search" ng-model="searchAdmins" class="form-control" style="width: 200px;">
																		<div class="table-responsive">
																			<table class="table">
																					<thead>
																							<tr>
																								<th></th>
																								<th>Admin ID</th>
																								<th>Full Name</th>
																								<th>Email</th>
																								<th></th>
																								<th></th>
																							</tr>
																					</thead>
																					<tbody>
																							<tr ng-repeat="x in admins | filter: searchAdmins">
																									<td class="table-index">{{$index + 1}}</td>
																									<td>{{x.admin_id}}</td>
																									<td>{{x.admin_name}}</td>
																									<td>{{x.admin_email}}</td>
																									<td>
																											<button ng-click="adminEdit(x)">Edit</button>
																									</td>
																									<td>
																											<button ng-click="adminDelete(x.admin_id)">Delete</button>
																									</td>
																							</tr>
																					</tbody>
																			</table>
																		</div>
																</div>
														</div>
												</div>
										</div>
								</section>
						</div>
        </div>

        <!-- JAVASCRIPTS -->
        <?php include "js-compile.php";?>
            <script>
                function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }
            </script>
            <style>
                /* Style the tab */

                .tab {
                    overflow: hidden;
                    border: 1px solid #ccc;
                    background-color: #f1f1f1;
                }
                /* Style the buttons inside the tab */

                .tab button {
                    background-color: inherit;
                    float: left;
                    border: none;
                    outline: none;
                    cursor: pointer;
                    padding: 14px 16px;
                    transition: 0.3s;
                    font-size: 17px;
                }
                /* Change background color of buttons on hover */

                .tab button:hover {
                    background-color: #ddd;
                }
                /* Create an active/current tablink class */

                .tab button.active {
                    background-color: #ccc;
                }
                /* Style the tab content */

                .tabcontent {
                    display: none;
                    padding: 6px 12px;
                    border-top: none;
                }
								.table-index {
									background: lightgray
								}
            </style>
    </body>

    </html>
