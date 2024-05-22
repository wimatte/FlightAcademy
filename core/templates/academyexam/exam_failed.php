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

<div align="right">
<img src="<?php echo SITE_URL?>/core/modules/CrewTest/images/header.png" style="border-bottom:2px solid #039; margin-right:0px;"  /><img src="<?php echo SITE_URL?>/core/modules/AcademyExam/images/examcenterlogo.png" style="border-bottom:2px solid #039; margin-left:0px;" />
</div>

<div style="background:#FFF">

<table width="100%" border="0" style="font-weight:bold; font-size:10px; color:#039"><tr>
<td align="right">&nbsp;</td>
</tr>
</table>

<div align="left" style="padding:10px; color:#000; background:#FFF">
<div class="header1"><?php echo SITE_NAME; ?>'s ExamCenter | Exam Results</div>
<hr />
<br /><br />
<div align="center" style="font-size:24px; color:#039">
<?php echo $exam->result; ?>%
</div>
<br /><br />
<div align="center"><strong>Sorry you have FAILED the Exam with <?php echo $exam->correctq ?> correct questions out of <?php echo $setting->questioncount; ?>.</strong><br /><br />
Please get in contact with your Instructor before re-taking the exam.<br /><bR />
<a href="<?php echo SITE_URL; ?>/index.php/FlightAcademy" class="examcenterbutton1">Back to Training</a>
</div>
<br />
<br />
<hr />
</div>
</div>
<br />
<br />
<div style="position: absolute; bottom: 2px; width: 100%;">
<table width="100%" border="0" style="font-size:10px; font-weight:bold">
<tr><td>version 1.01
</td><td align="right">AcademyExam is Copyright &copy; <?php echo date('Y') ?> <a href="http://www.crazycreatives.com" target="_blank" style="color:#000">crazycreatives.com</a>
</td></tr></table>
</div>
</div>
</div>
