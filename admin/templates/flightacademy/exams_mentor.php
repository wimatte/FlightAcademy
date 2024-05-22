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



<h3>Ongoing / Unfinished Theory Exams</h3>

<table class="academytable02">
<tr>
<td>Exam ID</td>
<td>Student PilotID</td>
<td>Student Name</td>
<td>Exam Name</td>
<td>Date Started</td>
<td>Delete</td>
</tr>
<?php if(!$unfinished)
{ echo "<tR><td colspan='15'>No Ongoing Exams!</td></tr>"; }
else
foreach ($unfinished as $exam)
{
$pilotdetail = PilotData::getPilotData($exam->pilotid);
$pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);
?>
<tr>
<td><?php echo $exam->id; ?></td>
<td><strong><?php echo $pilotid; ?></strong></td>
<td><strong><?php echo $pilotdetail->firstname.' '.$pilotdetail->lastname; ?></strong></td>
<td><?php echo $exam->examtitle; ?></td>
<td><?php echo $exam->startdate; ?></td>
<td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deleteexamment/<?php echo $exam->id; ?>">Delete</a></td>
</tr>
<?php
}
?>
</table>

<br />
<hr />
<br />
<h3>Passed Exams</h3>

<table class="academytable02">
<tr>
<td>Exam ID</td>
<td>Student PilotID</td>
<td>Student Name</td>
<td>Exam Name</td>
<td>Exam Result</td>
<td>Date</td>
<td>View Exam</td>
<td>Delete</td>
</tr>
<?php if(!$passed)
{ echo "<tR><td colspan='15'>No Passed Exams!</td></tr>"; }
else
foreach ($passed as $exam)
{
$pilotdetail = PilotData::getPilotData($exam->pilotid);
$pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);
?>
<tr>
<td><?php echo $exam->id; ?></td>
<td><strong><?php echo $pilotid; ?></strong></td>
<td><strong><?php echo $pilotdetail->firstname.' '.$pilotdetail->lastname; ?></strong></td>
<td><?php echo $exam->examtitle; ?></td>
<td><font color="#009900"><?php echo $exam->result; ?>%</font></td>
<td><?php echo $exam->gradedate; ?></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/view_exam_detailed/<?php echo $exam->id; ?>">View Exam Detailed</a></td>
<td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deleteexamment/<?php echo $exam->id; ?>">Delete</a></td>
</tr>
<?php
}
?>
</table>


<br />
<hr />
<br />
<h3>Failed Exams</h3>

<table class="academytable02">
<tr>
<td>Exam ID</td>
<td>Student PilotID</td>
<td>Student Name</td>
<td>Exam Name</td>
<td>Exam Result</td>
<td>Date</td>
<td>View Exam</td>
<td>Delete</td>
</tr>
<?php if(!$failed)
{ echo "<tR><td colspan='15'>No Failed Exams!</td></tr>"; }
else
foreach ($failed as $exam)
{
$pilotdetail = PilotData::getPilotData($exam->pilotid);
$pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);
?>
<tr>
<td><?php echo $exam->id; ?></td>
<td><strong><?php echo $pilotid; ?></strong></td>
<td><strong><?php echo $pilotdetail->firstname.' '.$pilotdetail->lastname; ?></strong></td>
<td><?php echo $exam->examtitle; ?></td>
<td><font color="#CC0000"><?php echo $exam->result; ?>%</font></td>
<td><?php echo $exam->gradedate; ?></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/view_exam_detailed/<?php echo $exam->id; ?>">View Exam Detailed</a></td>
<td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deleteexamment/<?php echo $exam->id; ?>">Delete</a></td>
</tr>
<?php
}
?>
</table>