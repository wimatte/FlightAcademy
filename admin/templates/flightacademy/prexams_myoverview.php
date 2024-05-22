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



<h3>My Active Practical Exams</h3>
<br />
<table class="academytable02">
<tr>
<td>Exam</td>
<td>Exam ID</td>
<td>Student PilotID</td>
<td>Student Name</td>
<td>Exam Date</td>
<td>Exam Time</td>
<td>Exam Flight</td>
<td>Examiner</td>
<td>Exam Critique</td>
<td>Edit Exam Details</td>
<td>Delete</td>
</tr>
<?php if(!$prexams)
{ echo "<tR><td colspan='15'>No active practical Exams!</td></tr>"; }
else
foreach ($prexams as $exam)
{
$pilotdetail = PilotData::getPilotData($exam->studentid);
$pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);
$mentordetail = PilotData::getPilotData($exam->examiner);
$mentorid = PilotData::getPilotCode($mentordetail->code, $mentordetail->pilotid);
?>
<tr>
<td><?php echo $exam->traname; ?></td>
<td><?php echo $exam->id; ?></td>
<td><strong><?php echo $pilotid; ?></strong></td>
<td><strong><?php echo $pilotdetail->firstname.' '.$pilotdetail->lastname; ?></strong></td>
<td><?php if($exam->exdate == '0000-00-00') { echo "Pending"; } else {
 echo $exam->exdate; } ?></td>
<td><?php if($exam->extime == '00:00:00') { echo "Pending"; } else {
 echo $exam->extime; } ?></td>
<td>
<?php $examflight = FlightAcademyData::getTraFlightbyExam($exam->id);
if($examflight)
{ ?>
<?php echo $examflight->code.$examflight->flightnum.' '.$examflight->depicao.' - '.$examflight->arricao; ?><?php } else { echo "Pending"; } ?></td>

<td><strong><?php echo $mentorid.' - '.$mentordetail->firstname.' '.$mentordetail->lastname; ?></strong></td>

<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/edit_prexam_critique/<?php echo $exam->id; ?>?frompage=allprexams"><?php if(!$exam->critique) { echo "Write Critique"; } else { echo "View/Edit Critique"; } ?></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/edit_prexam_detail/<?php echo $exam->id; ?>?frompage=allprexams">Edit Exam Details</a></td>
<td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deleteprexam_examiner/<?php echo $exam->id; ?>?frompage=allprexams">Delete</a></td>
</tr>
<?php
}
?>
</table>
<br />
<hr />
<br />
<h3>My Passed Practical Exams</h3>
<br />
<table class="academytable02">
    <tr>
      <td>Exam</td>
      <td>Exam ID</td>
      <td>Student PilotID</td>
      <td>Student Name</td>
      <td>Exam Date</td>
      <td>Exam Time</td>
      <td>Exam Flight</td>
      <td>Examiner</td>
      <td>Result</td>
      <td>Exam Critique</td>
      <td>Edit Exam Details</td>
      <td>Delete</td>
    </tr>
    <?php if(!$passed)
{ echo "<tR><td colspan='15'>No passed practical Exams!</td></tr>"; }
else
foreach ($passed as $exam)
{
$pilotdetail = PilotData::getPilotData($exam->studentid);
$pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);
$mentordetail = PilotData::getPilotData($exam->examiner);
$mentorid = PilotData::getPilotCode($mentordetail->code, $mentordetail->pilotid);
?>
    <tr>
      <td><?php echo $exam->traname; ?></td>
      <td><?php echo $exam->id; ?></td>
      <td><strong><?php echo $pilotid; ?></strong></td>
      <td><strong><?php echo $pilotdetail->firstname.' '.$pilotdetail->lastname; ?></strong></td>
      <td><?php if($exam->exdate == '0000-00-00') { echo "Pending"; } else {
 echo $exam->exdate; } ?></td>
      <td><?php if($exam->extime == '00:00:00') { echo "Pending"; } else {
 echo $exam->extime; } ?></td>
      <td><?php $examflight = FlightAcademyData::getTraFlightbyExam($exam->id);
if($examflight)
{ ?>
        <?php echo $examflight->code.$examflight->flightnum.' '.$examflight->depicao.' - '.$examflight->arricao; ?>
        <?php } else { echo "Pending"; } ?></td>
      <td><strong><?php echo $mentorid.' - '.$mentordetail->firstname.' '.$mentordetail->lastname; ?></strong></td>
      <td><?php echo $exam->result; ?></td>
      <td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/edit_prexam_critique/<?php echo $exam->id; ?>?frompage=allprexams"><?php if(!$exam->critique) { echo "Write Critique"; } else { echo "View/Edit Critique"; } ?></a></td>
      <td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/edit_prexam_detail/<?php echo $exam->id; ?>?frompage=allprexams">Edit Exam Details</a></td>
      <td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deleteprexam_examiner/<?php echo $exam->id; ?>?frompage=allprexams">Delete</a></td>
    </tr>
    <?php
}
?>
  </table>
  <br />
<hr />
<br />
<h3>My Failed Practical Exams</h3>
<br />
<table class="academytable02">
    <tr>
      <td>Exam</td>
      <td>Exam ID</td>
      <td>Student PilotID</td>
      <td>Student Name</td>
      <td>Exam Date</td>
      <td>Exam Time</td>
      <td>Exam Flight</td>
      <td>Examiner</td>
      <td>Result</td>
      <td>Exam Critique</td>
      <td>Edit Exam Details</td>
      <td>Delete</td>
    </tr>
    <?php if(!$failed)
{ echo "<tR><td colspan='15'>No failed practical Exams!</td></tr>"; }
else
foreach ($failed as $exam)
{
$pilotdetail = PilotData::getPilotData($exam->studentid);
$pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);
$mentordetail = PilotData::getPilotData($exam->examiner);
$mentorid = PilotData::getPilotCode($mentordetail->code, $mentordetail->pilotid);
?>
    <tr>
      <td><?php echo $exam->traname; ?></td>
      <td><?php echo $exam->id; ?></td>
      <td><strong><?php echo $pilotid; ?></strong></td>
      <td><strong><?php echo $pilotdetail->firstname.' '.$pilotdetail->lastname; ?></strong></td>
      <td><?php if($exam->exdate == '0000-00-00') { echo "Pending"; } else {
 echo $exam->exdate; } ?></td>
      <td><?php if($exam->extime == '00:00:00') { echo "Pending"; } else {
 echo $exam->extime; } ?></td>
      <td><?php $examflight = FlightAcademyData::getTraFlightbyExam($exam->id);
if($examflight)
{ ?>
        <?php echo $examflight->code.$examflight->flightnum.' '.$examflight->depicao.' - '.$examflight->arricao; ?>
        <?php } else { echo "Pending"; } ?></td>
      <td><strong><?php echo $mentorid.' - '.$mentordetail->firstname.' '.$mentordetail->lastname; ?></strong></td>
      <td><?php echo $exam->result; ?></td>
      <td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/edit_prexam_critique/<?php echo $exam->id; ?>?frompage=allprexams"><?php if(!$exam->critique) { echo "Write Critique"; } else { echo "View/Edit Critique"; } ?></a></td>
      <td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/edit_prexam_detail/<?php echo $exam->id; ?>?frompage=allprexams">Edit Exam Details</a></td>
      <td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deleteprexam_examiner/<?php echo $exam->id; ?>?frompage=allprexams">Delete</a></td>
    </tr>
    <?php
}
?>
  </table>