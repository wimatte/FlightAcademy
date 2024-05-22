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




<h3>Training Aircraft</h3>
<table width="100%" class="academytable02">
<tr>
<td>Icao</td>
<td>Name</td>
<td>Registration</td>
<td>Curr. Location</td>
<td>Remove</td>
<tr>
<?php 
if(!$aircraft)
{
?>
<tr>
  <td colspan="7">No Aicraft assigned to Flight Training!</td></tr>
<?php
}
else
{
foreach($aircraft as $ac)
{
?>
<tr>
<td>
<?php echo $ac->icao; ?>
</td>
<td>
<?php echo $ac->name; ?>
</td>
<td>
<?php echo $ac->registration; ?>
</td>
<td>
<?php
$currlocation = FlightAcademyData::getAcLocation($ac->id);
 echo $currlocation->arricao; ?></td>
<td>
<a href="<?php echo SITE_URL ?>/admin/index.php/FlightAcademy/remove_aircraft/<?php echo $ac->eaid ?>"
                onclick="return confirm(\'Are you sure you want to remove this aircraft?\')" "<?php echo SITE_URL ?>/admin/index.php/FlightAcademy/remove_aircraft/<?php echo $ac->eaid ?>">Remove</a>
</td>
</tr>
<?php
} 
}
?>
</table>