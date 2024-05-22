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
<link rel="stylesheet" media="all" type="text/css" href="<?php echo SITE_URL?>/core/modules/AcademyExam/academyexam.css" />


<div align="center">
<div style="width:650px; border:2px solid #039; min-height:400px; background:#F4F4F4; color:#000; position:relative">

<div align="right" style="background-color:#039">
<img src="<?php echo SITE_URL?>/core/modules/AcademyExam/images/header.png" style="border-bottom:2px solid #039; margin-right:0px;"  /><img src="<?php echo SITE_URL?>/core/modules/AcademyExam/images/examcenterlogo.png" style="border-bottom:2px solid #039; margin-left:0px;" />
</div>

<div style="background:#FFF">
<div align="left" style="padding:10px; color:#000; background:#FFF">
<div class="header1"><?php echo SITE_NAME; ?>'s ExamCenter</div>

<br />
<?php if($setting->examimage)
{ ?>
<img src="<?php echo $setting->examimage ?>" alt="" style="max-width:600px;"  /><br /><br />
<?php
}
?>
<?php echo nl2br($setting->welcometext); ?>
<br />
<br />
<hr />
</div>
</div>



<div align="left" style="padding:10px; color:#000;">
<strong>Test Information:</strong><br /><br />

<table width="300px" border="0">
<tr>
<td style="font-weight:bold">Test Title:</td>
<td><?php echo $setting->examtitle; ?></td>
</tr>
<tr>
<td style="font-weight:bold">Number of Questions:</td>
<td><?php echo $setting->questioncount; ?></td>
</tr>
<tr>
<td style="font-weight:bold">Time per Question:</td>
<td><?php echo $setting->questiontime; ?> seconds</td>
</tr>
<tr>
<td style="font-weight:bold">Required Percentage to Pass:</td>
<td><?php echo $setting->passpercentage; ?>%</td>
</tr>
<tr>
<td style="font-weight:bold">Days Blocked (if failed exam):</td>
<td><?php echo $setting->daysfailed; ?> days</td>
</tr>
</table>


<hr />
<br />
<br />
<table width="100%" border="0">
<tr>
<td valign="top" style="padding-right:10px;">
<strong>Start your Test</strong>
<br />
<br />
Please note that you need to have Cookies enabled in your browser in order to begin your exam. Do not try to reload the page or use the &quot;back&quot; button while the exam is in progress. If you do so your exam will stop and you will need to wait for your instructor to clear the exam before it can be re-started.

</td>
<td rowspan="2" width="50%" valign="top" style="padding-left:10px; border-left:1px solid #039; color:#C00"><strong>Important</strong>:<bR /><br />
Please note that after clicking on start exam you will be directly forwarded to the first question. There is no option to take a break and continue the exam later. The whole exam must be completed at once. <br /><bR />
Also make sure that you have read and understood the full training documentation before taking this exam.
</td>
</tr>
<tr>
<td valign="bottom">
<br /><br />
<a href="<?php echo SITE_URL ?>/index.php/AcademyExam/createexam?traid=<?php echo $traid; ?>&setid=<?php echo $setting->id; ?>" class="examcenterbutton1">Start Exam</a>
</td>

</tr>
</table>


<br />
<br />
<hr />
<br />
</div>
<div style="position: absolute; bottom: 2px; width: 100%;">
<table width="100%" border="0" style="font-size:10px; font-weight:bold">
<tr><td>version 1.01
</td><td align="right">ExamCenter is Copyright &copy; <?php echo date('Y') ?> <a href="http://www.crazycreatives.com" target="_blank" style="color:#000">crazycreatives.com</a>
</td></tr></table>

</div>
</div>
</div>