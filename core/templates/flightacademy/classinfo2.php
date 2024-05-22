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

<h3>Course Info for <?php echo $class->traname; ?></h3>

<?php if($class->imageurl) { ?>
<div align="center"><img src="<?php echo $class->imageurl; ?>" alt="Flight Training Logo" style="max-width:100%" /></div>
<br /><br />
<?php } ?>
<table class="academytable02">
<tr></tr>
<tr>
<td valign="top">Course Description:</td><td valign="top"><?php echo nl2br($class->description); ?></td>
</tr>
<tr>
<td valign="top">Takes Place on:</td><td valign="top"><?php echo $class->startdate; ?></td>
</tr>
<tr>
<td valign="top">At:</td><td valign="top"><?php echo $class->starttime; ?></td>
</tr>
<tr>
<td valign="top">Using:</td><td valign="top"><?php echo $class->platforms; ?></td>
</tr>
<tr>
<td valign="top">Course Goals:</td><td valign="top">
<?php $goals = preg_split ('/$\R?^/m', $class->goals);
foreach ($goals as $goal)
{
echo "<li>".$goal."</li>";
}
?></td>
</tr>
<tr>
<td valign="top">Requirements:</td><td valign="top">
<?php $requirements = preg_split ('/$\R?^/m', $class->requirements);
foreach ($requirements as $requirement)
{
echo "<li>".$requirement."</li>";
}
?>
</td>
</tr>
<tr>
<td valign="top">Required Rank:</td><td valign="top">
<?php
$rankrequired = RanksData::getRankInfo($class->ranklevel);
if($class->ranklevel == '0')
{
$rankrequired->rank = "None";
}
 echo $rankrequired->rank; ?></td>
</tr>
<tr><td>Difficulty:</td><td><?php 
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
                         </td></tr>
<tr>
<td valign="top">Theory Exam Required?:</td><td valign="top"><?php if($class->theoryexamreq == '1') { echo "YES"; } else { echo "NO"; } ?></td>
</tr>
<tr>
<td valign="top">Practical Exam Required?:</td><td valign="top">
<?php if($class->practexamreq == '1') { echo "YES"; } else { echo "NO"; } ?>
</td>
</tr>
<tr>
<td valign="top">Instructor:</td><td valign="top">
<?php 
$pilotdetail = PilotData::getPilotData($class->instructor);
$pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);

echo $pilotid.' - '.$pilotdetail->firstname.' '.$pilotdetail->lastname; ?>
</td>
</tr>
</table>
<br /><bR />
<div align="center">If you meet the above standing requirements please click the button below to join this course:<br /><br />
<?php $rankelevelCLASS = RanksData::getRankLevel($class->ranklevel);
   if($class->ranklevel == '0')
   { 
   $rankelevelCLASS = "0";
   }
     $rankelevelPILOT = Auth::$userinfo->ranklevel;
     
     if($rankelevelPILOT >= $rankelevelCLASS)
     { ?>
<a href="<?php echo SITE_URL; ?>/index.php/FlightAcademy/course_signup_onda/<?php echo $class->id; ?>" class="signupbutton">Sign Up!</a>
     <?php }
     else { echo "You don`t have the required rank to signup!"; } ?>
</div>
<br />
<hR />
<bR />
<h3>Attendees: </h3>

<table class="academytable02">
<tr>
</tr>
<?php if(!$pilots)
{ echo "<tR><td colspan='5'>No pilots have signed up!</td></tr>"; }
else
foreach ($pilots as $pilot)
{
$pilotdetail = PilotData::getPilotData($pilot->studentid);
$pilotid = PilotData::getPilotCode($pilotdetail->code, $pilotdetail->pilotid);
?>
<tr>
<td><?php echo $pilotid; ?> <?php echo $pilot->firstname.' '.$pilot->lastname; ?></td>
</tr>
<?php
}
?>
</table>