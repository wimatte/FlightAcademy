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



<h3>New Training Course</h3>


<form name="mentors" action="<?php echo SITE_URL; ?>/admin/index.php/FlightAcademy/addclass_step2/" method="post">
<table class="academytable01" width="700px">
<tr></tr>

<tr>
<td valign="top" style="font-weight:bold">Select Course Type:</td>
<td>
<select name="tratype">
		<option value="permanent">Permanent Course</option>
		<option value="typerating">Typerating Course</option>
        <option value="oneday">Live Training (One Day Course)</option>
		</select>
 </td>
</tr>
<tr>
<td valign="top" style="font-weight:bold">Class Title:</td>
<td><input name="traname" type="text" required value="" size="70" /></td>
</tr>
<tr>
<td colspan="2">
<br /><br />
<input type="submit" value="Continue"></td>
</tr>
</table>
</form>