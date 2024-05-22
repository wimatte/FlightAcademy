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
<?php
$mytrain = count($mytrainingsforcount);
$requestedtrain = count($requestedtrainsforcount);
$prexamsfortr = count($prexamsforcount);
$allcomplstudcot = count($completedstudentsforcount);
$allactivestudetns = count($activestudentsforcount);
?>



<h3>Flight Training</h3>
<ul class="filetree treeview-famfamfam">


	<li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy">Flight Training Home</a>
	</span></li>

   
    <?php if($user->changesettings == "1" || PilotGroups::group_has_perm(Auth::$usergroups, FULL_ADMIN))
    { ?>
    <br />
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/settings">Training Settings</a>
	</span></li>
    <?php
    }
    ?>
    
    <br />
    
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/trainingrequests">Training Requests (<?php echo $requestedtrain; ?>)</a>
	</span></li>
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/allstudents">Student Administration (<?php echo $allactivestudetns; ?>)</a>
	</span></li>
    
     <?php if($user->addmentors == "1" || PilotGroups::group_has_perm(Auth::$usergroups, FULL_ADMIN))
    { ?>
    <br />
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/instructors">Instructors</a>
	</span></li>
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/addinstructor">Add Instructor</a>
	</span></li>
    <?php
    }
    ?>
    
     <?php if($user->addcourses == "1" || PilotGroups::group_has_perm(Auth::$usergroups, FULL_ADMIN))
    { ?>
    <br />
      <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/classes">Courses</a>
	</span></li>
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/addclass">Add Course</a>
	</span></li>
    <?php
    }
    ?>
 
    
    
    
     <?php if($user->changesettings == "1" || PilotGroups::group_has_perm(Auth::$usergroups, FULL_ADMIN))
    { ?>
    <br />
    
      <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/aircraft">Training Aircraft</a>
	</span></li>
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/assignAC">Add Training Aircraft</a>
	</span></li>
     <?php
    }
    ?>
 
    
     <?php if($user->addflights == "1" || PilotGroups::group_has_perm(Auth::$usergroups, FULL_ADMIN))
    { ?>
    
      <br />
      <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/traflights">Training Flights</a>
	</span></li>
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/addtraflight">Add Training Flight</a>
	</span></li>
    <?php
    }
    ?>
 
    
    
    
     <?php if($user->changesettings == "1" || PilotGroups::group_has_perm(Auth::$usergroups, FULL_ADMIN))
    { ?>
    <br />
      <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/AcademyExam">Theory Exams Setup</a>
	</span></li>
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/exams_overview">Theory Exams Overview</a>
	</span></li>
    <?php
    }
    ?>
    <?php if($user->changesettings == "1" || PilotGroups::group_has_perm(Auth::$usergroups, FULL_ADMIN))
    { ?>
    <br />
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/all_prexam_requests">Practical Exam Requests (<?php echo $prexamsfortr; ?>)</a>
	</span></li>
    <?php
    }
    ?>
     <?php if($user->pexaminer == "1" || PilotGroups::group_has_perm(Auth::$usergroups, FULL_ADMIN))
    { ?>
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/prexam_overview">Practical Exams Overview</a>
	</span></li>
    <?php
    }
    ?>
    
     <?php if($user->addmaterials == "1" || PilotGroups::group_has_perm(Auth::$usergroups, FULL_ADMIN))
    { ?>
    <br />
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/materials">Training Materials</a>
	</span></li>
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/addmaterial">Add Training Materials</a>
	</span></li>
    <?php
    }
    ?>

    </ul>

    <h3>Instructor Panel</h3>
<ul class="filetree treeview-famfamfam">
<li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/trainingrequests">Pending Training Requests (<?php echo $requestedtrain; ?>)</a>
	</span></li>
    
     <?php if($user->pexaminer == "1" || PilotGroups::group_has_perm(Auth::$usergroups, FULL_ADMIN))
    { ?>
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/all_prexam_requests">Pending Practical Exams (<?php echo $prexamsfortr; ?>)</a>
	</span></li>
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/prexams_myoverview">My Practical Exams</a>
	</span></li>
    <?php } ?>
    <br />
     <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/mystudentexams">My Students Theoretical Exams</a>
	</span></li>
    <br />
    <li><span class="file">
		<a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/mystudents">My Students Admin (<?php echo $mytrain; ?>)</a>
	</span></li>
    <br />
    <li><span class="file"><a href="<?php echo SITE_URL?>/admin/index.php/FlightAcademy/mylivecourses">My Live Training Courses</a>
	</span></li>
</ul>
    