<?php

function fn_tableOpen($caption)
{
$htmlCode=
'
<table class="sspTable">
<caption>'.$caption.'</caption>

 <tr>
    <th>Day of Week</th>
    <th>Task</th>
    <th>Time (Hrs)</th>
</tr>
';
    return $htmlCode;   
}
;

function fn_tableClose(){
    echo
'</table>
 <br>
<br>'
;
}
;

function fn_tableRowCurrent($parameter1, $parameter2, $parameter3)
{
    
    echo
    '  
     <tr id="current">
        <td>'.$parameter1.'</td>
        <td>'.$parameter2.'</td>
        <td>'.$parameter3.'</td>
    </tr>
    ';
}
;

function fn_tableRow($parameter5, $parameter6, $parameter7)
{
    echo
    '  
    <tr>
        <td>'.$parameter5.'</td>
        <td>'.$parameter6.'</td>
        <td>'.$parameter7.'</td>
    </tr>
    ';
}
;
function fn_dayofWeek($day){         
   
    if ($day == 1){
        return 'Monday';
    }
   
    if ($day == 2){
        return 'Tuesday';
    }
   
    if ($day == 3){
        return 'Wednesday';
    }
    
    if ($day == 4){
        return 'Thursday';
    }
 
    if ($day == 5){
        return 'Friday';
    }
    
    if ($day == 6){
        return 'Saturday';
    }
  
    if ($day == 7){
        return 'Sunday';
    }
         
 }
 ;
 function fn_dayDetails($dayOfWeek){   
    switch ($dayOfWeek){
 
     case 1:      
           $message= "revision work";
     break;
     case 2:
        $message = 'intense reading';
     break;
     case 3:
         $message = 'light reading';
     break;
     case 4:
        $message = 'projects';
     break;
     case 5:
         $message= 'trans-night';
     break;
     case 6:
         $message = 'No School work: take my sons out to play';
     break;
     case 7:
         $message = 'No school work: golf';
     break;
    }
         return $message;
         
}
;
 function fn_dayTime($day){         
   
    if ($day == 1){
        return '1 Hr';
    }
   
    if ($day == 2){
        return '4 Hrs';
    }
   
    if ($day == 3){
        return '2 Hrs';
    }
    
    if ($day == 4){
        return '2 Hrs';
    }
 
    if ($day == 5){
        return '4 Hrs';
    }
    
    if ($day == 6){
        return '0 Hrs';
    }
  
    if ($day == 7){
        return '0 Hrs';
    }
         
 }
 ;
?>