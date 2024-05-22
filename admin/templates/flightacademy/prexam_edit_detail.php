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


<h3>Edit <?php echo $exam->traname; ?> Exam for <?php echo $pilotdetail->firstname.' '.$pilotdetail->lastname; ?></h3>


<br />
<form name="excritique" action="<?php echo SITE_URL; ?>/admin/index.php/FlightAcademy/editprexamdetails/" method="post">
<table class="academytable02" width="700px">
<tr></tr>
<tr>
<td valign="top" style="font-weight:bold">Exam Flight:</td>
<td>
<select name="examflight">
        <option value="">None</option>
		<?php
		
		foreach($traflights as $flight)
		{
        if($flight->isexam == $exam->id)
				$sel = 'selected';
			else
				$sel = '';
                 
			echo '<option value="'.$flight->schedid.'" '.$sel.'>'.$flight->code.$flight->flightnum.'  ('.$flight->depicao.' - '.$flight->arricao.') - '.$flight->aircraft.'</option>';
		} ?>
		</select>
 </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Exam Date (YYYY-MM-DD):</td>
<td>
<input name="exdate" type="text" required value="<?php echo $exam->exdate; ?>" size="30" />
 </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Exam Time (HH:MM:SS):</td>
<td>
<input name="extime" type="text" required value="<?php echo $exam->extime; ?>" size="30" />
 </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Result:</td>
<td>
<select name="result">
                         <?php 
                       
                         if($exam->result == "Passed") { 
                         $sel1 = "selected";
                         }
                         if($exam->result == "Failed") { 
                         $sel2 = "selected";
                         }
                         ;?>
                         
                 <option value="" <?php echo $sel1 ?>>Pending</option>   
				 <option value="Passed" <?php echo $sel1 ?>>Passed</option>
                 <option value="Failed" <?php echo $sel2 ?>>Failed</option>     
 </select>
 </td>
</tr>


<tr>
<td colspan="2">
<br /><br />
<input type="hidden" name="pilotid" value="<?php echo $exam->studentid ?>" />
<input type="hidden" name="traid" value="<?php echo $exam->traid ?>" />
<input type="hidden" name="directto" value="<?php echo $directto ?>" />
<input type="hidden" name="examid" value="<?php echo $exam->id ?>" />
<input type="submit" value="Edit Exam"></td>
</tr>
</table>
</form>