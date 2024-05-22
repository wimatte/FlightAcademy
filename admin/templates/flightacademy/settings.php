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



<h3>Flight Academy Settings</h3>


<form name="flightacademy" action="<?php echo SITE_URL; ?>/admin/index.php/FlightAcademy/savesettings/1" method="post">
<table class="academytable01" width="700px">
<tr></tr>
<tr>
<td valign="top" style="font-weight:bold">Academy Name:</td>
<td><input type="text" name="academyname" value="<?php echo $setting->academyname;?>" required /></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Welcome Text:</td>
<td><textarea name="welcometext" cols="50" rows="6"><?php echo $setting->welcometext; ?></textarea></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Status:</td>
<td>
<select name="status">
                 <option value="">Please Select</option>
                         <?php 
                       
                         if($setting->status == "1") { 
                         $sel1 = "selected";
                         }
                         elseif($setting->status == "2") { 
                         $sel2 = "selected";
                         }
                         ;?>
                         
                         
				 <option value="1" <?php echo $sel1 ?>>Opened</option>
                 <option value="2" <?php echo $sel2 ?>>Closed</option>
                
 </select>
 </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Training Center Logo URL:<br />(including http://)</td>
<td valign="top"><input type="text" name="logourl" value="<?php echo $setting->logourl;?>" /></td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Flight Training Airline Code:<br />(3 Letter Code used for Training Flights)</td>
<td valign="top"><input type="text" name="airlinecode" value="<?php echo $setting->airlinecode;?>" /></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Save Settings"></td>
</tr>
</table>
</form>