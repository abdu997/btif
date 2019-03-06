var app = angular.module('leagueApp', ['ngSanitize']);
app.controller('leagueController', function($scope, $http) {
  if(window.location.hostname === "localhost"){
    $scope.domain = 'http://localhost/btif';
    $scope.apiRoot = "http://localhost/btif/api/";
  } else {
    $scope.domain = window.location.hostname;
    $scope.apiRoot = "https://" + window.location.hostname.replace("www.", "") + "/api/";
  }

  $scope.contactFrom = function() {
    var name = document.getElementById("contactName").value;
    var email = document.getElementById("contactEmail").value;
    var message = document.getElementById("contactMessage").value;
    var phoneNumber = document.getElementById("phoneNumber").value;
    if (name == "") {
      alert("Name cannot be empty");
      return;
    }
    if (email == "") {
      alert("Email cannot be empty");
      return;
    }
    if (message == "") {
      alert("message cannot be empty");
      return;
    }
    $http.post($scope.apiRoot + "contact", {
      name: name,
      email: email,
      message: message,
      phone_number: phoneNumber,
    }).success(function(data) {
      if (data.status === "success") {
        document.getElementById("contactName").value = null;
        document.getElementById("contactEmail").value = null;
        document.getElementById("contactMessage").value = null;
        document.getElementById("phoneNumber").value = null;
        alert("Email Sent!");
      } else {
        alert(data.message);
      }
    });
  }

  $scope.joinTeam = function() {
    var firstName = document.getElementById("firstNameJoinTeam").value;
    var lastName = document.getElementById("lastNameJoinTeam").value;
    var email = document.getElementById("emailJoinTeam").value;
    var teamId = document.getElementById("teamJoinTeam").value;
    var playerNumber = document.getElementById("playerNumberJoinTeam").value;
    var waiver = document.getElementById("joinTeamWaiver").checked;

    var address = document.getElementById("address").value;
    var phoneNumber = document.getElementById("phoneNumber").value;
    var age = document.getElementById("age").value;
    var experience = document.getElementById("experience").value;

    function errorReporting(error) {
      $("#joinTeamError").removeClass("hidden");
      document.getElementById("joinTeamError").innerHTML = error;
    }
    if (firstName.length === 0) {
      errorReporting("First name cannot be empty");
      return;
    }
    if (lastName.length === 0) {
      errorReporting("Last name cannot be empty");
      return;
    }
    if (email.length === 0) {
      errorReporting("Email cannot be empty");
      return;
    }
    if (teamId === "? undefined:undefined ?") {
      errorReporting("You must select a team");
      return;
    }
    if (playerNumber.length === 0) {
      errorReporting("Player number cannot be empty");
      return;
    }
    if(playerNumber > 100 || playerNumber < 1){
      errorReporting("Player number must be between 1 and 100");
      return;
    }
    if (address.length === 0) {
      errorReporting("Address cannot be empty");
      return;
    }
    if (email.length === 0) {
      errorReporting("Email cannot be empty");
      return;
    }
    if (phoneNumber.length < 10 || phoneNumber.length > 12) {
      errorReporting("Please provide your 10 digit phone number");
      return;
    }
    if (age < 1) {
      errorReporting("Please provide your age");
      return;
    }
    if (experience < 1 || experience > 5) {
      errorReporting("Your experience rating must be between 1 and 5");
      return;
    }
    if(!waiver){
      errorReporting("You must agree to the waiver");
      return;
    }
    $http.post($scope.apiRoot + "joinTeam", {
      first_name: firstName,
      last_name: lastName,
      email: email,
      team_id: teamId,
      team_name: null,
      player_number: playerNumber,
      address: address,
      phone_number: phoneNumber,
      age: age,
      experience: experience,
    }).success(function(data) {
      if (data.status === "success") {
        $("#joinTeamError").addClass("success");
        errorReporting(data.status);
        document.getElementById("joinTeamForm").reset();
      } else {
        errorReporting(data.message);
      }
    });
  }

  $scope.getTeams = function(team_id) {
    $http.post($scope.apiRoot + "readTeams", {
      team_id: team_id
    }).success(function(data) {
      $scope.teams = data.result;
    });
  }

  $scope.teamSelect = function(team_id, index) {
    window.open('team/' + team_id, "_self");
  }

  $scope.getSchedule = function(team_id) {
    if(!team_id){
      team_id = null;
    }
    $http.post($scope.apiRoot + "readSchedule", {
      team_id: team_id
    }).success(function(data) {
      $scope.schedule = data.result;
    });
  }

  $scope.getStats = function(team_id) {
    $http.post($scope.apiRoot + "readPlayerStats", {
      team_id: team_id
    }).success(function(data) {
      $scope.stats = data.result;
    });
  }

  $scope.login = function() {
    var loginEmail = document.getElementById("loginEmail").value;
    var loginPassword = document.getElementById("loginPassword").value;
    $http.post($scope.apiRoot + "loginRequest", {
      email: loginEmail,
      password: loginPassword
    }).success(function(data) {
      if(data.status === "success"){
        window.location.href = "/";
      } else {
        document.getElementById("loginResponse").innerHTML = data.message;
      }
    });
  }

  $scope.logout = function() {
    $http.get($scope.apiRoot + "logout").success(function(data) {
      if(data.status === "success"){
        window.location.reload();
      }
    });
  }

	$scope.adminTeamBtn = "Create Team";
  $scope.adminAddTeam = function() {
    var teamName = document.getElementById("teamName").value;
    if(teamName.length === 0){
      return;
    }
    $http.post($scope.apiRoot + "adminCreateEditTeam", {
      form_button: $scope.adminTeamBtn,
      team_id: $scope.adminEditTeamId,
      team_name: teamName
    }).success(function(data){
      if (data.status === "success") {
        $scope.getTeams();
        $scope.adminTeamBtn = "Create Team";
        document.getElementById("teamCreate").reset();
      } else {
        alert(data.message);
      }
    })
  }

  $scope.adminEditTeam = function(team_id, team_name) {
    $scope.adminTeamBtn = "Edit";
    $scope.adminEditTeamId = team_id;
    document.getElementById("teamName").value = team_name;
  }

  $scope.adminDeleteTeam = function(team_id) {
    if(!confirm("Are you sure you want to delete this team? It cannot be restored, and players connected to this team will lose their connection.")) {
      return;
    }
    $http.post($scope.apiRoot + "adminDeleteTeam", {
      team_id: team_id
    }).success(function(data){
      if(data.status === "success") {
        $scope.getTeams();
      } else {
        alert(data.message);
      }
    })
  }

  $scope.scheduleTeamSelect = function() {
    var team1 =  document.getElementById("team1").value;
    var team2 =  document.getElementById("team2").value;
    if(team1 === team2){
      document.getElementById("team2").value = null;
    }
  }

  $scope.adminScheduleBtn = "Add";
  $scope.adminAddEditSchedule = function(){
    var team1 = document.getElementById("team1").value;
    var team2 = document.getElementById("team2").value;
    var team1Result = document.getElementById("team1Result").value;
    var team2Result = document.getElementById("team2Result").value;
    var scheduleDate = document.getElementById("scheduleDate").value;
    var scheduleTime = document.getElementById("scheduleTime").value;
    var scheduleLocation = document.getElementById("scheduleLocation").value;
    if(!$scope.game_id){
      $scope.game_id = null;
    }
    $http.post($scope.apiRoot + "adminAddEditSchedule", {
      game_id: $scope.game_id,
      action: $scope.adminScheduleBtn,
      team1: team1,
      team2: team2,
      team1Result: team1Result,
      team2Result: team2Result,
      scheduleDate: scheduleDate,
      scheduleTime: scheduleTime,
      scheduleLocation: scheduleLocation
    }).success(function(data){
      if(data.status === "success") {
        $scope.getSchedule();
        $scope.adminScheduleBtn = "Add";
        document.getElementById("scheduleForm").reset();
      } else {
        alert(data.message);
      }
    })
    $scope.getSchedule();
    $scope.adminScheduleBtn = "Add";
    document.getElementById("scheduleForm").reset();
  }

  $scope.adminEditSchedule = function(game_id, team1_name, team2_name, date, game_start, location, team1_result, team2_result) {
    $scope.game_id = game_id;
    if(date === "TBD"){
      var date = null;
    }
    if(game_start === "TBD"){
      var game_start = null;
    }
    if(location === "TBD"){
      var location = null;
    }
    if(team1_result === "TBD"){
      var team1_result = null;
      var team2_result = null;
    }
    $scope.adminScheduleBtn = "Edit";
    document.getElementById("team1").value = team1_name;
    document.getElementById("team2").value = team2_name;
    document.getElementById("team1Result").value = team1_result;
    document.getElementById("team2Result").value = team2_result;
    document.getElementById("scheduleDate").value = date;
    document.getElementById("scheduleTime").value = game_start;
    document.getElementById("scheduleLocation").value = location;
  }

  $scope.adminDeleteSchedule = function(game_id) {
    $http.post($scope.apiRoot + "adminDeleteSchedule", {
      game_id: game_id
    }).success(function(data){
      if(data.status === "success") {
        $scope.getSchedule();
      } else {
        alert(data.message);
      }
    })
  }

  $scope.adminGetPlayers =  function(){
    $http.get($scope.apiRoot + "adminReadPlayers").success(
      function(data) {
        $scope.adminPlayers = data.result;
      }
    )
  }

  $scope.adminPlayerBtn = "Add";
  $scope.adminCreateEditPlayer = function(){
    $http.post($scope.apiRoot + "adminCreateEditPlayer", {
      player_id: $scope.player_id,
      action: $scope.adminPlayerBtn,
      first_name: document.getElementById("firstNamePlayer").value,
      last_name: document.getElementById("lastNamePlayer").value,
      email: document.getElementById("emailPlayer").value,
      team_id: document.getElementById("playerTeam").value,
      player_number: document.getElementById("playerNumber").value,
      phone_number: document.getElementById("phoneNumberPlayer").value,
      address: document.getElementById("addressPlayer").value,
      experience: document.getElementById("playerExperience").value,
      age: document.getElementById("playerAge").value,
    }).success(function(data){
      if(data.status === "success"){
        $scope.adminGetPlayers();
        $scope.adminPlayerBtn = "Add";
        document.getElementById("playerCreate").reset();
      } else {
        alert(data.message);
      }
    })
  }

  $scope.adminEditPlayer = function(player){
    $scope.player_id = player.player_id;
    $scope.adminPlayerBtn = "Edit";
    document.getElementById("firstNamePlayer").value = player.first_name;
    document.getElementById("lastNamePlayer").value = player.last_name;
    document.getElementById("emailPlayer").value = player.email;
    document.getElementById("playerTeam").value = player.team_id;
    document.getElementById("playerNumber").value = player.player_number;

    document.getElementById("phoneNumberPlayer").value = player.phone_number;
    document.getElementById("addressPlayer").value = player.address;
    document.getElementById("playerExperience").value = player.experience;
    document.getElementById("playerAge").value = player.age;

  }

  $scope.adminDeletePlayer = function(player_id) {
    $http.post($scope.apiRoot + "adminDeletePlayer", {
      player_id: player_id
    }).success(function(data){
      if(data.status === "success") {
        $scope.adminGetPlayers();
      } else {
        alert(data.message);
      }
    })
  }

  $scope.addStatsModal = function(game_id, team1_id, team2_id) {
    $scope.game_id = game_id;
    $scope.playersStatsForm = [];
    $scope.team1_id = team1_id;
    $scope.team2_id = team2_id;
    $scope.adminPlayers.forEach($scope.playerStatsLoop);
  }

  $scope.playerStatsLoop = function(item){
    if(item.team_id === $scope.team1_id || item.team_id === $scope.team2_id){
      var output = [];
      output['team_name'] = item.team_name;
      output['player_id'] = item.player_id;
      output['first_name'] = item.first_name;
      output['last_name'] = item.last_name;
      output['team_id'] = item.team_id;
      $scope.playersStatsForm.push(output);
    }
  }

  $scope.adminAddStats = function() {
    var player_id = document.getElementById("playersSelect").value;
    var points = document.getElementById("statsPoints").value;
    var assists = document.getElementById("statsAssists").value;
    var rebounds = document.getElementById("statsRebounds").value;
    var blocks = document.getElementById("statsBlocks").value;
    var turnovers = document.getElementById("statsTurnovers").value;

    $http.post($scope.apiRoot + "adminCreateStat", {
      game_id: $scope.game_id,
      player_id: player_id,
      points: points,
      assists: assists,
      rebounds: rebounds,
      blocks: blocks,
      turnovers: turnovers
    }).success(function(data){
      if(data.status === "success"){
        document.getElementById("createStat").reset();
      } else {
        alert(data.message);
      }
    })
  }

  $scope.getUnpaid = function(){
    $http.get($scope.apiRoot + "adminReadUnpaid").success(function(data){
      $scope.unpaid = data.result;
    })
  }

  $scope.adminDeleteUnpaid = function(record_id){
    $http.post($scope.apiRoot + "adminDeleteUnpaid", {
      record_id: record_id
    }).success(function(data){
      if(data.status === "success") {
        $scope.getUnpaid();
      } else {
        alert(data.message);
      }
    })
  }

  $scope.adminPaidUnpaid = function(record_id){
    $http.post($scope.apiRoot + "adminPaidUnpaid", {
      record_id: record_id
    }).success(function(data){
      if(data.status === "success") {
        $scope.getUnpaid();
      } else {
        alert(data.message);
      }
    })
  }

  $scope.adminReadAdmins = function(){
    $http.get($scope.apiRoot + "readAdmins").success(function(data){
      if(data.status === "success") {
        $scope.admins = data.result;
      } else {
        alert(data.message);
      }
    })
  }

  $scope.adminUserBtn = "Add";
  $scope.adminCreateEditUser = function(){
    if($scope.adminUserBtn === "Add"){
      $scope.adminCreateUser();
    } else if($scope.adminUserBtn === "Edit"){
      $scope.adminEditUser();
    }
  }

  $scope.adminCreateUser = function(){
    var fullName = document.getElementById("adminFullName").value;
    var email = document.getElementById("adminEmail").value;
    var password = document.getElementById("adminPassword").value;

    $http.post($scope.apiRoot + "createAdmin", {
      admin_name: fullName,
      admin_email: email,
      password: password
    }).success(function (data){
      if(data.status === "success"){
        document.getElementById("adminForm").reset();
        $scope.adminReadAdmins();
      } else {
        alert(data.message);
      }
    });
  }

  $scope.adminEditUser = function(){
    var fullName = document.getElementById("adminFullName").value;
    var email = document.getElementById("adminEmail").value;
    var password = document.getElementById("adminPassword").value;

    $http.post($scope.apiRoot + "updateAdmin", {
      admin_id: $scope.adminId,
      admin_name: fullName,
      admin_email: email,
      password: password
    }).success(function (data){
      if(data.status === "success"){
        $scope.adminReadAdmins();
        $scope.adminUserBtn = "Add";
        document.getElementById("adminForm").reset();
      } else {
        alert(data.message);
      }
    });
  }

  $scope.adminEdit = function(admin){
    document.getElementById("adminFullName").value = admin.admin_name;
    document.getElementById("adminEmail").value = admin.admin_email;
    $scope.adminUserBtn = "Edit";
    $scope.adminId = admin.admin_id;
  }

  $scope.adminDelete = function(admin_id){
    $http.post($scope.apiRoot + "deleteAdmin", {
      admin_id: admin_id,
    }).success(function(data){
      if(data.status === "success"){
        $scope.adminReadAdmins();
      } else {
        alert(data.message);
      }
    });
  }
});
