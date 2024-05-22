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

<table class="academytable02">
<td>Title</td>
<td>Description</td>
<td>Belongs To</td>
<td>Last Update</td>
<td>By</td>
<td>Revision Number</td>
<td>Status</td>
<td>Download</td>
<td>Edit</td>
<td>Delete</td>
</tr>
<?php if(!$materials)
{ echo "<tR><td colspan='5'>No Materials added!</td></tr>"; }
else
foreach ($materials as $material)
{
?>
<tr>
<td><?php echo $material->mattitle; ?></td>
<td><?php echo $material->matdescription; ?></td>
<td><?php if($material->belongsto == 'ALL') { echo "All Courses"; } else { 
$classinfo = FlightAcademyData::GetClassById($material-belongsto);
echo $classinfo->traname; } ?></td>
<td><?php echo $material->lastupdate; ?></td>
<td><?php echo $material->addedby; ?></td>
<td><?php echo $material->revision; ?></td>
<td><?php if($material->status == "1") {
echo "ACTIVE"; } else { echo "INCATIVE"; } ?></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo $material->downloadurl; ?>" target="_blank">Download</a></td>
<td><a style="color:#06C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/editmaterial/<?php echo $material->id; ?>">Edit</a></td>
<td><a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deletematerial/<?php echo $material->id; ?>">Delete</a></td>
</tr>
<?php
}
?>
</table>