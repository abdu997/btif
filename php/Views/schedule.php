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
        <section class="home-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="color: black">
                      <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Game #</th>
                                    <th>Teams</th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>Location</th>
									<th>Results</th>
									<th>Winner</th>
                                </tr>
                            </thead>
                            <tbody ng-init="getSchedule()">
                                <tr ng-repeat="x in schedule">
                                    <th>{{x.game_id}}</th>
                                    <td><strong>{{x.team1_name}}</strong>&nbsp;v.&nbsp;<strong>{{x.team2_name}}</strong></td>
									<td>{{x.date}}</td>
                                    <td>{{x.game_start}}</td>
                                    <td>{{x.location}}</td>
									<td>{{x.team1_result}} : {{x.team2_result}}</td>
									<td><strong>{{x.winner_name}}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
    </div>


    <!-- JAVASCRIPTS -->
    <?php include "js-compile.php";?>

</body>

</html>
