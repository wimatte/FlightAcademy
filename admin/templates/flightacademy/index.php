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
<?php
$allcomplstudcot = count($completedstudentsforcount);
$allactivestudetns = count($activestudentsforcount);
$passedthexamscount =count($passedthexamscount);
$failedthexamscount =count($failedthexamscount);
$passedprexamscount =count($passedprexamscount);
$failedprexamscount =count($failedprexamscount);
?>

<h3>Flight Academy Overview</h3>
<div style="width:30%">
<table class="academytable02">
<tr></tr>
<tr><td>Training Center Status:</td><td><?php if($setting->status == '1') { echo "OPEN"; } else { echo "CLOSED"; }?></td></tr>
<tr><td>Pilots Currently in Training:</td><td><?php echo $allactivestudetns; ?></td></tr>
<tr><td>Completed Trainings:</td><td><?php echo $allcomplstudcot; ?></td></tr>
<tr><td>Passed Theoretical Exams:</td><td><?php echo $passedthexamscount; ?></td></tr>
<tr><td>Failed Theoretical Exams:</td><td><?php echo $failedthexamscount; ?></td></tr>
<tr><td>Passed Practical Exams:</td><td><?php echo $passedprexamscount; ?></td></tr>
<tr><td>Passed Failed Exams:</td><td><?php echo $failedprexamscount; ?></td></tr>


</table>
</div>
<br /><br />

<h3>Trainings to be marked as completed</h3>

<table class="academytable02">
<tr>
<td>Training ID</td>
<td>Training Course</td>
<td>Student</td>
<td>Examiner</td>
<td>Theoretical Exam Passed</td>
<td>Practical Exam Passed</td>
<td>View Progress Sheet</td>
<td>Mark Completed</td>
</tr>
<?php
if(!$awaiting)
{
echo "<tr><td colspan='10'>No trainings awaiting approval</td></tr>"; }
else
 foreach($awaiting as $training)
{ 
$pilotdetail = PilotData::getPilotData($training->studentid);
$pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);
$mentordetail = PilotData::getPilotData($training->mentorid);
$mentorid = PilotData::getPilotCode($mentordetail->code, $mentordetail->pilotid);
?>
<tr>
<td><?php echo $setting->airlinecode ?><?php echo $training->id ?></td>
<td><?php echo $training->traname ?></td>
<td><?php echo $pilotid.' - '.$pilotdetail->firstname.' '.$pilotdetail->lastname; ?></td>
<td><?php echo $mentorid.' - '.$mentordetail->firstname.' '.$mentordetail->lastname; ?></td>
<td><?php if ($training->theoryexamreq != '1') { echo "Not Required"; } elseif($training->theoexampassed == '1') { echo "YES"; } else { echo "NO"; } ?>
</td>
<td><?php if ($training->practexamreq != '1') { echo "Not Required"; } elseif($training->practexampassed == '1') { echo "YES"; } else { echo "NO"; } ?></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/viewprogress_sheet/<?php echo $training->id; ?>">Progress Sheet / Edit Student</a></td>
<td><a style="color:#060; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/completetraining/<?php echo $training->id; ?>">Mark as Completed</a></td>
</tr>
<?php } ?>
</table>
<hr />
<h3>Completed Training Courses</h3>

<table class="academytable02">
<tr>
<td>Training ID</td>
<td>Training Course</td>
<td>Student</td>
<td>Examiner</td>
<td>Theoretical Exam Passed</td>
<td>Practical Exam Passed</td>
<td>View Progress Sheet</td>
<td>Mark Completed</td>
</tr>
<?php
if(!$completed)
{
echo "<tr><td colspan='10'>No trainings awaiting approval</td></tr>"; }
else
 foreach($completed as $training)
{ 
$pilotdetail = PilotData::getPilotData($training->studentid);
$pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);
$mentordetail = PilotData::getPilotData($training->mentorid);
$mentorid = PilotData::getPilotCode($mentordetail->code, $mentordetail->pilotid);
?>
<tr>
<td><?php echo $setting->airlinecode ?><?php echo $training->id ?></td>
<td><?php echo $training->traname ?></td>
<td><?php echo $pilotid.' - '.$pilotdetail->firstname.' '.$pilotdetail->lastname; ?></td>
<td><?php echo $mentorid.' - '.$mentordetail->firstname.' '.$mentordetail->lastname; ?></td>
<td><?php if ($training->theoryexamreq != '1') { echo "Not Required"; } elseif($training->theoexampassed == '1') { echo "YES"; } else { echo "NO"; } ?>
</td>
<td><?php if ($training->practexamreq != '1') { echo "Not Required"; } elseif($training->practexampassed == '1') { echo "YES"; } else { echo "NO"; } ?></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/viewprogress_sheet/<?php echo $training->id; ?>">Progress Sheet / Edit Student</a></td>
<td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deletetraining/<?php echo $training->id; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>