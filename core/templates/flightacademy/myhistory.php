 <?php
 $setting = FlightAcademyData::GetSettings();
  $trainingcheck = FlightAcademyData::TrainingCheck(Auth::$userinfo->pilotid);
if(!$trainingcheck) { ?>No Past Trainings are recorded for your account! <?php } ?>

<?php 
if($pastperm)
{ 
?>
<h3>My past Permanent Courses</h3>

<table class="academytable02">
<tr>
<td>Training ID</td>
<td>Course</td>
<td>Completed</td>
<td>View My Progress Sheet</td>
</tr>
<?php if(!$pastperm)
{ echo "<tR><td colspan='5'>No completed Courses!</td></tr>"; }
else
foreach ($pastperm as $training)
{
?>
<tr>
<td><?php echo $setting->airlinecode; ?><?php echo $training->traid; ?></td>
<td><?php echo $training->traname; ?></td>
<tD><?php if($training->completed == "1") { echo "YES"; } else { echo "NO"; } ?></tD>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/index.php/FlightAcademy/viewprogress_sheet/<?php echo $training->traid; ?>">View My Progress Sheet</a></td>
</tr>
<?php
}
?>
</table>
<?php } ?>


<?php 
if($pasttyra)
{ 
?>
<br /><hr /><br />
<h3>My past Type Rating Courses</h3>

<table class="academytable02">
<tr>
<td>Training ID</td>
<td>Course</td>
<td>Completed</td>
<td>View My Progress Sheet</td>
</tr>
<?php if(!$pasttyra)
{ echo "<tR><td colspan='5'>No completed Courses!</td></tr>"; }
else
foreach ($pasttyra as $training)
{
?>
<tr>
<td><?php echo $setting->airlinecode; ?><?php echo $training->traid; ?></td>
<td><?php echo $training->traname; ?></td>
<tD><?php if($training->completed == "1") { echo "YES"; } else { echo "NO"; } ?></tD>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/index.php/FlightAcademy/viewprogress_sheet/<?php echo $training->id; ?>">View My Progress Sheet</a></td>
</tr>
<?php
}
?>
</table>
<?php } ?>


<?php 
if($pastonda)
{ 
?>
<br /><hr /><br />
<h3>My past Live Training Courses</h3>

<table class="academytable02">
<tr>
<td>Training ID</td>
<td>Course</td>
<td>Course Info</td>
</tr>
<?php if(!$pastonda)
{ echo "<tR><td colspan='5'>No completed Courses!</td></tr>"; }
else
foreach ($pastonda as $training)
{
?>
<tr>
<td><?php echo $setting->airlinecode; ?><?php echo $training->traid; ?></td>
<td><?php echo $training->traname; ?></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/index.php/FlightAcademy/ondastuff/<?php echo $training->traid; ?>">View Course Info</a></td>
</tr>
<?php
}
?>
</table>
<?php } ?>
