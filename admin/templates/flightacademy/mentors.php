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



<h3>Flight Instructors</h3>

<table class="academytable02">
<tr>
<td>ID</td>
<td>Name</td>
<td>Email</td>
<td>Mentors</td>
<td>Settings</td>
<td>Courses</td>
<td>Materials</td>
<td>Flights</td>
<td>Theory Examiner</td>
<td>Practical Examiner</td>
<td>Instructor Since</td>
<td>Assignments</td>
<td>Status</td>
<td>Edit</td>
<td>Delete</td>
</tr>
<?php if(!$mentors)
{ echo "<tR><td colspan='15'>No Mentors Set!</td></tr>"; }
else
foreach ($mentors as $mentor)
{
$pilotdetail = PilotData::getPilotData($mentor->pilotid);
$pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);
?>
<tr>
<td><strong><?php echo $pilotid; ?></strong></td>
<td><strong><?php echo $pilotdetail->firstname.' '.$pilotdetail->lastname; ?></strong></td>
<td><a href="mailto:<?php echo $pilotdetail->email; ?>"><?php echo $pilotdetail->email; ?></a></td>
<td><?php if($mentor->addmentors == "1") {
echo "YES"; } else { echo "NO"; } ?>
</td>
<td><?php if($mentor->changesettings == "1") {
echo "YES"; } else { echo "NO"; } ?></td>
<td><?php if($mentor->addcourses == "1") {
echo "YES"; } else { echo "NO"; } ?></td>
<td><?php if($mentor->addmaterials == "1") {
echo "YES"; } else { echo "NO"; } ?></td>
<td><?php if($mentor->addflights == "1") {
echo "YES"; } else { echo "NO"; } ?></td>
<td><?php if($mentor->texaminer == "1") {
echo "YES"; } else { echo "NO"; } ?></td>
<td><?php if($mentor->pexaminer == "1") {
echo "YES"; } else { echo "NO"; } ?></td>
<td><?php echo $mentor->dateadded; ?></td>
<td>Assignments</td>
<td><?php if($mentor->status == "1") {
echo "ACTIVE"; } else { echo "ON LEAVE"; } ?></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/editinstructor/<?php echo $mentor->id; ?>">Edit</a></td>
<td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deletementor/<?php echo $mentor->id; ?>">Delete</a></td>
</tr>
<?php
}
?>
</table>