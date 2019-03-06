<?php

namespace Controllers;

use Providers\Functions;

class AdminController
{
  public static function logout(){
  	if(session_destroy()){
      return ['status' => 'success'];
    }
  }

  public static function sessionExists()
  {
    return isset($_SESSION['admin_id']);
  }

  public static function adminCreateEditTeam(){
    $team_name = $_POST['team_name'];
    if($_POST['form_button'] === "Edit") {
      $team_id = $_POST['team_id'];
      return Functions::adminUpdateTeam($team_id, $team_name);
    } else {
      return Functions::adminCreateTeam($team_name);
    }
  }

  public static function adminDeleteTeam(){
    $team_id = $_POST['team_id'];
    return Functions::adminDeleteTeam($team_id);
  }

  public static function adminAddEditSchedule(){
    $action = $_POST['action'];
    $team1 = $_POST['team1'];
    $team2 = $_POST['team2'];
    $team1Result = $_POST['team1Result'];
    $team2Result = $_POST['team2Result'];
    $scheduleDate = $_POST['scheduleDate'];
    $scheduleTime = $_POST['scheduleTime'];
    $scheduleLocation = $_POST['scheduleLocation'];
    if($action === "Edit"){
      $game_id = $_POST['game_id'];
      return Functions::adminUpdateSchedule($game_id, $team1, $team2, $team1Result, $team2Result, $scheduleDate, $scheduleTime, $scheduleLocation);
    } else {
      return Functions::adminCreateSchedule($team1, $team2, $team1Result, $team2Result, $scheduleDate, $scheduleTime, $scheduleLocation);
    }
  }

  public static function adminDeleteSchedule(){
    $game_id = $_POST['game_id'];
    return Functions::adminDeleteSchedule($game_id);
  }

  public static function adminReadPlayers(){
    return Functions::adminReadPlayers();
  }

  public static function adminCreateEditPlayer(){
    $action = $_POST['action'];
    $player_first_name = $_POST['first_name'];
    $player_last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $team_id = $_POST['team_id'];
    $player_number = $_POST['player_number'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $age = $_POST['age'];
    $experience = $_POST['experience'];
    if($action === "Edit"){
      $player_id = $_POST['player_id'];
      return Functions::adminUpdatePlayer($player_id, $player_first_name, $player_last_name, $email, $team_id, $player_number, $address, $phone_number, $age, $experience);
    } else {
      return Functions::adminCreatePlayer($player_first_name, $player_last_name, $email, $team_id, $player_number, $address, $phone_number, $age, $experience);
    }
  }

  public static function adminDeletePlayer(){
    $player_id = $_POST['player_id'];
    return Functions::adminDeletePlayer($player_id);
  }

  public static function adminCreateStat(){
    $game_id = $_POST['game_id'];
    $player_id = $_POST['player_id'];
    $points = $_POST['points'];
    $assists = $_POST['assists'];
    $rebounds = $_POST['rebounds'];
    $blocks = $_POST['blocks'];
    $turnovers = $_POST['turnovers'];
    return Functions::adminCreateStat($game_id, $player_id, $points, $assists, $rebounds, $blocks, $turnovers);
  }

  public static function adminReadUnpaid(){
    return Functions::adminReadUnpaid();
  }

  public static function adminDeleteUnpaid(){
    $record_id = $_POST['record_id'];
    if(Functions::getRecord($record_id)['paid'] === "true"){
      return [
        'status' => 'error',
        'message' => 'Cannot delete paid record'
      ];
    }
    return Functions::adminDeleteUnpaid($record_id);
  }

  public static function adminPaidUnpaid()
  {
    $record_id = $_POST['record_id'];
    $return = Functions::processUnpaid($record_id);
    return $return;
  }

  public static function readAdmins()
  {
    return Functions::getAdmins();
  }

  public static function createAdmin()
  {
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $password = $_POST['password'];
    return Functions::createAdmin($admin_name, $admin_email, $password);
  }

  public static function updateAdmin()
  {
    $admin_id = $_POST['admin_id'];
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $password = $_POST['password'];
    return Functions::updateAdmin($admin_id, $admin_name, $admin_email, $password);
  }

  public static function deleteAdmin()
  {
    $admin_id = $_POST['admin_id'];
    return Functions::deleteAdmin($admin_id);
  }
}
