<?php 
require 'config.php';
require 'Carbon/autoload.php';

use Carbon\Carbon;
use Carbon\CarbonInterval;

printf("Now: %s", Carbon::now('Asia/Ho_Chi_Minh'));

?>