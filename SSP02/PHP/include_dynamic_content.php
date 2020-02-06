
<?php
echo
"
<table>
<caption>CS2623 Weekly Planner: George Gichuki</caption>
";
echo
"
 <tr>
    <th>Day of Week</th>
    <th>Task</th>
    <th>Time (hrs)</th>
</tr>
";
for ($counter = 1;$counter < 8;$counter++) {
    echo
"
 <tr>
    <td>$counter</td>
    <td>Study for CS2623</td>
    <td> " .$counter*.5." </td>
</tr>
";
}

echo
"
</table>
";
?>


