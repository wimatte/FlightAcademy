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



<h3>Lessons for <?php echo $class->traname; ?></h3>

<p><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/addlesson/<?php echo $class->id; ?>">Add New Lesson</a></p>
<br /><br />
<table class="academytable02">
  <tr>
<td>Lesson</td>
<td>Title</td>
<td>View Lesson</td>
<td>Status</td>
<td>Edit</td>
<td>Delete</td>
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
<td><?php if($lesson->status == "1") {
echo "ACTIVE"; } else { echo "INCATIVE"; } ?></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/editlesson/<?php echo $lesson->id; ?>">Edit</a></td>
<td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deletelesson/<?php echo $lesson->id; ?>">Delete</a></td>
</tr>
<?php
}
?>
</table>