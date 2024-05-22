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


<h3>Change Mentor for <?php 
$pilotid = PilotData::getPilotCode($training->pilotcode, $training->studentid);
echo $pilotid; ?> <?php echo $training->firstname.' '.$training->lastname; ?></h3>


<form name="changementor" action="<?php echo SITE_URL; ?>/admin/index.php/FlightAcademy/savechangementor/" method="post">
<table class="academytable01" width="700px">
<tr></tr>
<tr><td style="font-weight:bold">Current Mentor:</td><tD><?php if(!$training->mentorid)
{ echo "PENDING"; } else { ?>
<?php
$mentorid = PilotData::getPilotCode($training->mentorcode, $training->mentorid);

 echo $mentorid.' - '.$training->mentorfirstname.' '.$training->mentorlastname; ?><?php } ?>
 </tD></tr>
<tr>
<td valign="top" style="font-weight:bold">New Mentor:</td>
<td>

<select name="mentorid">
		<?php
		
		foreach($mentors as $pilot)
		{
        $pilotdetail = PilotData::getPilotData($pilot->pilotid);
        $pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);
		
			echo '<option value="'.$pilot->pilotid.'" '.$sel.'>'.$pilotid.' - '.$pilotdetail->firstname.' '.$pilotdetail->lastname.'</option>';
		} ?>
		</select>
 </td>
</tr>


<tr>
<td colspan="2">
<br /><br />
<input type="hidden" name="id" value="<?php echo $training->traid?>" />
<input type="submit" value="Change Mentor"></td>
</tr>
</table>
</form>