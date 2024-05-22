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



<h3>Live Training Class</h3>


<form name="mentors" action="<?php echo SITE_URL; ?>/admin/index.php/FlightAcademy/classaction/" method="post">
<table class="academytable01" width="700px">
<tr></tr>

<tr>
<td valign="top" style="font-weight:bold">Course Type:</td>
<td>
<?php echo $trainingtype; ?><?php echo $class->tratype; ?>
 </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Course Title:</td>
<td><input name="traname" type="text" required value="<?php echo $trainingname; ?><?php echo $class->traname; ?>" size="60" /></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Course Description:</td>
<td><textarea name="description" cols="60" rows="5" required="required"><?php echo $class->description; ?></textarea></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Difficulty Level:</td>
<td>
<select name="difficultylevel">
<?php 
                       
                         if($class->difficultylevel == "1") { 
                         $sel1 = "selected";
                         }
                         if($class->difficultylevel == "2") { 
                         $sel2 = "selected";
                         }
                         if($class->difficultylevel == "3") { 
                         $sel3 = "selected";
                         }
                         if($class->difficultylevel == "4") { 
                         $sel4 = "selected";
                         }
                         ;?>
		<option value="1" <?php echo $sel1 ?>>Easy</option>
		<option value="2" <?php echo $sel2 ?>>Intermediate</option>
        <option value="3" <?php echo $sel3 ?>>Advanced</option>
        <option value="4" <?php echo $sel4 ?>>Expert</option>
		</select>
 </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Requirements:<bR />(put each requirement in a new row)</td>
<td>
<textarea name="requirements" cols="60" rows="5" required="required"><?php echo $class->requirements; ?></textarea>
 </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Course Goals:<bR />(put each goal in a new row)</td>
<td>
<textarea name="goals" cols="60" rows="5" required="required"><?php echo $class->goals; ?></textarea>
 </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Required Rank Level to begin Course:</td>
<td>
<select name="ranklevel">
		<option value="0" <?php if($class->ranklevel == 0){ echo 'selected'; } ?>>None</option>
		<?php
		foreach($allranks as $rank)
		{
			if($class->ranklevel == $rank->rankid)
				$sel = 'selected="selected"';
			else
				$sel = '';
				
			echo "<option value=\"{$rank->rankid}\" {$sel} >{$rank->rank}</option>";
		}
		?>
	</select> </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Course Image URL<br />(full URL including http://):</td>
<td><input name="imageurl" type="text" value="<?php echo $class->imageurl; ?>" size="60" /></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Course Date:<br />
FORMAT: (YYYY-MM-DD)</td>
<td>
<input name="startdate" type="text" required value="<?php echo $class->startdate; ?>" size="20" />
 </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Course Start Time:<br />
FORMAT: (HH:MM UTC)</td>
<td>
<input name="starttime" type="text" required value="<?php echo $class->starttime; ?>" size="20" />
 </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Course takes place on<br />(eg. Teamspeak, Skype, Chat,....):</td>
<td><input name="platforms" type="text" value="<?php echo $class->platforms; ?>" required size="60" /></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Course has Theory Exam:</td>
<td>
<select name="theoryexamreq">
                         <?php 
                       
                         if($class->theoryexamreq == "1") { 
                         $sel11 = "selected";
                         }
                         if($class->theoryexamreq == "0") { 
                         $sel12 = "selected";
                         }
                         ;?>
                         
                         
                 <option value="0" <?php echo $sel12 ?> disbaled>No</option> 
                     
 </select>
 </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Course has Practical Exam:</td>
<td>
<select name="practexamreq">
                         <?php 
                       
                         if($class->practexamreq == "1") { 
                         $sel21 = "selected";
                         }
                         if($class->practexamreq == "0") { 
                         $sel22 = "selected";
                         }
                         ;?>
                         
                         
                 <option value="0" <?php echo $sel22 ?>disbaled>No</option> 
                     
 </select>
 </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Flight Instructor:</td>
<td>
<select name="instructor">
		<?php
		
		foreach($mentors as $mentor)
		{
        $pilotdetail = PilotData::getPilotData($mentor->pilotid);
        $pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);
			if($mentor->pilotid == $class->instructor)
				$sel = 'selected';
			else
				$sel = '';
	
			echo '<option value="'.$mentor->pilotid.'" '.$sel.'>'.$pilotid.' - '.$pilotdetail->firstname.''.$pilotdetail->lastname.'</option>';
		} ?>
		</select>
</td></tr>
<tr>
<td valign="top" style="font-weight:bold">Status:</td>
<td>
<select name="status">
                         <?php 
                       
                         if($class->status == "1") { 
                         $sel31 = "selected";
                         }
                         if($class->status == "2") { 
                         $sel33 = "selected";
                         }
                         if($class->status == "0") { 
                         $sel32 = "selected";
                         }
                         ;?>
                         
                         
				 <option value="1" <?php echo $sel31 ?>>Active</option>
                 <option value="2" <?php echo $sel33 ?>>Coming Up</option>
                 <option value="0" <?php echo $sel32 ?>>Incative</option>     
 </select>
 </td>
</tr>
<tr>
<td colspan="2">
<br /><br />
<input name="certificateurl" type="hidden" value="None" />
<input type="hidden" name="id" value="<?php echo $class->id?>" />
<input type="hidden" name="tratype" value="<?php echo $trainingtype; ?><?php echo $class->tratype; ?>" />
<input type="hidden" name="action" value="<?php echo $action?>" />
<input type="submit" value="Save Class"></td>
</tr>
</table>
</form>