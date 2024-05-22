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




<h3>Assign Aircraft to Training Division</h3>
<form method="post" action="<?php echo SITE_URL; ?>/admin/index.php/FlightAcademy/addAC">
  <table width="40%" class="academytable02">
  <tr></tr>
            <tr>
                <td>Select Aircraft(*):</td><td>
		<select name="aircraftid">
        <option value="">Select Aicraft</option>
		<?php
		
		if(!$aircraft) $aircraft = array();
		foreach($aircraft as $ac)
        
		{
			?><option value="<?php echo $ac->id; ?>"><?php echo $ac->name; ?>&nbsp;(<?php echo $ac->registration; ?>)</option>';
		<?php
        
        }
		
		?>
		</select></td></tr>
         <tr><td colspan="2">
        <input type="submit" value="Add Aircraft to Training"/>
        </td>
        </tr>
        </table>
        </form>