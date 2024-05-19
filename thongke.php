<?php 
require 'config.php';
require 'Carbon/autoload.php';

use Carbon\Carbon;
use Carbon\CarbonInterval;

printf("Now: %s", Carbon::now('Asia/Ha-Noi'));

printf("1 day: %s", CarbonInterval::day()->forHumans());
?>