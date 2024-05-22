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



<h3>Flight Instructor Form</h3>


<form name="mentors" action="<?php echo SITE_URL; ?>/admin/index.php/FlightAcademy/mentoraction/" method="post">
<table class="academytable01" width="700px">
<tr></tr>

<tr>
<td valign="top" style="font-weight:bold">New Flight Instructor:</td>
<td>

<select name="pilotid" <?php if($action == 'editmentor') { ?>disabled="disabled" <?php } ?>>
		<?php
		
		foreach($pilots as $pilot)
		{
        $pilotid = PilotData::getPilotCode($pilot->code, $pilot->pilotid);
			if($pilot->pilotid == $mentor->pilotid)
				$sel = 'selected';
			else
				$sel = '';
	
			echo '<option value="'.$pilot->pilotid.'" '.$sel.'>'.$pilotid.' - '.$pilot->firstname.' '.$pilot->lastname.'</option>';
		} ?>
		</select>
 </td>
</tr>




<tr>
<td colspan="2">
<br /><hr />
<h3>Access Rights</h3>
<br />
</td>
</tr>

<tr>
<td valign="top" style="font-weight:bold">Change Training Center Settings:</td>
<td>
<select name="changesettings">
                         <?php 
                       
                         if($mentor->changesettings == "1") { 
                         $sel1 = "selected";
                         }
                         if($mentor->changesettings == "0") { 
                         $sel2 = "selected";
                         }
                         ;?>
                         
                         
                 <option value="0" <?php echo $sel2 ?>>No</option> 
				 <option value="1" <?php echo $sel1 ?>>Yes</option>
                     
 </select>
 </td>
</tr>



<tr>
<td valign="top" style="font-weight:bold">Add/Edit Instructors:</td>
<td>
<select name="addmentors">
                         <?php 
                       
                         if($mentor->addmentors == "1") { 
                         $sel11 = "selected";
                         }
                         if($mentor->addmentors == "0") { 
                         $sel12 = "selected";
                         }
                         ;?>
                         
                 <option value="0" <?php echo $sel12 ?>>No</option>
				 <option value="1" <?php echo $sel11 ?>>Yes</option>
                     
 </select>
 </td>
</tr>


<tr>
<td valign="top" style="font-weight:bold">Add/Edit Classes:</td>
<td>
<select name="addcourses">
                         <?php 
                       
                         if($mentor->addcourses == "1") { 
                         $sel21 = "selected";
                         }
                         if($mentor->addcourses == "0") { 
                         $sel22 = "selected";
                         }
                         ;?>
                         
                         
				 <option value="0" <?php echo $sel22 ?>>No</option>
				 <option value="1" <?php echo $sel21 ?>>Yes</option>    
 </select>
 </td>
</tr>


<tr>
<td valign="top" style="font-weight:bold">Add/Edit Materials:</td>
<td>
<select name="addmaterials">
                         <?php 
                       
                         if($mentor->addmaterials == "1") { 
                         $sel31 = "selected";
                         }
                         if($mentor->addmaterials == "0") { 
                         $sel32 = "selected";
                         }
                         ;?>
                         
                         
				 <option value="0" <?php echo $sel32 ?>>No</option>
				 <option value="1" <?php echo $sel31 ?>>Yes</option>     
 </select>
 </td>
</tr>


<tr>
<td valign="top" style="font-weight:bold">Add/Edit Training Flights:</td>
<td>
<select name="addflights">
                         <?php 
                       
                         if($mentor->addflights == "1") { 
                         $sel41 = "selected";
                         }
                         if($mentor->addflights == "0") { 
                         $sel42 = "selected";
                         }
                         ;?>
                         
                         
				 <option value="0" <?php echo $sel42 ?>>No</option>
				 <option value="1" <?php echo $sel41 ?>>Yes</option>    
 </select>
 </td>
</tr>


<tr>
<td valign="top" style="font-weight:bold">Is theoretical Examiner:</td>
<td>
<select name="texaminer">
                         <?php 
                       
                         if($mentor->texaminer == "1") { 
                         $sel51 = "selected";
                         }
                         if($mentor->texaminer == "0") { 
                         $sel52 = "selected";
                         }
                         ;?>
                         
                         
				 <option value="0" <?php echo $sel52 ?>>No</option>
				 <option value="1" <?php echo $sel51 ?>>Yes</option>    
 </select>
 </td>
</tr>


<tr>
<td valign="top" style="font-weight:bold">Is practical Examiner:</td>
<td>
<select name="pexaminer">
                         <?php 
                       
                         if($mentor->pexaminer == "1") { 
                         $sel61 = "selected";
                         }
                         if($mentor->pexaminer == "0") { 
                         $sel62 = "selected";
                         }
                         ;?>
                         
                         
				 <option value="0" <?php echo $sel62 ?>>No</option>
				 <option value="1" <?php echo $sel61 ?>>Yes</option>     
 </select>
 </td>
</tr>



<tr>
<td colspan="2">
<br /><hr />
<h3>Status</h3>
<br />
</td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Status:</td>
<td>
<select name="status">
                         <?php 
                       
                         if($mentor->status == "1") { 
                         $sel71 = "selected";
                         }
                         if($mentor->status == "0") { 
                         $sel72 = "selected";
                         }
                         ;?>
                         
                         
				 <option value="1" <?php echo $sel71 ?>>Active</option>
                 <option value="0" <?php echo $sel72 ?>>On Leave</option>     
 </select>
 </td>
</tr>
<tr>
<td colspan="2">
<br /><br />
<input type="hidden" name="id" value="<?php echo $mentor->id?>" />
<input type="hidden" name="action" value="<?php echo $action?>" />
<input type="submit" value="Save Mentor"></td>
</tr>
</table>
</form>