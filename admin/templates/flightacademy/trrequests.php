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


<h3>Pending Training Requests</h3>


<table class="academytable02">
  <tr>
<td>Training ID</td>
<td>Student</td>
<td>Student Email</td>
<td>Requested Course</td>
<td>Assign</td>
<td>Delete</td>
</tr>
<?php if(!$trainings)
{ echo "<tR><td colspan='5'>No Pending Training Requests!</td></tr>"; }
else
foreach ($trainings as $training)
{
?>
<tr>
<td><?php echo $setting->airlinecode; ?><?php echo $training->id; ?></td>
<td><?php
$pilotid = PilotData::getPilotCode($training->code, $training->studentid);
 echo $pilotid.' - '.$training->firstname.' '.$training->lastname; ?></td>
<td><a href="mailto:<?php echo $training->studentmail; ?>"><?php echo  $training->studentmail; ?></a></td>
<td><?php echo $training->traname; ?></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/assignmentor/<?php echo $training->id; ?>">Assign to My Students</a></td>
<td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deletetraining/<?php echo $training->id; ?>">Delete</a></td>
</tr>
<?php
}
?>
</table>