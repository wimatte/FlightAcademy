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


<h3>My Training Flight Log</h3>

<table class="academytable02">
<td>Flightnumber</td>
<td>Dep. Icao</td>
<td>Arr. Icao</td>
<td>Aircraft</td>
<td>Flighttime</td>
<td>Landing Rate</td>
<td>Date</td>
</tr>
<?php if(!$trainflights)
{ echo "<tR><td colspan='5'>No Training Flights flown!</td></tr>"; }
else
foreach ($trainflights as $flight)
{
?>
<tr>
<td><?php echo $flight->code.''.$flight->flightnum; ?></td>
<td><?php echo $flight->depicao; ?></td>
<td><?php echo $flight->arricao; ?></td>
<td><?php echo $flight->aircraft; ?></td>
<td><?php echo $flight->flighttime_stamp; ?></td>
<td><?php echo $flight->landingrate; ?> ft/m</td>
<td><?php echo $flight->submitdate; ?></td>
</tr>
<?php
}
?>
</table>

