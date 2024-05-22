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



<h3>Lesson Form for <?php echo $class->traname; ?></h3>


<form name="lessons" action="<?php echo SITE_URL; ?>/admin/index.php/FlightAcademy/lessonaction/" method="post">
<table class="academytable02" width="700px">
<tr></tr>
<tr>
<td valign="top" style="font-weight:bold">Lesson Number:</td>
<td>
<input name="lessonnum" type="text" required value="<?php echo $lesson->lessonnum; ?>" size="20" />
 </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Lesson Title:</td>
<td>
<input name="lestitle" type="text" required value="<?php echo $lesson->lestitle; ?>" size="60" />
 </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Lesson:</td>
<td><textarea id="editor" name="lestext" cols="110" rows="30"><?php echo $lesson->lestext; ?></textarea></td>
</tr>



<tr>
<td valign="top" style="font-weight:bold">Status:</td>
<td>
<select name="status">
                         <?php 
                       
                         if($lesson->status == "1") { 
                         $sel1 = "selected";
                         }
                         if($lesson->status == "0") { 
                         $sel2 = "selected";
                         }
                         ;?>
                         
                         
				 <option value="1" <?php echo $sel1 ?>>Active</option>
                 <option value="0" <?php echo $sel2 ?>>Incative</option>     
 </select>
 </td>
</tr>
<tr>
<td colspan="2">
<br /><br />
<input type="hidden" name="classid" value="<?php echo $class->id ?>" />
<input type="hidden" name="id" value="<?php echo $lesson->id ?>" />
<input type="hidden" name="action" value="<?php echo $action?>" />
<input type="submit" value="Save Lesson"></td>
</tr>
</table>
</form>