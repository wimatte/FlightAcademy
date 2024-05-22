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

<h3>Exam Center</h3>
<br />
<?php if($course->pexamid != '0' && $course->texamid != '0') { ?>
No Exam is available for booking!
<?php
}
?>

<?php if($course->theoryexamreq == '1' && $exams) { ?>
<strong>The following Theory Exams are available for your current courses:</strong>

<br /><bR />
<table class="academytable02">
<tr>
<td>Exam</td>
<td>Course</td>
<td>Take Exam</td>
</tr>
<?php if(!$exams)
{ echo "<tR><td colspan='15'>No theoretical Exam are available for your current course!</td></tr>"; }
else
foreach ($exams as $exam)
{
?>
<tr>
<td><?php echo $exam->examtitle; ?></td>
<td><?php echo $exam->traname; ?></td>
<td>
<?php if($exam->exblocked != '1') { ?>
<a href="<?php echo SITE_URL?>/index.php/AcademyExam/index/<?php echo $exam->id; ?>?traid=<?php echo $exam->traid; ?>">Take Exam</a><?php } else { echo "Mentor release pending"; } ?></td>
</tr>
<?php
}
?>
</table>

<br /><br /><strong>The practical exam request form becomes available once you have passed the theory exam!</strong>
<?php } ?>

<?php if(!$exams && $course->practexamreq == '1' && $course->pexamid == '0') { ?>
You are just one step away from finishing the course. Please click the button below to request you practical exam now.<br /><br />

Once you have requested the exam one of our examiners will get in contact with you to fix a date and time for your practical exam to take place.

Once the Exam is requested you will find further information in your training Progress Sheet.
<br /><br /><br />
<a href="<?php echo SITE_URL?>/index.php/FlightAcademy/requestprexam/<?php echo $course->traid; ?>">Request Exam</a>
<?php } ?>
