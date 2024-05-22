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


<h3>Write Critique | <?php echo $exam->traname; ?> Exam for <?php echo $pilotdetail->firstname.' '.$pilotdetail->lastname; ?></h3>

<br /><br />
Please enter your practical exam critique below:<br />
<form name="excritique" action="<?php echo SITE_URL; ?>/admin/index.php/FlightAcademy/writecritique/" method="post">
<table class="academytable02" width="700px">
<tr></tr>
<tr>
<td valign="top" style="font-weight:bold">Message:</td>
<td><textarea id="editor" name="critique" cols="110" rows="30"><?php echo $exam->critique; ?>
</textarea></td>
</tr>


<tr>
<td colspan="2">
<br /><br />
<input type="hidden" name="directto" value="<?php echo $directto ?>" />
<input type="hidden" name="examid" value="<?php echo $exam->id ?>" />
<input type="submit" value="Submit Critique"></td>
</tr>
</table>
</form>