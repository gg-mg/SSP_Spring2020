<?php include "PHP/include_header.php";?>

<!-- navigation -->
<?php include "PHP/include_leftNav.php";?>
<?php include "PHP/include_topNav.php";?>  

 <main>
<?php
$current_date = date('D');

require_once('FUNCTIONS/functions_ssp03.php');

echo fn_tableOpen("CS2623: George Gichuki Weekly Planner");

for($counter =1; $counter< 8; $counter++){
if ($counter==date('N')) {
    echo fn_tableRowCurrent(fn_dayOfWeek($counter), fn_dayDetails($counter), fn_dayTime($counter));
}else
{
    echo fn_tableRow(fn_dayOfWeek($counter), fn_dayDetails($counter), fn_dayTime($counter));
}

}
echo fn_tableClose();
 ?> 

</main>
<?php include "PHP/include_footer.php";?>


