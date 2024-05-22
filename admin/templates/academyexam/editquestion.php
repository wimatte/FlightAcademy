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

<div class="header1">ExamCenter Question Form</div>
<br />
<form name="crewtest" action="<?php echo SITE_URL; ?>/admin/index.php/AcademyExam/questionaction/" method="post">
<table class="maintable" width="700px">
<tr></tr>
<tr>
<td valign="top" style="font-weight:bold">Question:</td>
<td><textarea name="tquestion" cols="50" rows="3"><?php echo $question->tquestion; ?></textarea></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Answer A:</td>
<td><textarea name="answerone" cols="50" rows="3"><?php echo $question->answerone; ?></textarea></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Answer B:</td>
<td><textarea name="answertwo" cols="50" rows="3"><?php echo $question->answertwo; ?></textarea></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Answer C:</td>
<td><textarea name="answerthree" cols="50" rows="3"><?php echo $question->answerthree; ?></textarea></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Answer D:</td>
<td><textarea name="answerfour" cols="50" rows="3"><?php echo $question->answerfour; ?></textarea></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Correct Answer:</td>
<td>
<select name="goodanswer">
                         <?php 
                       
                         if($question->goodanswer == "answerone") { 
                         $sel1 = "selected";
                         }
                         elseif($question->goodanswer == "answertwo") { 
                         $sel2 = "selected";
                         }
                         elseif($question->goodanswer == "answerthree") { 
                         $sel3 = "selected";
                         }
                         elseif($question->goodanswer == "answerfour") { 
                         $sel4 = "selected";
                         }
                         ;?>
                         
                         
				 <option value="answerone" <?php echo $sel1 ?>>Answer A</option>
                 <option value="answertwo" <?php echo $sel2 ?>>Answer B</option>
                 <option value="answerthree" <?php echo $sel3 ?>>Answer C</option>
                 <option value="answerfour" <?php echo $sel4 ?>>Answer D</option>     
 </select>
 </td>
</tr>

<tr>
<td valign="top" style="font-weight:bold">Question Image:<br />
(Full URL incl. http://  - leave blank if no image)</td>
<td><input type="text" name="questionimage" value="<?php echo $question->questionimage;?>" /></td>
</tr>

<tr>
<td valign="top" style="font-weight:bold">Enabled:</td>
<td>
<select name="enabled">
                         <?php 
                       
                         if($question->enabled == "1") { 
                         $sel1 = "selected";
                         }
                         if($question->enabled == "0") { 
                         $sel2 = "selected";
                         }
                         ;?>
                         
                         
				 <option value="1" <?php echo $sel1 ?>>Enabled</option>
                 <option value="0" <?php echo $sel2 ?>>Disabled</option>     
 </select>
 </td>
</tr>
<tr>
<td></td>
<td>
<input type="hidden" name="id" value="<?php echo $question->id?>" />
<input type="hidden" name="examid" value="<?php echo $examid?>" />
<input type="hidden" name="action" value="<?php echo $action?>" />
<input type="submit" value="Save Question"></td>
</tr>
</table>
</form>