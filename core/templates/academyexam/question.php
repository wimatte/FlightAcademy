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
?><head>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo SITE_URL?>/core/modules/AcademyExam/academyexam.css" />
</head>

<div align="center">
<div style="width:650px; border:2px solid #039; min-height:400px; background:#F4F4F4; color:#000; position:relative">

<div align="right">
<img src="<?php echo SITE_URL?>/core/modules/AcademyExam/images/header.png" style="border-bottom:2px solid #039; margin-right:0px;"  /><img src="<?php echo SITE_URL?>/core/modules/AcademyExam/images/examcenterlogo.png" style="border-bottom:2px solid #039; margin-left:0px;" />
</div>

<div style="background:#FFF">

<table width="100%" border="0" style="font-weight:bold; font-size:10px; color:#039"><tr>
<td>Exam Progress: Question <?php echo ($exam->correctq + $exam->wrongq +1); ?> of <?php echo $setting->questioncount; ?></td><td align="center">
</td>



<td align="right">&nbsp;</td>
</tr>
</table>

<div align="left" style="padding:10px; color:#000; background:#FFF">
<div class="header1"><?php echo SITE_NAME; ?>'s ExamCenter |  Exam</div>
<hr />
<?php if($question->questionimage)
{ ?>
<div align="center" style="border:1px solid #CCC; padding:5px;">
<img src="<?php echo $question->questionimage ?>" alt="" style="max-width:600px;"  />
</div>
<?php
}
?>
<br /><br />
<strong>Question <?php echo ($exam->correctq + $exam->wrongq +1); ?>:</strong>
<br /><br />
<div style="padding:10px; border:1px solid #C7C7C7;">
<?php echo $question->tquestion;?>

</div>
<br />
<br />
<hr />
</div>
</div>
<form action="<?php echo SITE_URL; ?>/index.php/AcademyExam/academyexam_question/<?php echo $exam->id;?>" method="post">
<table class="maintable">
<tr></tr>
<tr><td>A. </td><td>
<?php echo $question->answerone;?></td><td><input name="useranswer" value="answerone" type="radio" /></td></tr>
<tr><td>B. </td><td>
<?php echo $question->answertwo;?></td><td><input name="useranswer" value="answertwo" type="radio" /></td></tr>
<tr><td>C. </td><td>
<?php echo $question->answerthree;?></td><td><input name="useranswer" value="answerthree" type="radio" /></td></tr>
<tr><td>D. </td><td>
<?php echo $question->answerfour;?></td><td><input name="useranswer" value="answerfour" type="radio" /></td></tr>
</table>
<br /><br />
<?php
$show = '0';
?>
<input type="hidden" name="show" value="1" />
<input type="hidden" name="gradequestion" value="1" />
<input type="hidden" name="totalquestion" value="<?php echo ($exam->correctq + $exam->wrongq +1); ?>" />
<input type="hidden" name="questionid" value="<?php echo $question->qid; ?>" />
<input type="hidden" name="questionnum" value="<?php echo $question->qnum; ?>" />

<?php if (($exam->correctq + $exam->wrongq +1) == $setting->questioncount) {  ?>
<input id="submit" class="examcenterbutton1" type="submit" name="submit" value="Exam Results" />
<?php
}
else
{
?>
<input id="submit" class="examcenterbutton1" type="submit" name="submit" value="Next Question -->" />
<?php } ?>
</form>



<br />
<br />
<div style="position: absolute; bottom: 2px; width: 100%;">
<table width="100%" border="0" style="font-size:10px; font-weight:bold">
<tr><td>version 1.01
</td><td align="right">ExamCenter is Copyright &copy; <?php echo date('Y') ?> <a href="http://www.crazycreatives.com" target="_blank" style="color:#000">crazycreatives.com</a>
</td></tr></table>
</div>
</div>
</div>