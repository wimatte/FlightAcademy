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
<h3>Exam Questions for <?php echo $setting->examtitle; ?></h3>

<strong><a href="<?php echo SITE_URL?>/admin/index.php/AcademyExam/addquestion/<?php echo $setting->id; ?>">Add Question to Exam</a></strong>
<?php
$enabledcount = count($questions);
$disabledcount = count($disableds);
?>
<br /><br />
<?php if($setting->questioncount > $enabledcount) { echo "<font color='#FF0000' style='font-weight:bold'>You need  ".($setting->questioncount - $enabledcount)." more enabled Questions.</font>"; } else
{ echo "<font color='#009900' style='font-weight:bold'>The correct amount of Questions is enabled!</font>"; } ?>
<br />
<br />
<div class="header1">Enabled Exam Questions (currently <?php echo $enabledcount; ?>)</div>

<br />
<table width="100%" class="crewtesttable">
<tr>
<td>Question #</td>
<td>Question</td>
<td>Good Answer</td>
<td>Delete</td>
<td>Disable</td>
<td>Edit</td>
</tr>
<?php if(!$questions)
{ ?>
<tr><td colspan="5">
No Enabled Questions!</td></tr>
<?php
 }
 else
 foreach($questions as $question)
 {
  ?>
 <tr>
 <td><?php echo $question->id; ?></td>
 <td><?php echo $question->tquestion; ?></td>
 
 <td><?php if($question->goodanswer == "answerone") { echo $question->answerone; } elseif($question->goodanswer == "answertwo") { echo $question->answertwo; } elseif($question->goodanswer == "answerthree") { echo $question->answerthree; } elseif($question->goodanswer == "answerfour") { echo $question->answerfour; } ?></td>
 
 <td style="background:#F00"><a href="<?php echo SITE_URL ?>/admin/index.php/AcademyExam/deletequestion/<?php echo $question->id ?>?examid=<?php echo $setting->id; ?>"
                onclick="return confirm(\'Are you sure you want to delete this position?\')" "<?php echo SITE_URL ?>/admin/index.php/AcademyExam/deletequestion/<?php echo $question->id ?>?examid=<?php echo $setting->id; ?>"><font color="#FFFFFF">Delete</font></a></td>
   <td><a href="<?php echo SITE_URL ?>/admin/index.php/AcademyExam/disablequestion/<?php echo $question->id ?>?examid=<?php echo $setting->id; ?>">Disable</a></td>
 <td><a href="<?php echo SITE_URL ?>/admin/index.php/AcademyExam/editquestion/<?php echo $question->id ?>?examid=<?php echo $setting->id; ?>">Edit</a></td>
 </tr>
 <?php
 } 
 ?>
 </table>
 
 <hr />
 
 
 <div class="header1">Disabled Exam Questions (currently <?php echo $disabledcount; ?>)</div>
<br />
<table width="100%" class="crewtesttable">
<tr>
<td>Question #</td>
<td>Question</td>
<td>Good Answer</td>
<td>Delete</td>
<td>Enable</td>
<td>Edit</td>
</tr>
<?php if(!$disableds)
{ ?>
<tr><td colspan="5">
No Disabled Questions!</td></tr>
<?php
 }
 else
 foreach($disableds as $question)
 {
  ?>
 <tr>
 <td><?php echo $question->id; ?></td>
 <td><?php echo $question->tquestion; ?></td>
 
 <td><?php if($question->goodanswer == "answerone") { echo $question->answerone; } elseif($question->goodanswer == "answertwo") { echo $question->answertwo; } elseif($question->goodanswer == "answerthree") { echo $question->answerthree; } elseif($question->goodanswer == "answerfour") { echo $question->answerfour; } ?></td>
 
 <td style="background:#F00"><a href="<?php echo SITE_URL ?>/admin/index.php/AcademyExam/deletequestion/<?php echo $question->id ?>?examid=<?php echo $setting->id; ?>"
                onclick="return confirm(\'Are you sure you want to delete this position?\')" "<?php echo SITE_URL ?>/admin/index.php/AcademyExam/deletequestion/<?php echo $question->id ?>?examid=<?php echo $setting->id; ?>"><font color="#FFFFFF">Delete</font></a></td>
                <td><a href="<?php echo SITE_URL ?>/admin/index.php/AcademyExam/enablequestion/<?php echo $question->id ?>?examid=<?php echo $setting->id; ?>">Enable</a></td>
 <td><a href="<?php echo SITE_URL ?>/admin/index.php/AcademyExam/editquestion/<?php echo $question->id ?>?examid=<?php echo $setting->id; ?>">Edit</a></td>
 </tr>
 <?php
 } 
 ?>
 </table>