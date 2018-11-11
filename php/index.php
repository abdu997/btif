<?
// DEV INDEX
include 'config.php';
array_push($GLOBALS['folders'], 'Prism');
foreach($GLOBALS['folders'] as $folder){
  foreach(glob($folder.'/*.php') as $file){
    include $file;
  }
}
$_POST = Prism\Data::convertObjToArr(json_decode(file_get_contents("php://input")));
print Prism\Router::enable();
