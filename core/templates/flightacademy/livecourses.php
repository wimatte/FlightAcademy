<?php 
if($ondaclasses)
{ 
?>
<h3>Upcoming Live Training Courses</h3>

<table class="academytable02">
<tr>
<td>Title</td>
<td>Date</td>
<td>Starttime</td>
<td>Difficulty</td>
<td>Required Rank</td>
<td>Info</td>
</tr>
<?php 
foreach($ondaclasses as $class)
{
$rankrequired = RanksData::getRankInfo($class->ranklevel);
if($class->ranklevel == '0')
{
$rankrequired->rank = "None";
}
?>
<tr>
<td><?php echo $class->traname; ?></td>
<td><?php echo $class->startdate; ?></td>
<td><?php echo $class->starttime; ?></td>
<td style="width:200px;"><?php 
 if($class->difficultylevel == "1") { 
                         echo "Easy";
                         }
                         if($class->difficultylevel == "2") { 
                         echo "Intermediate";
                         }
                         if($class->difficultylevel == "3") { 
                         echo "Advanced";
                         }
                         if($class->difficultylevel == "4") { 
                         echo "Expert";
                         }
                         ?>
</td>
<td style="width:200px;"><?php echo $rankrequired->rank; ?></td>
<td style="width:150px;"><a href="<?php echo SITE_URL; ?>/index.php/FlightAcademy/classinfo_onda/<?php echo $class->id; ?>" class="stdbutton">More Info</a></td>
</tr><?php } ?>
</table>
<?php } ?>


<?php if($myonda) { ?>
<br /><hr /><br />
<?php } ?>


<h3>My Upcoming Live Training Courses</h3>
<table class="academytable02">
<tr>
<td>Title</td>
<td>Date</td>
<td>Starttime</td>
<td>Difficulty</td>
<td>Required Rank</td>
<td>Info</td>
</tr>
<?php 
if(!$myonda)
{ echo "<tr><td colspan='10'>I have currently not signed up for any live training courses!</td></tr>"; }
else
foreach($myonda as $class)
{
$rankrequired = RanksData::getRankInfo($class->ranklevel);
if($class->ranklevel == '0')
{
$rankrequired->rank = "None";
}
?>
<tr>
<td><?php echo $class->traname; ?></td>
<td><?php echo $class->startdate; ?></td>
<td><?php echo $class->starttime; ?></td>
<td style="width:200px;"><?php 
 if($class->difficultylevel == "1") { 
                         echo "Easy";
                         }
                         if($class->difficultylevel == "2") { 
                         echo "Intermediate";
                         }
                         if($class->difficultylevel == "3") { 
                         echo "Advanced";
                         }
                         if($class->difficultylevel == "4") { 
                         echo "Expert";
                         }
                         ?>
</td>
<td style="width:200px;"><?php echo $rankrequired->rank; ?></td>
<td style="width:150px;"><a href="<?php echo SITE_URL; ?>/index.php/FlightAcademy/ondastuff/<?php echo $class->id; ?>" class="stdbutton">More Info & Materials</a></td>
</tr><?php } ?>
</table>

