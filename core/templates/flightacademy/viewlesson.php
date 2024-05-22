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



<h3>Lesson <?php echo $lesson->lessonnum; ?> - <?php echo $lesson->lestitle; ?></h3>
<a style="color:#09C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/index.php/FlightAcademy/mytraining">Back To Progress Sheet</a><br /><br />
added by <?php echo $lesson->addedby; ?> on <?php echo $lesson->adddate; ?>

<br />
<hr />
<br />
<?php echo $lesson->lestext; ?>


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
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/index.php/FlightAcademy/viewlesson/<?php echo $lesson->id; ?>">View Lesson</a></td>
</tr>
<?php
}
?>
</table>



