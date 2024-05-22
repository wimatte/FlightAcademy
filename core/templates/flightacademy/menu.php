<?php
// *************************************************************************
// * CrazyCreatives.com Flight Academy module for phpVMS va system         *
// * Copyright (c) Manuel Seiwald (crazycreatives) All Rights Reserved     *
// * Release Date: October 2013                                            *
// * Version 1.01                                                          *
// * Email: info@crazycreatives.com                                        *
// * Website: http://www.crazycreatives.com                                *
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
<link rel="stylesheet" media="all" type="text/css" href="<?php echo SITE_URL?>/core/modules/FlightAcademy/flightacademy.css" />

<div align="center">
<?php 
$setting = FlightAcademyData::GetSettings();
if($setting->logourl) { ?>
<img src="<?php echo $setting->logourl; ?>" alt="Flight Training Logo" style="max-width:100%" />
<br /><br />
<?php } ?>

<a href="<?php echo SITE_URL; ?>/index.php/FlightAcademy/mytraining" class="stdbutton">My Course</a> | <a href="<?php echo SITE_URL; ?>/index.php/FlightAcademy/mytraininglog" class="stdbutton">My Training Flight Log</a> | <a href="<?php echo SITE_URL; ?>/index.php/FlightAcademy/myhistory" class="stdbutton">My Training History</a> | <a href="<?php echo SITE_URL; ?>/index.php/FlightAcademy/myexams" class="stdbutton">Exam Center</a> | <a href="<?php echo SITE_URL; ?>/index.php/FlightAcademy/livecourses" class="stdbutton">Live Courses</a>

<br /></div>
<hr />