<?php 
    require('../advance-admin/carbon/autoload.php');
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    
    printf("Now: %s", Carbon::now('Asia/Bangkok'));

    // printf("1 day: %s", CarbonInterval::day()->forHumans());    
?>