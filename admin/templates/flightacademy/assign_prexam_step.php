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
<?php 
$pilotdetail = PilotData::getPilotData($exam->studentid);
$pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);
$mentordetail = PilotData::getPilotData($exam->mentorid);
$mentorid = PilotData::getPilotCode($mentordetail->code, $mentordetail->pilotid);
?>


<h3>Take over <?php echo $exam->traname; ?> Exam for <?php echo $pilotdetail->firstname.' '.$pilotdetail->lastname; ?></h3>

<br /><br />
Please enter the text that you want to send to the student below (to find a date and time for the exam): 
<br />
<form name="prexamtake" action="<?php echo SITE_URL; ?>/admin/index.php/FlightAcademy/assign_prexam/" method="post">
<table class="academytable02" width="700px">
<tr></tr>
<tr>
<td valign="top" style="font-weight:bold">Message:</td>
<td><textarea id="editor" name="message" cols="110" rows="20">Dear <?php echo $pilotdetail->firstname; ?>,
<br /><br />
</textarea></td>
</tr>


<tr>
<td colspan="2">
<br /><br />
<input type="hidden" name="examid" value="<?php echo $exam->id ?>" />
<input type="hidden" name="mentormail" value="<?php echo $mentordetail->email ?>" />
<input type="hidden" name="pilotemail" value="<?php echo $pilotdetail->email ?>" />
<input type="submit" value="Assign Exam & Send Email"></td>
</tr>
</table>
</form>