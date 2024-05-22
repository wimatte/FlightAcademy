<?php
// *************************************************************************
// * CrazyCreatives.com Flight Academy module for phpVMS va system         *
// * Copyright (c) Manuel Seiwald (crazycreatives) All Rights Reserved     *
// * Release Date: October 2013                                            *
// * Version 1.01                                                          *
// * Email: info@crazycreatives.com                                        *
// * Website: http://www.crazycreatives.com                                *
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
<link rel="stylesheet" media="all" type="text/css" href="<?php echo SITE_URL?>/core/modules/FlightAcademy/flightacademy.css" />

<h3>Training Progress Sheet for <?php echo $training->firstname.' '.$training->lastname.' | '.$training->traname; ?></h3>

<table width="100%">
<tr><td valign="top" width="50%">
<table class="academytable02"><tr></tr>
<tr>
<td>Training ID:</td><td><?php echo $setting->airlinecode; ?><?php echo $training->traid; ?></td></tr><tr>
<td>Course:</td><td><?php echo $training->traname; ?></td></tr><tr>
<td>Mentor:</td><td>
<?php if(!$training->mentorid)
{ echo "PENDING"; } else { ?>
<?php
$mentorid = PilotData::getPilotCode($training->mentorcode, $training->mentorid);

 echo $mentorid.' - '.$training->mentorfirstname.' '.$training->mentorlastname; ?> (<?php echo $training->mentorlocation; ?>)<?php } ?></td></tr><tr>
<td>Started:</td><td><?php echo $training->begindate; ?></td></tr><tr>
<td>Student PilotID:</td><td><?php 
$pilotid = PilotData::getPilotCode($training->pilotcode, $training->studentid);
echo $pilotid; ?></td></tr><tr>
<td>Student Name:</td><td><?php echo $training->firstname.' '.$training->lastname; ?> (<?php echo $training->location; ?>)</td></tr><tr>
<td>Current Rank:</td><td><?php echo $training->rank; ?></td></tr><tr>
<td>Email:</td><td><a href="mailto:<?php echo $training->studentmail; ?>"><?php echo $training->studentmail; ?></a></td></tr><tr>
<td>Trainee Progress:</td><td><?php echo $training->progress; ?></td></tr><tr>
<td>Course Status:</td><td><?php if($training->status== "1") { echo "ACTIVE"; } else { echo "INACTIVE"; } ?></td></tr>

</table>

<br /><br />
<table class="academytable02"><tr></tr><tr align="center">
<td width="50%">Theoretical Exam Requested:</td>
<td>Practical Exam Requested:</td></tr>
<tr align="center"><td>
<?php if($training->theoryexamreq != '1') { echo "Not Required"; } else { ?>

<?php if($training->texamid == '0') { echo "<font color='#FF6600'>NO</font>"; } else { echo "<font color='#006600'>YES</font>"; } ?>

<?php } ?>
</td><td>
<?php if($training->practexamreq != '1') { echo "Not Required"; } else { ?>

<?php if($training->pexamid == '0') { echo "<font color='#FF6600'>NO</font>"; } else { echo "<font color='#006600'>YES</font>"; } ?>

<?php } ?>
</td></tr></table>

<bR /><br />
<table class="academytable02"><tr></tr><tr align="center">
<td width="50%">Theoretical Exam Result:</td>
<td>Practical Exam Result:</td></tr>
<tr align="center"><td>
<?php if($training->theoryexamreq != '1') { echo "Not Required"; } else { ?>

<?php if($training->theoexampassed == '0') { echo "PENDING"; } elseif($training->theoexampassed == '2') { echo "<font color='#CC0000'>FAILED</font>"; } else { echo "<font color='#006600'>PASSED</font>"; } ?>

<?php } ?>
</td><td>
<?php if($training->practexamreq != '1') { echo "Not Required"; } else { ?>

<?php if($training->practexampassed == '0') { echo "PENDING"; } elseif($training->practexampassed == '2') { echo "<font color='#CC0000'>FAILED</font>"; } else { echo "<font color='#006600'>PASSED</font>"; } ?>

<?php } ?>
</td></tr></table>


<br /><br />
</td>
<td valign="top" style="padding-left:20px; border-left:1px solid #039;">
- <a style="color:#09C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/changementor/<?php echo $training->traid; ?>">Change Mentor</a><br />
- <a style="color:#09C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/changeprogress/<?php echo $training->traid; ?>">Change Progress</a><br />
- <a style="color:#09C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/assigntraflight/<?php echo $training->traid; ?>">Assign Training Flight</a><br />
- <a style="color:#09C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/addnote/<?php echo $training->traid; ?>">Add Note To Training</a><br />

<?php if($training->exblocked == '1') { ?>
- <a style="color:#090; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/releaseforexam/<?php echo $training->traid; ?>">Release for Theory Exam</a>
<br /><?php } ?><br />
<?php if($training->trainingstatus == 'Active') { ?>
- <a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/closetraining/<?php echo $training->traid; ?>">Close Training</a><br />
<?php } else { ?>
- <a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/reopentraining/<?php echo $training->traid; ?>">Re-Open Training</a><bR />
<?php } ?>
- <a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deletetraining/<?php echo $training->traid; ?>">Delete</a><br /><br />
<br />

<?php if($notes) { ?>
<strong>Training Notes:</strong>
<table class="academytable02"><tr></tr>
<tr>
<td>Note Date</td>
<td>Written by</td>
<td>Seen by Student</td>
<td>Read</td>
</tr>
<?php foreach($notes as $note) { ?>
<tr>
<td><?php echo $note->submitdate; ?></td>
<td><?php echo $note->firstname.' '.$note->lastname; ?></td>
<td><?php if($note->noteread == '1') { echo "YES"; } else { echo "NO"; } ?></td>
<td><a style="color:#09C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/readcomment/<?php echo $note->id; ?>">View Comment</a></td>
</tr>
<?php } ?>
</table>
<?php } ?>



</td>
</tr>
</table>



<?php if($theoexams) { ?>
<h3>Theory Exams</h3>

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
<?php if(!$theoexams)
{ echo "<tR><td colspan='15'>No past Exams!</td></tr>"; }
else
foreach ($theoexams as $exam)
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
<?php } ?>



<?php if($prexams) { ?>
<hR />
<h3>Practical Exams</h3>
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
{ echo "<tR><td colspan='15'>No practical Exams!</td></tr>"; }
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
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/edit_prexam_detail/<?php echo $exam->id; ?>">Edit Exam Details</a></td>
<td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deleteprexam_examiner/<?php echo $exam->id; ?>">Delete</a></td>
</tr>
<?php
}
?>
</table>
<?php
}
?>





<?php if($assignedflights) { ?>
<hR />
<h3>Assigned Training Flights</h3>

<table class="academytable02">
<td>Flightnumber</td>
<td>Dep. Icao</td>
<td>Arr. Icao</td>
<td>Aircraft</td>
<td>Flighttime</td>
<td>Remove Assignment</td>
</tr>
<?php if(!$assignedflights)
{ echo "<tR><td colspan='5'>No Training Flights added!</td></tr>"; }
else
foreach ($assignedflights as $flight)
{
?>
<tr>
<td><?php echo $flight->code.''.$flight->flightnum; ?></td>
<td><?php echo $flight->depicao; ?></td>
<td><?php echo $flight->arricao; ?></td>
<td><?php echo $flight->aircraft; ?></td>
<td><?php echo $flight->flighttime; ?></td>
<td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/removeflightassignment/<?php echo $flight->assignid; ?>?traid=<?php echo $training->traid; ?>">Remove Assignment</a></td>
</tr>
<?php
}
?>
</table>

<?php } ?>


<?php if($trainflights) { ?>
<hR />
<h3>Pilots Past Training Flights</h3>

<table class="academytable02">
<td>Flightnumber</td>
<td>Dep. Icao</td>
<td>Arr. Icao</td>
<td>Aircraft</td>
<td>Flighttime</td>
<td>Landing Rate</td>
<td>Date</td>
</tr>
<?php if(!$trainflights)
{ echo "<tR><td colspan='5'>No Training Flights added!</td></tr>"; }
else
foreach ($trainflights as $flight)
{
?>
<tr>
<td><?php echo $flight->code.''.$flight->flightnum; ?></td>
<td><?php echo $flight->depicao; ?></td>
<td><?php echo $flight->arricao; ?></td>
<td><?php echo $flight->aircraft; ?></td>
<td><?php echo $flight->flighttime_stamp; ?></td>
<td><?php echo $flight->landingrate; ?></td>
<td><?php echo $flight->submitdate; ?></td>
</tr>
<?php
}
?>
</table>
<?php } ?>

<?php if($lessons) { ?>
<hr />
<h3>Course Lessons</h3>
<table class="academytable02">
  <tr>
<td>Lesson</td>
<td>Title</td>
<td>View Lesson</td>
</tr>
<?php if(!$lessons)
{ echo "<tR><td colspan='5'>No Lessons added for this Class!</td></tr>"; }
else
foreach ($lessons as $lesson)
{
?>
<tr>
<td>Lesson <?php echo $lesson->lessonnum; ?></td>
<td><?php echo $lesson->lestitle; ?></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/viewlesson/<?php echo $lesson->id; ?>">View Lesson</a></td>
</tr>
<?php
}
?>
</table>
<?php } ?>




<?php if($materials) { ?>
<hr />
<h3>Course Materials</h3>
<table class="academytable02">
<td>Title</td>
<td>Description</td>
<td>Last Update</td>
<td>By</td>
<td>Revision Number</td>
<td>Download</td>
</tr>
<?php if(!$materials)
{ echo "<tR><td colspan='5'>No Materials added!</td></tr>"; }
else
foreach ($materials as $material)
{
?>
<tr>
<td><?php echo $material->mattitle; ?></td>
<td><?php echo $material->matdescription; ?></td>
<td><?php echo $material->lastupdate; ?></td>
<td><?php echo $material->addedby; ?></td>
<td><?php echo $material->revision; ?></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo $material->downloadurl; ?>" target="_blank">Download</a></td>
</tr>
<?php
}
?>
</table>
<?php } ?>