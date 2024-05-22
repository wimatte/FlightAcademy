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



<h3>Pending practical Exams</h3>
<br />
The following requests for practical exams have been received and are awaiting an examiner:
<br /><br />
<table class="academytable02">
<tr>
<td>Requested Exam</td>
<td>Exam ID</td>
<td>Student PilotID</td>
<td>Student Name</td>
<td>Theory Passed?</td>
<td>Mentor</td>
<td>Take Exam</td>
<td>Delete</td>
</tr>
<?php if(!$prexams)
{ echo "<tR><td colspan='15'>No pending practical Exam Requests!</td></tr>"; }
else
foreach ($prexams as $exam)
{
$pilotdetail = PilotData::getPilotData($exam->studentid);
$pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);
$mentordetail = PilotData::getPilotData($exam->mentorid);
$mentorid = PilotData::getPilotCode($mentordetail->code, $mentordetail->pilotid);
?>
<tr>
<td><?php echo $exam->traname; ?></td>
<td><?php echo $exam->id; ?></td>
<td><strong><?php echo $pilotid; ?></strong></td>
<td><strong><?php echo $pilotdetail->firstname.' '.$pilotdetail->lastname; ?></strong></td>
<td><?php if($exam->theoexampassed == '1') { echo "YES"; } else { echo "NO"; } ?></td>
<td><strong><?php echo $mentorid.' - '.$mentordetail->firstname.' '.$mentordetail->lastname; ?></strong></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/assign_prexam_step/<?php echo $exam->id; ?>">Assign to my Exams</a></td>
<td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deleteprexam/<?php echo $exam->id; ?>">Delete</a></td>
</tr>
<?php
}
?>
</table>
