<?php
require_once("config/config.php");
spl_autoload_register("autoloader");
function autoloader($class) {
  $dirs = array(
    'controllers/',
    'models/',
    'core/'
  );
  $class = strtolower($class);
  foreach ($dirs as $location) {
    if(file_exists(__DIR__.'/'.$location.$class.'.php')) {
      require_once(__DIR__.'/'.$location.$class.'.php');
      break;
    }
  }
}
Route::init();
?>
