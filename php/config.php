<?php
// PHP backend code folders
$GLOBALS['folders'] =  [
  'Providers',
  'Controllers'
];

//Dependencies
$GLOBALS['dep'] =  [

];

//DB
$GLOBALS['DB'] =  [
  [
    'condition' => $_SERVER['SERVER_NAME'] === "localhost",
    'servername' => 'localhost',
    'username' => 'root',
    'password' => '',
    'db' => 'btif'
  ],
  [
    'condition' => $_SERVER['SERVER_NAME'] === "balltillifall.ca",
    'servername' => 'localhost',
    'username' => 'btif_league_user',
    'password' => '.61u?]thdf]U',
    'db' => 'btif_league_manager'
  ],
];

$GLOBALS['timezone'] =  'America/New_York';

// Mail
$GLOBALS['email'] =  "";
$GLOBALS['host'] =  "";
$GLOBALS['password'] =  "";
$GLOBALS['from_name'] =  "";

$GLOBALS['logo_url'] =  "";
$GLOBALS['primary_colour'] = "";
$GLOBALS['secondary_colour'] = "";



// Twilio
$GLOBALS['sid'] =  "";
$GLOBALS['token'] =  "";
$GLOBALS['number'] =  "";

// Router
$GLOBALS['allowed_hostnames'] =  [
  "http://localhost",
  "http://balltillifall.ca"
];
$GLOBALS['Access_Control_Allow_Credentials'] =  true;
$GLOBALS['auth_groups'] =  [
  [
    'auth_ref' => 'public',
    'condition' => true,
  ],
  [
    'auth_ref' => 'admin',
    'condition' => isset($_SESSION['admin_id']) === true,
  ],
];
$GLOBALS['api'] =  [
  [

    'route' => 'readTeams',
    'callback' => 'PublicController::readTeams',
    'auth' => ['public'],
    'REQUEST_METHOD' => 'POST'
  ],
  [

    'route' => 'readSchedule',
    'callback' => 'PublicController::readSchedule',
    'auth' => ['public'],
    'REQUEST_METHOD' => 'POST'
  ],
  [

    'route' => 'readPlayerStats',
    'callback' => 'PublicController::readPlayerStats',
    'auth' => ['public'],
    'REQUEST_METHOD' => 'POST'
  ],
  [

    'route' => 'loginRequest',
    'callback' => 'PublicController::loginRequest',
    'auth' => ['public'],
    'REQUEST_METHOD' => 'POST'
  ],
  [

    'route' => 'logout',
    'callback' => 'AdminController::logout',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'GET'
  ],
  [

    'route' => 'createTeam',
    'callback' => 'PublicController::createTeam',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [

    'route' => 'joinTeam',
    'callback' => 'PublicController::joinTeam',
    'auth' => ['public'],
    'REQUEST_METHOD' => 'POST'
  ],
  [

    'route' => 'adminCreateEditTeam',
    'callback' => 'AdminController::adminCreateEditTeam',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [

    'route' => 'adminDeleteTeam',
    'callback' => 'AdminController::adminDeleteTeam',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [

    'route' => 'adminAddEditSchedule',
    'callback' => 'AdminController::adminAddEditSchedule',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'route' => 'adminDeleteSchedule',
    'callback' => 'AdminController::adminDeleteSchedule',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'route' => 'adminCreateEditPlayer',
    'callback' => 'AdminController::adminCreateEditPlayer',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'route' => 'adminReadPlayers',
    'callback' => 'AdminController::adminReadPlayers',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'GET'
  ],
  [
    'route' => 'adminDeletePlayer',
    'callback' => 'AdminController::adminDeletePlayer',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'route' => 'adminCreateStat',
    'callback' => 'AdminController::adminCreateStat',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'route' => 'adminReadUnpaid',
    'callback' => 'AdminController::adminReadUnpaid',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'GET'
  ],
  [
    'route' => 'adminDeleteUnpaid',
    'callback' => 'AdminController::adminDeleteUnpaid',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'route' => 'adminPaidUnpaid',
    'callback' => 'AdminController::adminPaidUnpaid',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'route' => 'contact',
    'callback' => 'PublicController::contact',
    'auth' => ['public'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'route' => 'readAdmins',
    'callback' => 'AdminController::readAdmins',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'GET'
  ],
  [
    'route' => 'createAdmin',
    'callback' => 'AdminController::createAdmin',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'route' => 'deleteAdmin',
    'callback' => 'AdminController::deleteAdmin',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'route' => 'updateAdmin',
    'callback' => 'AdminController::updateAdmin',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
];
$GLOBALS['views'] =  [

];
