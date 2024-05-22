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
$pilotdetail = PilotData::getPilotData($exam->pilotid);
$pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);
?>

<h3>Exam Details</h3>
<div style="width:500px">
<table class="academytable02">
<tr></tr>
<tr><td><strong>Student PID:</strong></td><td><?php echo $pilotid; ?></td></tr>
<tr><td><strong>Student Name:</strong></td><td><?php echo $pilotdetail->firstname.' '.$pilotdetail->lastname; ?></td></tr>
<tr><td><strong>Exam ID:</strong></td><td><?php echo $exam->id; ?></td></tr>
<tr><td><strong>Exam:</strong></td><td><?php echo $exam->examtitle; ?></td></tr>
<tr><td><strong>Result:</strong></td><td><?php echo $exam->passfail; ?></td></tr>
<tr>
  <td><strong>Reached Percent:</strong></td><td><?php echo $exam->result; ?>%</td></tr>
<tr><td><strong>Required Percent:</strong></td><td><?php echo $exam->passpercentage; ?>%</td></tr>
<tr><td><strong>Correct Answers:</strong></td><td><?php echo $exam->correctq; ?></td></tr>
<tr><td><strong>False Answers:</strong></td><td><?php echo $exam->wrongq; ?></td></tr>
<tr><td><strong>Exam Taken on:</strong></td><td><?php echo $exam->gradedate; ?></td></tr>
</table>
</div>

<h3>Exam Questions</h3>

<?php foreach($questions as $quest) 
{
if($quest->correctanswer == $quest->givenanswer)
{
$tablestyle = "style='background-color:#E7FEEA;'";
}
else
{
$tablestyle = "style='background-color:#FFE1E1;'";
}
if($quest->correctanswer == "answerone") 
{
$row1style = "style='background-color:#E7FEEA;'";
}
else 
{
$row1style = "style='background-color:#FFE1E1;'";
}
if($quest->correctanswer == "answertwo") 
{
$row2style = "style='background-color:#E7FEEA;'";
}
else 
{
$row2style = "style='background-color:#FFE1E1;'";
}
if($quest->correctanswer == "answerthree") 
{
$row3style = "style='background-color:#E7FEEA;'";
}
else 
{
$row3style = "style='background-color:#FFE1E1;'";
}
if($quest->correctanswer == "answerfour") 
{
$row4style = "style='background-color:#E7FEEA;'";
}
else 
{
$row4style = "style='background-color:#FFE1E1;'";
}
 ?>
<table width="100%" cellspacing="5" cellpadding="5px">
<tr>
<td valign="top" rowspan="4" width="500px" <?php echo $tablestyle ?>>
<?php if($quest->questionimage)
{?>
<a href="<?php echo $quest->questionimage; ?>" target="_blank">View Image</a><br />
<?php } ?>
<strong><?php echo $quest->tquestion; ?></strong></td>

<td width="20px"><?php if($quest->givenanswer == 'answerone') { ?><input name="" type="checkbox" disabled="disabled" value="" checked="checked" /><?php } else { ?><input name="" type="checkbox" disabled="disabled" value="" /><?php } ?></td>
<td valign="top" width="450px" <?php echo $row1style ?>><?php echo $quest->answerone; ?></td>
</tr>

<tr>
<td width="20px"><?php if($quest->givenanswer == 'answertwo') { ?><input name="" type="checkbox" disabled="disabled" value="" checked="checked" /><?php } else { ?><input name="" type="checkbox" disabled="disabled" value="" /><?php } ?></td>
<td valign="top" <?php echo $row2style ?>><?php echo $quest->answertwo; ?></td>


</tr>
<tr>
<td width="20px"><?php if($quest->givenanswer == 'answerthree') { ?><input name="" type="checkbox" disabled="disabled" value="" checked="checked" /><?php } else { ?><input name="" type="checkbox" disabled="disabled" value="" /><?php } ?></td>
<td valign="top" <?php echo $row3style ?>><?php echo $quest->answerthree; ?></td>


</tr>
<tr>
<td width="20px"><?php if($quest->givenanswer == 'answerfour') { ?><input name="" type="checkbox" disabled="disabled" value="" checked="checked" /><?php } else { ?><input name="" type="checkbox" disabled="disabled" value="" /><?php } ?></td>
<td valign="top" <?php echo $row4style ?>><?php echo $quest->answerfour; ?></td>


</tr>
</table>
<hr />
<?php
}
?>
