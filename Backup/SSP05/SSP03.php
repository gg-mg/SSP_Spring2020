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


echo fn_tableOpen("CS2623: George Gichuki Weekday Planner");
echo "<br>"; //note the the echo "<br>" has to be here to work as required.

$count =1;

while($count < 6){
    if ($count==date('N')) {
        echo fn_tableRowCurrent(fn_dayOfWeek($count), fn_dayDetails($count), fn_dayTime($count));
    }else
    {
        echo fn_tableRow(fn_dayOfWeek($count), fn_dayDetails($count), fn_dayTime($count));
    }
    $count ++;
}
   

$myCounter = date('N');
echo fn_tableOpen("CS2623: George Gichuki To-Do Planner");
echo "<br>"; //note the the echo "<br>" has to be here to work as required.


Do
{
    if ($myCounter==date('N')) {
        echo fn_tableRowCurrent(fn_dayOfWeek($myCounter), fn_dayDetails($myCounter), fn_dayTime($myCounter));
    }else
    {
        echo fn_tableRow(fn_dayOfWeek($myCounter), fn_dayDetails($myCounter), fn_dayTime($myCounter));
    }
    $myCounter ++;
} While($myCounter <8);


echo fn_tableClose();


?> 
</main>

<?php include "PHP/include_footer.php";?>


