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
<br /><br />
<strong><a href="<?php echo SITE_URL?>/admin/index.php/AcademyExam/settings/">Add Exam</a></strong>

<br />
<div class="header1">Available Exams</div>
<br />

<table width="100%" class="crewtesttable">
<tr>
<td>Exam ID</td>
<td>Title</td>
<td>Questions</td>
<td>Edit Exam</td>
<td>Delete Exam</td>
</tr>
<?php if(!$exams)
{ ?>
<tr><td colspan="5">Exams Added!</td></tr>
<?php
 }
 else
 foreach($exams as $exam)
 {
  ?>
 <tr>
 <td><?php echo $exam->id ?></td>
 <td><?php echo $exam->examtitle ?></td>
 <td><a href="<?php echo SITE_URL?>/admin/index.php/AcademyExam/questions/<?php echo $exam->id; ?>">Questions</a></td>
 <td><a href="<?php echo SITE_URL?>/admin/index.php/AcademyExam/edittheesettings/<?php echo $exam->id; ?>">Edit Exam</a></td>
  <td><a href="<?php echo SITE_URL?>/admin/index.php/AcademyExam/delete_exam/<?php echo $exam->id; ?>"><font color="#CC0000">Delete Exam</font></a></td>
 </tr>
 <?php
 }
 ?>
</table>