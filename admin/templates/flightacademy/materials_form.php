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



<h3>Training Materials</h3>


<form name="mentors" action="<?php echo SITE_URL; ?>/admin/index.php/FlightAcademy/materialaction/" method="post">
<table class="academytable02" width="700px">
      <tr></tr>
      <tr>
        <td valign="top" style="font-weight:bold">Title:</td>
        <td><input name="mattitle" type="text" required value="<?php echo $material->mattitle; ?>" size="60" /></td>
      </tr>
      <tr>
        <td valign="top" style="font-weight:bold">Description:</td>
        <td><textarea name="matdescription" cols="60" rows="5" required="required"><?php echo $material->matdescription; ?></textarea></td>
      </tr>
      <tr>
        <td valign="top" style="font-weight:bold">Download Path<br />
          (full URL including http://):</td>
        <td><input name="downloadurl" type="text" value="<?php echo $material->downloadurl; ?>" size="60" /></td>
      </tr>
      <tr>
        <td valign="top" style="font-weight:bold">Material belongs to Course:</td>
        <td><select name="belongsto">
          <?php if($material->belongsto == 'ALL')
{ $sel15 = "selected";
                         }
                         ?>
          <option value="ALL" <?php echo $sel15 ?>>ALL</option>
          <?php
		if($classes)
		foreach($classes as $class)
		{
			if($class->id == $material->belongsto)
				$sel = 'selected';
			else
				$sel = '';
	
			echo '<option value="'.$class->id.'" '.$sel.'>'.$class->traname.'</option>';
		} ?>
        </select></td>
      </tr>
      <tr>
        <td valign="top" style="font-weight:bold">Status:</td>
        <td><select name="status">
          <?php 
                       
                         if($class->status == "1") { 
                         $sel1 = "selected";
                         }
                         if($class->status == "0") { 
                         $sel2 = "selected";
                         }
                         ;?>
          <option value="1" <?php echo $sel1 ?>>Active</option>
          <option value="0" <?php echo $sel2 ?>>Incative</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="2"><br />
          <br />
          <input type="hidden" name="id" value="<?php echo $material->id ?>" />
          <input type="hidden" name="action" value="<?php echo $action?>" />
          <input type="submit" value="Save Material" /></td>
      </tr>
    </table>
</form>