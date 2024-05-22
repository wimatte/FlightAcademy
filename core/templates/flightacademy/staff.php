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

<h3>Flight Instructors</h3>

<table class="academytable02">
<tr>
<td>ID</td>
<td>Name</td>
<td>Email</td>
<td>Status</td>
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
<td><?php if($mentor->status == "1") {
echo "ACTIVE"; } else { echo "ON LEAVE"; } ?></td>
</tr>
<?php
}
?>
</table>