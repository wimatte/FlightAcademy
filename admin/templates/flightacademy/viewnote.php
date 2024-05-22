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



<h3>View Note</h3>
<a style="color:#09C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/viewprogress_sheet/<?php echo $training->traid; ?>">Back To Progress Sheet</a><br />
<a style="color:#09C; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/editnote/<?php echo $note->id; ?>">Edit Note</a><br />
<a style="color:#C00; font-size:14px; font-weight:bold" href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/deletenote/<?php echo $note->id; ?>?traid=<?php echo $training->traid; ?>">Delete Note</a>

<br /><br />

added by <?php echo $note->firstname.' '.$note->lastname; ?> on <?php echo $note->submitdate; ?>

<br />
<hr />
<br />
<?php echo $note->comment; ?>

