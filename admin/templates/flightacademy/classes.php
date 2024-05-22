<?php
// *************************************************************************
// * CrazyCreatives.com Flight Academy module for phpVMS va system              *
// * Copyright (c) Manuel Seiwald (crazycreatives) All Rights Reserved         *
// * Release Date: October 2013                                       *
// * Version 1.01                                                           *
// * Email: info@crazycreatives.com                                        *
// * Website: http://www.crazycreatives.com                                 *
// *************************************************************************
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.  This software  or any other *
// * copies thereof may not be provided or otherwise made available to any *
// * other person.  No title to and  ownership of the  software is  hereby *
// * transferred.                                                          *
// *************************************************************************
// * You may not reverse  engineer, decompile, defeat  license  encryption *
// * mechanisms, or  disassemble this software product or software product *
// * license. In such event,  licensee  agrees to return license to        *
// * licensor and/or destroy  all copies of software  upon termination of  *
// * the license.                                                          *
// *************************************************************************
?>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo SITE_URL?>/admin/flightacademy.css" />



<h3>Permanent Courses</h3>

<table class="academytable02">
<td>Title</td>
<td>Difficulty</td>
<td>Lessons</td>
<td>Status</td>
<td>Edit</td>
<td>Delete</td>
</tr>
<?php if(!$permclasses)
{ echo "<tR><td colspan='5'>No Permanent Classes set!</td></tr>"; }
else
foreach ($permclasses as $class)
{
?>
<tr>
<td><?php echo $class->traname; ?></td>
<td><?php if($class->difficultylevel == '1') { echo "EASY"; } elseif($class->difficultylevel == '2') { echo "INTERMEDIATE"; } elseif($class->difficultylevel == '3') { echo "ADVANCED"; } elseif($class->difficultylevel == '4') { echo "EXPERT"; } ?></td>

<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/lessons/<?php echo $class->id; ?>">Lessons</a></td>

<td><?php if($class->status == "1") {
echo "ACTIVE"; } elseif($class->status == "2") {
echo "COMING UP"; } else { echo "INCATIVE"; } ?></td>

<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/editclass/<?php echo $class->id; ?>">Edit</a></td>
<td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deleteclass/<?php echo $class->id; ?>">Delete</a></td>
</tr>
<?php
}
?>
</table>

<br /><br />
<hr />

<h3>Type Rating Courses</h3>

<table class="academytable02">
<td>Title</td>
<td>Difficulty</td>
<td>Lessons</td>
<td>Status</td>
<td>Edit</td>
<td>Delete</td>
</tr>
<?php if(!$tyraclasses)
{ echo "<tR><td colspan='5'>No Type Rating Courses set!</td></tr>"; }
else
foreach ($tyraclasses as $class)
{
?>
<tr>
<td><?php echo $class->traname; ?></td>
<td><?php if($class->difficultylevel == '1') { echo "EASY"; } elseif($class->difficultylevel == '2') { echo "INTERMEDIATE"; } elseif($class->difficultylevel == '3') { echo "ADVANCED"; } elseif($class->difficultylevel == '4') { echo "EXPERT"; } ?></td>

<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/lessons/<?php echo $class->id; ?>">Lessons</a></td>

<td><?php if($class->status == "1") {
echo "ACTIVE"; } elseif($class->status == "2") {
echo "COMING UP"; } else { echo "INCATIVE"; } ?></td>

<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/editclass/<?php echo $class->id; ?>">Edit</a></td>
<td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deleteclass/<?php echo $class->id; ?>">Delete</a></td>
</tr>
<?php
}
?>
</table>

<br /><br />
<hr />

<h3>Live Training Events (One Day Courses)</h3>

<table class="academytable02">
<td>Title</td>
<td>Difficulty</td>
<td>Status</td>
<td>Pilots Attending</td>
<td>Materials</td>
<td>Edit</td>
<td>Delete</td>
</tr>
<?php if(!$ondaclasses)
{ echo "<tR><td colspan='5'>No Live Training set!</td></tr>"; }
else
foreach ($ondaclasses as $class)
{
?>
<tr>
<td><?php echo $class->traname; ?></td>
<td><?php if($class->difficultylevel == '1') { echo "EASY"; } elseif($class->difficultylevel == '2') { echo "INTERMEDIATE"; } elseif($class->difficultylevel == '3') { echo "ADVANCED"; } elseif($class->difficultylevel == '4') { echo "EXPERT"; } ?></td>
<td><?php if($class->status == "1") {
echo "ACTIVE"; } elseif($class->status == "2") {
echo "COMING UP"; } else { echo "INCATIVE"; } ?></td>
<td>
<?php
$attending = FlightAcademyData::GetLiveCourseAttendees($class->id);
$attendees = count($attending);
?>

<a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/livecourseattendees/<?php echo $class->id; ?>">Attendees (<?php echo $attendees; ?>)</a></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/livecoursematerials/<?php echo $class->id; ?>">Class Materials</a></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/editclass/<?php echo $class->id; ?>">Edit</a></td>
<td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deleteclass/<?php echo $class->id; ?>">Delete</a></td>
</tr>
<?php
}
?>
</table>