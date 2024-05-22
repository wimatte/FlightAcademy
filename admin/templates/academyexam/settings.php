<?php
// *************************************************************************
// * CrazyCreatives.com AcademyExam module for phpVMS va system              *
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
<link rel="stylesheet" media="all" type="text/css" href="<?php echo SITE_URL?>/admin/academyexam.css" />
<img src="<?php echo SITE_URL?>/core/modules/AcademyExam/images/examcenterlogo.png" /><br />

<div class="header1">ExamCenter Test Settings</div>
<br />
<form name="crewtest" action="<?php echo SITE_URL; ?>/admin/index.php/AcademyExam/addexamaction" method="post">
<table class="maintable" width="700px">
<tr></tr>
<tr>
<td valign="top" style="font-weight:bold">Exam Title:</td>
<td valign="top"><input type="text" name="examtitle" value="<?php echo $setting->examtitle;?>" /></td>
</tr>
<tr>
        <td valign="top" style="font-weight:bold">Exam for Course:</td>
        <td><select name="classid">
          <?php
		if($classes)
		foreach($classes as $class)
		{
        if($class->theoryexamreq == '0')
        { continue; }
        
			if($class->id == $setting->classid)
				$sel = 'selected';
			else
				$sel = '';
	
			echo '<option value="'.$class->id.'" '.$sel.'>'.$class->traname.'</option>';
		} ?>
        </select></td>
      </tr>
<tr>
<td valign="top" style="font-weight:bold">Welcome Text:</td>
<td><textarea name="welcometext" cols="50" rows="6"><?php echo $setting->welcometext; ?></textarea></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Number of Exam Questions:</td>
<td><input type="text" name="questioncount" value="<?php echo $setting->questioncount;?>" required /></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold"></td>
<td valign="top"><input type="hidden" name="questiontime" value="900" required /></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Minimum Pass Percentage:</td>
<td valign="top"><input type="text" name="passpercentage" value="<?php echo $setting->passpercentage;?>" required /></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold"></td>
<td valign="top"><input type="hidden" name="daysfailed" value="0" /></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Exam Image URL:<br />(including http://)</td>
<td valign="top"><input type="text" name="examimage" value="<?php echo $setting->examimage;?>" /></td>
</tr>
<tr>
<td></td>
<td>
<input type="hidden" name="id" value="<?php echo $setting->id ?>" />
<input type="hidden" name="action" value="<?php echo $action?>" />
<input type="submit" value="Save Settings"></td>
</tr>
</table>
</form>