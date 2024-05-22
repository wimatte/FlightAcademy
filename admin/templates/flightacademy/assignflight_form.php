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


<h3>Assign Training Flight to <?php 
$pilotid = PilotData::getPilotCode($training->pilotcode, $training->studentid);
echo $pilotid; ?> <?php echo $training->firstname.' '.$training->lastname; ?></h3>


<form name="assignflight" action="<?php echo SITE_URL; ?>/admin/index.php/FlightAcademy/saveassignflight/" method="post">
<table class="academytable01" width="700px">
<tr></tr>
<tr>
<td valign="top" style="font-weight:bold">Flight to assign:</td>
<td>

<select name="flightid">
		<?php
		
		foreach($traflights as $flight)
		{
			echo '<option value="'.$flight->schedid.'">'.$flight->code.$flight->flightnum.'  ('.$flight->depicao.' - '.$flight->arricao.') - '.$flight->aircraft.'</option>';
		} ?>
		</select>
 </td>
</tr>


<tr>
<td colspan="2">
<br /><br />
<input type="hidden" name="pilotid" value="<?php echo $training->studentid?>" />
<input type="hidden" name="trainingid" value="<?php echo $training->traid?>" />
<input type="submit" value="Assign Flight"></td>
</tr>
</table>
</form>