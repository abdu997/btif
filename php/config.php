<?php
session_start();
error_log(isset($_SESSION['admin_id']));
/**
 * PHP backend code folders
 *
 *
 */
$GLOBALS['folders'] =  [
  'Providers',
  'Controllers',
  'Utilities'
];
/**
 * List of routes to dependency autoloads
 *
 *
 */
$GLOBALS['dep'] =  [
  'vendor/autoload.php',
];

/**
 * DB config
 *
 * @var [type]
 */
$GLOBALS['error_reporting'] = false;
$GLOBALS['DB'] =  [
  [
    'condition' => $_SERVER['SERVER_NAME'] === "localhost",
    'servername' => 'localhost',
    'username' => 'root',
    'password' => '',
    'db' => 'btif'
  ],
  [
    'condition' => $_SERVER['SERVER_NAME'] === "app.balltillifall.ca",
    'servername' => 'localhost',
    'username' => 'btif_league_user',
    'password' => '.61u?]thdf]U',
    'db' => 'btif_league_manager'
  ],
];

$GLOBALS['timezone'] =  'America/New_York';

/**
 * Router values
 *
 */
$GLOBALS['allowed_hostnames'] =  [
  "http://localhost",
  "https://balltillifall.ca",
  "https://app.balltillifall.ca",
];
$GLOBALS['Access_Control_Allow_Credentials'] =  true;
$GLOBALS['auth_groups'] =  [
  [
    'auth_ref' => 'public',
    'condition' => true,
  ],
  [
    'auth_ref' => 'admin',
    'condition' => isset($_SESSION["admin_id"]),
  ],
];
$GLOBALS['routes'] =  [
  [
    'type' => 'api',
    'route' => '/api/readTeams',
    'callback' => 'PublicController::readTeams',
    'auth' => ['public'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/readSchedule',
    'callback' => 'PublicController::readSchedule',
    'auth' => ['public'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/readPlayerStats',
    'callback' => 'PublicController::readPlayerStats',
    'auth' => ['public'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/loginRequest',
    'callback' => 'PublicController::loginRequest',
    'auth' => ['public'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/logout',
    'callback' => 'AdminController::logout',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'GET'
  ],
  [
    'type' => 'api',
    'route' => '/api/createTeam',
    'callback' => 'PublicController::createTeam',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/joinTeam',
    'callback' => 'PublicController::joinTeam',
    'auth' => ['public'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/adminCreateEditTeam',
    'callback' => 'AdminController::adminCreateEditTeam',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/adminDeleteTeam',
    'callback' => 'AdminController::adminDeleteTeam',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/adminAddEditSchedule',
    'callback' => 'AdminController::adminAddEditSchedule',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/adminDeleteSchedule',
    'callback' => 'AdminController::adminDeleteSchedule',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/adminCreateEditPlayer',
    'callback' => 'AdminController::adminCreateEditPlayer',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/adminReadPlayers',
    'callback' => 'AdminController::adminReadPlayers',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'GET'
  ],
  [
    'type' => 'api',
    'route' => '/api/adminDeletePlayer',
    'callback' => 'AdminController::adminDeletePlayer',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/adminCreateStat',
    'callback' => 'AdminController::adminCreateStat',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/adminReadUnpaid',
    'callback' => 'AdminController::adminReadUnpaid',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'GET'
  ],
  [
    'type' => 'api',
    'route' => '/api/adminDeleteUnpaid',
    'callback' => 'AdminController::adminDeleteUnpaid',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/adminPaidUnpaid',
    'callback' => 'AdminController::adminPaidUnpaid',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/contact',
    'callback' => 'PublicController::contact',
    'auth' => ['public'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/readAdmins',
    'callback' => 'AdminController::readAdmins',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'GET'
  ],
  [
    'type' => 'api',
    'route' => '/api/createAdmin',
    'callback' => 'AdminController::createAdmin',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/deleteAdmin',
    'callback' => 'AdminController::deleteAdmin',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'api',
    'route' => '/api/updateAdmin',
    'callback' => 'AdminController::updateAdmin',
    'auth' => ['admin'],
    'REQUEST_METHOD' => 'POST'
  ],
  [
    'type' => 'view',
    'route' => '/^\/(js|css|plugins|img|theme)\/(.*)/',
    'auth' => ['public'],
    'filename' => '/$1/$2',
  ],
  [
    'type' => 'view',
    'route' => '/login',
    'auth' => ['public'],
    'filename' => 'login.php',
  ],
  [
    'type' => 'view',
    'route' => '/',
    'auth' => ['admin'],
    'filename' => 'dashboard.php',
    'auth_fail_redirect' => '/btif/login'
  ],
  [
    'type' => 'view',
    'route' => '/schedule',
    'auth' => ['public'],
    'filename' => 'schedule.php',
  ],
  [
    'type' => 'view',
    'route' => '/teams',
    'auth' => ['public'],
    'filename' => 'teams.php',
  ],
  [
    'type' => 'view',
    'route' => '/night-register',
    'auth' => ['public'],
    'filename' => 'night-register.php',
  ],
  [
    'type' => 'view',
    'route' => '/^\/team\/(.*)/',
    'auth' => ['public'],
    'filename' => 'team.php',
  ],
];

/**
 * Values required for pre-installed Utilities
 *
 */
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

/**
 * Functions to run before App runs
 *
 */
 if($_SERVER['SERVER_NAME'] === "localhost"){
   $_SERVER['REQUEST_URI'] = str_replace('/btif', '', $_SERVER['REQUEST_URI']);
 }
 error_log($_SERVER['REQUEST_URI']);
 include_once 'Utilities/Data.php';
 $_POST = Utilities\Data::convertObjToArr(json_decode(file_get_contents("php://input")));
