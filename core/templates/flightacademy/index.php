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

<h3>Welcome to <?php echo $setting->academyname; ?></h3>
<br />
<?php echo $setting->welcometext; ?>
<br />
<hR />
<?php 
if(!$allclasses)
{ 
?>
Currently we dont have any courses available! Please check back soon!
<?php
}
else
{
?>
Please find a list of our currently available courses below and feel free to sign up!
<br /><br />
<?php
}
?>

<?php 
if($ondaclasses)
{ 
?>
<h3>Upcoming Live Training Courses</h3>

<table class="academytable02">
<tr>
<td>Title</td>
<td>Date</td>
<td>Starttime</td>
<td>Difficulty</td>
<td>Required Rank</td>
<td>Info</td>
</tr>
<?php 
foreach($ondaclasses as $class)
{
$rankrequired = RanksData::getRankInfo($class->ranklevel);
if($class->ranklevel == '0')
{
$rankrequired->rank = "None";
}
?>
<tr>
<td><?php echo $class->traname; ?></td>
<td><?php echo $class->startdate; ?></td>
<td><?php echo $class->starttime; ?></td>
<td style="width:200px;"><?php 
 if($class->difficultylevel == "1") { 
                         echo "Easy";
                         }
                         if($class->difficultylevel == "2") { 
                         echo "Intermediate";
                         }
                         if($class->difficultylevel == "3") { 
                         echo "Advanced";
                         }
                         if($class->difficultylevel == "4") { 
                         echo "Expert";
                         }
                         ?>
</td>
<td style="width:200px;"><?php echo $rankrequired->rank; ?></td>
<td style="width:150px;"><a href="<?php echo SITE_URL; ?>/index.php/FlightAcademy/classinfo_onda/<?php echo $class->id; ?>" class="stdbutton">More Info</a></td>
</tr><?php } ?>
</table>
<?php } ?>




<?php 
if($permclasses)
{ 
?>
<h3>Available Permanent Courses</h3>

<table class="academytable02">
<tr>
<td>Title</td>
<td>Difficulty</td>
<td>Required Rank</td>
<td>Info</td>
</tr>
<?php 
foreach($permclasses as $class)
{
$rankrequired = RanksData::getRankInfo($class->ranklevel);
if($class->ranklevel == '0')
{
$rankrequired->rank = "None";
}
?>
<tr>
<td><?php echo $class->traname; ?></td>
<td style="width:200px;"><?php 
 if($class->difficultylevel == "1") { 
                         echo "Easy";
                         }
                         if($class->difficultylevel == "2") { 
                         echo "Intermediate";
                         }
                         if($class->difficultylevel == "3") { 
                         echo "Advanced";
                         }
                         if($class->difficultylevel == "4") { 
                         echo "Expert";
                         }
                         ?></td>
<td style="width:200px;"><?php echo $rankrequired->rank; ?></td>
<td style="width:150px;"><a href="<?php echo SITE_URL; ?>/index.php/FlightAcademy/classinfo/<?php echo $class->id; ?>" class="stdbutton">More Info</a></td>
</tr><?php } ?>
</table>
<?php } ?>




<?php 
if($tyraclasses)
{ 
?>
<h3>Available Type Rating Courses</h3>

<table class="academytable02">
<tr>
<td>Aircraft</td>
<td>Title</td>
<td>Difficulty</td>
<td>Required Rank</td>
<td>Info</td>
</tr>
<?php 
foreach($tyraclasses as $class)
{
$rankrequired = RanksData::getRankInfo($class->ranklevel);
if($class->ranklevel == '0')
{
$rankrequired->rank = "None";
}
?>
<tr>
<td><?php echo $class->aircrafttype; ?></td>
<td><?php echo $class->traname; ?></td>
<td style="width:200px;"><?php 
 if($class->difficultylevel == "1") { 
                         echo "Easy";
                         }
                         if($class->difficultylevel == "2") { 
                         echo "Intermediate";
                         }
                         if($class->difficultylevel == "3") { 
                         echo "Advanced";
                         }
                         if($class->difficultylevel == "4") { 
                         echo "Expert";
                         }
                         ?></td>
<td style="width:200px;"><?php echo $rankrequired->rank; ?></td>
<td style="width:150px;"><a href="<?php echo SITE_URL; ?>/index.php/FlightAcademy/classinfo/<?php echo $class->id; ?>" class="stdbutton">More Info</a></td>
</tr><?php } ?>
</table>
<?php } ?>



<?php 
if($upcoming)
{ 
?>
<h3>Upcoming Courses</h3>

<table class="academytable02">
<tr>
<td>Title</td>
<td>Difficulty</td>
<td>Required Rank</td>
</tr>
<?php 
foreach($upcoming as $class)
{
$rankrequired = RanksData::getRankInfo($class->ranklevel);
if($class->ranklevel == '0')
{
$rankrequired->rank = "None";
}
?>
<tr>
<td><?php echo $class->traname; ?></td>
<td><?php 
 if($class->difficultylevel == "1") { 
                         echo "Easy";
                         }
                         if($class->difficultylevel == "2") { 
                         echo "Intermediate";
                         }
                         if($class->difficultylevel == "3") { 
                         echo "Advanced";
                         }
                         if($class->difficultylevel == "4") { 
                         echo "Expert";
                         }
                         ?></td>
<td><?php echo $rankrequired->rank; ?></td>
</tr><?php } ?>
</table>
<?php } ?>