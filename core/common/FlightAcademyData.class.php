<?php
////////////////////////////////////////////////////////////////////////////
//Crazycreatives Flight Academy module for phpVMS virtual airline system      //
//@author Manuel Seiwald                                                  //
//@copyright Copyright (c) 2013, Manuel Seiwald, All Rights Reserved      //
////////////////////////////////////////////////////////////////////////////

class FlightAcademyData extends CodonData {
  
  public static function GetSettings() {
        $query = "SELECT * FROM academy_settings";
        return DB::get_row($query);
    }
	
	public static function SaveSettings($id, $welcometext, $logourl, $status, $academyname, $airlinecode)
	    {
			
        $query = "UPDATE academy_settings SET welcometext='$welcometext', logourl='$logourl', status='$status', academyname='$academyname' , airlinecode='$airlinecode' WHERE id='$id'";
		
        DB::query($query);
		
		$airline = 'Flight Training';
		$airlinecheck = self::CheckAirlineExist($airline);
		
		if(!$airlinecheck)
		{
			
		  $query13 = "INSERT INTO ".TABLE_PREFIX."airlines (code, name, enabled)
                        VALUES('$airlinecode', '$airline', '1')";
					
						DB::query($query13);
		}
		else
		{
			$query27 = "UPDATE ".TABLE_PREFIX."airlines SET code = '$airlinecode' WHERE name='$airline'";

        DB::query($query27);
		}
		
    }
	
	 public static function CheckAirlineExist($airlinename) {
        $query = "SELECT * FROM ".TABLE_PREFIX."airlines
		WHERE name = '$airlinename'";
        return DB::get_results($query);
    }


   public static function GetAllMentors() {
        $query = "SELECT * FROM  academy_mentors";
        return DB::get_results($query);
    }
	
	
	 public static function GetMentorByID($id) {
        $query = "SELECT * FROM  academy_mentors
		WHERE id = '$id'";
        return DB::get_row($query);
    }
	
	
	public static function SaveMentor($pilotid, $changesettings, $addmentors, $addcourses, $addmaterials, $addflights, $texaminer, $pexaminer, $status, $dateadded)    {
        $query = "INSERT INTO academy_mentors (pilotid, changesettings, addmentors, addcourses, addmaterials, addflights, texaminer, pexaminer, status, dateadded)
                        VALUES('$pilotid', '$changesettings', '$addmentors', '$addcourses', '$addmaterials', '$addflights', '$texaminer', '$pexaminer', '$status', '$dateadded')";

        DB::query($query);
    }
	
	
	public static function EditMentor($id, $changesettings, $addmentors, $addcourses, $addmaterials, $addflights, $texaminer, $pexaminer, $status)    {
        $query = "UPDATE academy_mentors SET changesettings = '$changesettings', addmentors = '$addmentors', addcourses = '$addcourses', addmaterials = '$addmaterials', addflights = '$addflights', texaminer = '$texaminer', pexaminer = '$pexaminer', status = '$status'
                    
						WHERE id = '$id'";

        DB::query($query);
    }
	
	public static function DeleteMentor($id) {
        $query = "DELETE FROM academy_mentors
		WHERE id = '$id'";
        DB::query($query);
    }
	
	
	
	public static function SaveClass($tratype, $traname, $description, $difficultylevel, $requirements, $ranklevel, $goals, $imageurl, $certificateurl, $startdate, $starttime, $platforms, $instructor, $aircrafttype, $theoryexamreq, $practexamreq, $status)    {
		
        $query = "INSERT INTO academy_classes (tratype, traname, description, difficultylevel, requirements, ranklevel, goals, imageurl, certificateurl, startdate, starttime, platforms, instructor, aircrafttype, theoryexamreq, practexamreq, status)
                        VALUES('$tratype', '$traname', '$description', '$difficultylevel', '$requirements', '$ranklevel', '$goals', '$imageurl', '$certificateurl', '$startdate' , '$starttime', '$platforms', '$instructor', '$aircrafttype', '$theoryexamreq', '$practexamreq', '$status')";

        DB::query($query);
    }
	
	public static function SaveLesson($lessonnum, $lestitle, $lestext, $status, $classid, $addedby)    {
		
        $query = "INSERT INTO academy_lessons (lessonnum, lestitle, lestext, status, classid, addedby)
                        VALUES('$lessonnum', '$lestitle', '$lestext', '$status', '$classid', '$addedby')";

        DB::query($query);
    }
	
	
	public static function EditClass($id, $traname, $description, $difficultylevel, $requirements, $ranklevel, $goals, $imageurl, $certificateurl, $startdate, $starttime, $platforms, $instructor, $aircrafttype, $theoryexamreq, $practexamreq, $status)    {
        $query = "UPDATE academy_classes SET traname = '$traname', description = '$description', difficultylevel = '$difficultylevel', requirements = '$requirements', ranklevel = '$ranklevel', goals = '$goals', imageurl = '$imageurl', certificateurl = '$certificateurl', startdate = '$startdate', starttime = '$starttime', platforms = '$platforms', instructor = '$instructor', aircrafttype = '$aircrafttype', theoryexamreq = '$theoryexamreq', practexamreq = '$practexamreq', status = '$status'
                    
						WHERE id = '$id'";

        DB::query($query);
    }
	
	
	public static function EditLesson($id, $lessonnum, $lestitle, $lestext, $status)    {
        $query = "UPDATE academy_lessons SET lessonnum = '$lessonnum', lestitle = '$lestitle', lestext = '$lestext', status = '$status'
                    
				WHERE id = '$id'";

        DB::query($query);
    }
	
	public static function DeleteLesson($id) {
        $query = "DELETE FROM academy_lessons
		WHERE id = '$id'";
        DB::query($query);
    }
	
	
	public static function DeleteClass($id) {
        $query = "DELETE FROM academy_classes
		WHERE id = '$id'";
        DB::query($query);
    }

    public static function GetPermClasses() {
        $query = "SELECT * FROM academy_classes
		WHERE tratype = 'permanent'";
        return DB::get_results($query);
    }
	
	  public static function GetTyraClasses() {
        $query = "SELECT * FROM academy_classes
		WHERE tratype = 'typerating'";
        return DB::get_results($query);
    }
	
	public static function GetOndaClasses() {
        $query = "SELECT * FROM academy_classes
		WHERE tratype = 'oneday'";
        return DB::get_results($query);
    }
	
	public static function GetClassById($id) {
        $query = "SELECT * FROM academy_classes
		WHERE id = '$id'";
        return DB::get_row($query);
    }
	
	public static function getAllClasses() {
        $query = "SELECT * FROM academy_classes";
        return DB::get_results($query);
    }
	
	
		public static function getUpcomingClasses() {
        $query = "SELECT * FROM academy_classes
		WHERE status = '2' ";
        return DB::get_results($query);
    }
	
	
	
	 public static function GetPermActClasses() {
        $query = "SELECT * FROM academy_classes
		WHERE tratype = 'permanent' AND status = '1'";
        return DB::get_results($query);
    }
	
	  public static function GetTyraActClasses() {
        $query = "SELECT * FROM academy_classes
		WHERE tratype = 'typerating' AND status = '1'";
        return DB::get_results($query);
    }
	
	public static function GetOndaActClasses() {
        $query = "SELECT * FROM academy_classes
WHERE tratype = 'oneday' AND startdate >= NOW() AND startdate != '0000-00-00'";
        return DB::get_results($query);
    }
	
	public static function getAllActClasses() {
        $query = "SELECT * FROM academy_classes
		WHERE status = '1'
		";
        return DB::get_results($query);
    }
	
	
	
	
	
	public static function getAllMaterials() {
        $query = "SELECT * FROM academy_materials";
        return DB::get_results($query);
    }
	
	
	public static function getMaterialsforCourse($classid) {
        $query = "SELECT * FROM academy_materials
		WHERE status = '1' AND (belongsto = 'ALL' OR belongsto = '$classid')";
        return DB::get_results($query);
    }
	
	
	public static function SaveMaterial($mattitle, $matdescription, $downloadurl, $belongsto, $revision, $lastupdate, $status, $addedby)    {
		
        $query = "INSERT INTO academy_materials (mattitle, matdescription, downloadurl, belongsto, revision, lastupdate, status, addedby)
                        VALUES('$mattitle', '$matdescription', '$downloadurl', '$belongsto', '$revision', '$lastupdate', '$status', '$addedby')";
        DB::query($query);
    }
	
	
	public static function EditTheMaterial($id, $mattitle, $matdescription, $downloadurl, $belongsto, $lastupdate, $status, $addedby)    {
        $query = "UPDATE academy_materials SET mattitle='$mattitle', matdescription = '$matdescription', downloadurl = '$downloadurl', belongsto = '$belongsto', lastupdate = '$lastupdate', status = '$status', revision = revision+1, addedby = '$addedby'
                    WHERE id = '$id'";

        DB::query($query);
    }
	
	
	public static function GetMaterialById($id) {
        $query = "SELECT * FROM academy_materials
		WHERE id = '$id'";
        return DB::get_row($query);
    }
	
	
	public static function DeleteMaterial($id) {
        $query = "DELETE FROM academy_materials
		WHERE id = '$id'";
        DB::query($query);
    }
	

	public static function GetTrainingFlights($airlinecode)
	{
		$sql = "SELECT s.*, s.id as schedid, a.id as aircraftid, a.name as aircraft, a.registration,
					a.minrank as aircraft_minrank, a.ranklevel as aircraftlevel,
					dep.name as depname, dep.lat AS deplat, dep.lng AS deplng,
					arr.name as arrname, arr.lat AS arrlat, arr.lng AS arrlng, tra.isexam
				FROM ".TABLE_PREFIX."schedules AS s
				LEFT JOIN ".TABLE_PREFIX."airports AS dep ON dep.icao = s.depicao
				LEFT JOIN ".TABLE_PREFIX."airports AS arr ON arr.icao = s.arricao
				LEFT JOIN ".TABLE_PREFIX."aircraft AS a ON a.id = s.aircraft 
				LEFT JOIN academy_flights AS tra ON s.id = tra.flightid 
				WHERE s.code = '$airlinecode'
                GROUP BY s.id
				ORDER BY s.id ASC";
		
		$ret = DB::get_results($sql);
		return $ret;
	}
	
	public static function getStudentsAssignedFlights($id)
	{
		$sql = "SELECT f.*, f.id as assignid, s.*, s.id as schedid, a.id as aircraftid, a.name as aircraft, a.registration,
					a.minrank as aircraft_minrank, a.ranklevel as aircraftlevel,
					dep.name as depname, dep.lat AS deplat, dep.lng AS deplng,
					arr.name as arrname, arr.lat AS arrlat, arr.lng AS arrlng
					FROM academy_flights AS f
				LEFT JOIN ".TABLE_PREFIX."schedules AS s ON f.flightid = s.id
				LEFT JOIN ".TABLE_PREFIX."airports AS dep ON dep.icao = s.depicao
				LEFT JOIN ".TABLE_PREFIX."airports AS arr ON arr.icao = s.arricao
				LEFT JOIN ".TABLE_PREFIX."aircraft AS a ON a.id = s.aircraft 
				WHERE f.trainingid = '$id'
				ORDER BY f.adddate DESC";
		
		$ret = DB::get_results($sql);
		return $ret;
	}
	
	
	
	public static function getAllaircraft() {
        $query = "SELECT * FROM ".TABLE_PREFIX."aircraft ORDER BY icao ASC, registration";
        return DB::get_results($query);
    }
	
	public static function getAircraftInfo($id) {
        $query = "SELECT a.*, e.acbase, e.id as eaid FROM academy_aircraft as e
		 LEFT JOIN ".TABLE_PREFIX."aircraft AS a ON e.aircraftid = a.id
		 WHERE e.id='$id'
		 ";
        return DB::get_row($query);
    }
	
	public static function getTraAircraft() {
        $query = "SELECT a.*, e.id as eaid FROM academy_aircraft as e
		 LEFT JOIN ".TABLE_PREFIX."aircraft AS a ON e.aircraftid = a.id
		 ORDER BY icao ASC, registration";
        return DB::get_results($query);
    }
	
	public static function getAcLocation($acid) {
        $query = "SELECT pirepid, arricao FROM ".TABLE_PREFIX."pireps WHERE aircraft= '$acid' ORDER BY pirepid DESC LIMIT 1";
        return DB::get_row($query);
    }
	
	public static function addAC($aircraftid)    {
        $query = "INSERT INTO academy_aircraft (aircraftid)
                        VALUES('$aircraftid')";

        DB::query($query);
    }

	
	public static function remove_aircraft($id)    {
        $query = "DELETE FROM academy_aircraft WHERE id='$id'";

        DB::query($query);
    }
	
	
	public static function GetLessonsByClass($id) {
        $query = "SELECT * FROM academy_lessons
		WHERE classid = '$id'";
        return DB::get_results($query);
    }
	
	public static function GetActLessonsByClass($id) {
        $query = "SELECT * FROM academy_lessons
		WHERE classid = '$id' AND status = '1'
		ORDER BY lessonnum ASC";
        return DB::get_results($query);
    }
	
	public static function GetLessonsById($id) {
        $query = "SELECT * FROM academy_lessons
		WHERE id = '$id'";
        return DB::get_row($query);
    }
	
	public static function GetMyTraining($id) {
        $query = "SELECT t.*, t.id as traid, t.startdate as begindate, c.*, c.id as theclassid, c.status as classstatus, c.startdate as classdate, p.code as pilotcode, p.pilotid as thepilotid, p.hub, p.location, p.rank, p.rankid, p.email as studentmail, p.firstname, p.lastname, d.code as mentorcode, d.pilotid as thementorid, d.firstname as mentorfirstname, d.lastname as mentorlastname, d.location as mentorlocation, d.email as mentormail FROM academy_trainings t
		LEFT JOIN academy_classes c ON c.id = t.classid
		LEFT JOIN ".TABLE_PREFIX."pilots p ON t.studentid = p.pilotid
		LEFT JOIN ".TABLE_PREFIX."pilots d ON t.mentorid = d.pilotid
		WHERE t.studentid = '$id' AND (t.completed != '1' OR t.status != 'Inactive') AND c.tratype != 'oneday'";
        return DB::get_row($query);
    }
	
	public static function GetTrainById($id) {
        $query = "SELECT t.*, t.id as traid, t.startdate as begindate, c.*, c.id as theclassid, c.status as classstatus, c.startdate as classdate, p.code as pilotcode, p.pilotid as thepilotid, p.hub, p.location, p.rank, p.rankid, p.email as studentmail, p.firstname, p.lastname, d.code as mentorcode, d.pilotid as thementorid, d.firstname as mentorfirstname, d.lastname as mentorlastname, d.location as mentorlocation, d.email as mentormail FROM academy_trainings t
		LEFT JOIN academy_classes c ON c.id = t.classid
		LEFT JOIN ".TABLE_PREFIX."pilots p ON t.studentid = p.pilotid
		LEFT JOIN ".TABLE_PREFIX."pilots d ON t.mentorid = d.pilotid
		WHERE t.id = '$id'";
        return DB::get_row($query);
    }
	
		public static function GetMyONDA($id) {
        $query = "SELECT t.*, t.id as traid, t.startdate as begindate, c.*, c.id as theclassid, c.status as classstatus, c.startdate as classdate, p.code as pilotcode, p.pilotid as thepilotid, p.hub, p.location, p.rank, p.rankid, p.email as studentmail, p.firstname, p.lastname FROM academy_trainings t
		LEFT JOIN academy_classes c ON c.id = t.classid
		LEFT JOIN phpvms_pilots p ON t.studentid = p.pilotid
		WHERE t.studentid = '$id' AND c.tratype = 'oneday' AND c.startdate >= NOW() AND c.startdate != '0000-00-00'";
        return DB::get_results($query);
    }
	
	
	public static function GetMyPastONDA($id) {
        $query = "SELECT t.*, t.id as traid, t.startdate as begindate, c.*, c.id as theclassid, c.status as classstatus, c.startdate as classdate, p.code as pilotcode, p.pilotid as thepilotid, p.hub, p.location, p.rank, p.rankid, p.email as studentmail, p.firstname, p.lastname, d.code as mentorcode, d.pilotid as thementorid, d.firstname as mentorfirstname, d.lastname as mentorlastname, d.location as mentorlocation, d.email as mentormail FROM academy_trainings t
		LEFT JOIN academy_classes c ON c.id = t.classid
		LEFT JOIN ".TABLE_PREFIX."pilots p ON t.studentid = p.pilotid
		LEFT JOIN ".TABLE_PREFIX."pilots d ON t.mentorid = d.pilotid
		WHERE t.studentid = '$id' AND c.tratype = 'oneday' AND (c.startdate < NOW() AND c.startdate != '0000-00-00')";
        return DB::get_results($query);
    }
	
	public static function GetMyPastPerm($id) {
        $query = "SELECT t.*, t.id as traid, t.startdate as begindate, c.*, c.id as theclassid, c.status as classstatus, c.startdate as classdate, p.code as pilotcode, p.pilotid as thepilotid, p.hub, p.location, p.rank, p.rankid, p.email as studentmail, p.firstname, p.lastname, d.code as mentorcode, d.pilotid as thementorid, d.firstname as mentorfirstname, d.lastname as mentorlastname, d.location as mentorlocation, d.email as mentormail FROM academy_trainings t
		LEFT JOIN academy_classes c ON c.id = t.classid
		LEFT JOIN ".TABLE_PREFIX."pilots p ON t.studentid = p.pilotid
		LEFT JOIN ".TABLE_PREFIX."pilots d ON t.mentorid = d.pilotid
		WHERE t.studentid = '$id' AND (t.completed = '1' OR t.status = 'Inactive') AND c.tratype = 'permanent'";
        return DB::get_results($query);
    }
	
		public static function GetMyPastTyra($id) {
        $query = "SELECT t.*, t.id as traid, t.startdate as begindate, c.*, c.id as theclassid, c.status as classstatus, c.startdate as classdate, p.code as pilotcode, p.pilotid as thepilotid, p.hub, p.location, p.rank, p.rankid, p.email as studentmail, p.firstname, p.lastname, d.code as mentorcode, d.pilotid as thementorid, d.firstname as mentorfirstname, d.lastname as mentorlastname, d.location as mentorlocation, d.email as mentormail FROM academy_trainings t
		LEFT JOIN academy_classes c ON c.id = t.classid
		LEFT JOIN ".TABLE_PREFIX."pilots p ON t.studentid = p.pilotid
		LEFT JOIN ".TABLE_PREFIX."pilots d ON t.mentorid = d.pilotid
		WHERE t.studentid = '$id' AND (t.completed = '1' OR t.status = 'Inactive') AND c.tratype = 'typerating'";
        return DB::get_results($query);
    }
	
	
	public static function GetAvailExams($pilotid) {
        $query = "SELECT e.*, c.traname, t.id as traid, t.exblocked FROM academy_exam_settings e
		LEFT JOIN academy_trainings t ON t.classid = e.classid
		LEFT JOIN academy_classes c ON c.id = e.classid
		WHERE t.status = 'Active' AND t.studentid = '$pilotid' AND t.texamid = '0' 
		";
        return DB::get_results($query);
    }
	
	
	
	public static function ExactOneDayCheck($id, $pilotid) {
        $query = "SELECT * FROM academy_trainings
		WHERE studentid = '$pilotid' AND classid = '$id'";
        return DB::get_row($query);
    }
	
	public static function TrainingCheck($pilotid) {
        $query = "SELECT * FROM academy_trainings
		WHERE studentid = '$pilotid'";
        return DB::get_results($query);
    }
	
	public static function GetTrainingRequests() {
        $query = "SELECT t.*, c.traname, p.code, p.firstname, p.lastname, p.email as studentmail FROM academy_trainings t
		LEFT JOIN academy_classes c ON c.id = t.classid
		LEFT JOIN ".TABLE_PREFIX."pilots p ON t.studentid = p.pilotid
		WHERE mentorid = '0' AND c.tratype != 'oneday'";
        return DB::get_results($query);
    }
	
	public static function GetMyStudents($trainerid) {
        $query = "SELECT t.*, c.traname, p.code, p.firstname, p.lastname, p.email as studentmail FROM academy_trainings t
		LEFT JOIN academy_classes c ON c.id = t.classid
		LEFT JOIN ".TABLE_PREFIX."pilots p ON t.studentid = p.pilotid
		WHERE mentorid = '$trainerid' AND c.tratype != 'oneday' AND completed = '0' AND t.status ='Active'";
        return DB::get_results($query);
    }
	
	public static function GetMyCompletedStudents($trainerid) {
        $query = "SELECT t.*, c.traname, p.code, p.firstname, p.lastname, p.email as studentmail FROM academy_trainings t
		LEFT JOIN academy_classes c ON c.id = t.classid
		LEFT JOIN ".TABLE_PREFIX."pilots p ON t.studentid = p.pilotid
		WHERE mentorid = '$trainerid' AND c.tratype != 'oneday' AND (t.completed = '1' OR t.status !='Active')";
        return DB::get_results($query);
    }
	
	public static function GetAllStudents() {
        $query = "SELECT t.*, c.traname, p.code, p.firstname, p.lastname, p.email as studentmail, d.code as mentorcode, d.pilotid as thementorid, d.firstname as mentorfirstname, d.lastname as mentorlastname FROM academy_trainings t
		LEFT JOIN academy_classes c ON c.id = t.classid
		LEFT JOIN ".TABLE_PREFIX."pilots p ON t.studentid = p.pilotid
		LEFT JOIN ".TABLE_PREFIX."pilots d ON t.mentorid = d.pilotid
		WHERE c.tratype != 'oneday' AND t.completed = '0' AND t.status ='Active'";
        return DB::get_results($query);
    }
	
	public static function GetAllCompletedStudents() {
        $query = "SELECT t.*, c.traname, p.code, p.firstname, p.lastname, p.email as studentmail, d.code as mentorcode, d.pilotid as thementorid, d.firstname as mentorfirstname, d.lastname as mentorlastname FROM academy_trainings t
		LEFT JOIN academy_classes c ON c.id = t.classid
		LEFT JOIN ".TABLE_PREFIX."pilots p ON t.studentid = p.pilotid
		LEFT JOIN ".TABLE_PREFIX."pilots d ON t.mentorid = d.pilotid
		WHERE c.tratype != 'oneday' AND (t.completed = '1' OR t.status !='Active')";
        return DB::get_results($query);
    }
	
	public static function GetTrainingByID($id) {
        $query = "SELECT t.*, t.status as trainingstatus, t.id as traid, t.startdate as begindate, c.*, c.id as theclassid, c.status as classstatus, c.startdate as classdate, p.code as pilotcode, p.pilotid as thepilotid, p.hub, p.location, p.rank, p.rankid, p.email as studentmail, p.firstname, p.lastname, d.code as mentorcode, d.pilotid as thementorid, d.firstname as mentorfirstname, d.lastname as mentorlastname, d.location as mentorlocation, d.email as mentormail FROM academy_trainings t
		LEFT JOIN academy_classes c ON c.id = t.classid
		LEFT JOIN ".TABLE_PREFIX."pilots p ON t.studentid = p.pilotid
		LEFT JOIN ".TABLE_PREFIX."pilots d ON t.mentorid = d.pilotid
		WHERE t.id = '$id'";
        return DB::get_row($query);
    }
	
	public static function CourseSignUp($id, $pilotid)    {
		$startdate = date('Y-m-d');
		
        $query = "INSERT INTO academy_trainings(studentid, classid, progress, startdate)
                        VALUES('$pilotid', '$id', 'In theoretical Training', '$startdate')";

        DB::query($query);
    }
	
	public static function AssignMentor($id, $mentid)    {
        $query = "UPDATE academy_trainings SET mentorid = '$mentid'
                    WHERE id = '$id'";

        DB::query($query);
    }
	
	public static function SaveChangeMentor($id, $mentid)    {
        $query = "UPDATE academy_trainings SET mentorid = '$mentid'
                    WHERE id = '$id'";

        DB::query($query);
    }
	
	public static function SaveChangeProgress($id, $progress)    {
		
		if($progress == 'Completed')
		{
			$query2 = "UPDATE academy_trainings SET completed = '1', status = 'Inactive'
			 WHERE id = '$id'";

        DB::query($query2);
		}
		
		if($progress == 'Practical Exam Passed')
		{
			$query2 = "UPDATE academy_trainings SET practexampassed = '1'
			 WHERE id = '$id'";

        DB::query($query2);
		}
		
		if($progress == 'Theoretical Exam Passed')
		{
			$query2 = "UPDATE academy_trainings SET theoexampassed = '1'
			 WHERE id = '$id'";

        DB::query($query2);
		}
		
        $query = "UPDATE academy_trainings SET progress = '$progress'
                    WHERE id = '$id'";

        DB::query($query);
    }
	
	public static function DeleteTraining($id)    {
        $query = "DELETE FROM academy_trainings WHERE id='$id'";

        DB::query($query);
    }
	
	public static function CloseTraining($id)    {
        $query = "UPDATE academy_trainings SET status = 'Inactive' WHERE id='$id'";

        DB::query($query);
    }
	
	public static function ReOpenTraining($id)    {
        $query = "UPDATE academy_trainings SET status = 'Active', completed = '0' WHERE id='$id'";

        DB::query($query);
    }
	
	public static function CompleteTraining($id)    {
        $query = "UPDATE academy_trainings SET status = 'Inactive', completed = '1', progress = 'Completed' WHERE id='$id'";

        DB::query($query);
    }
	
	public static function SaveAssignFlight($trainingid, $pilotid, $flightid, $assignedby)    {
		
        $query = "INSERT INTO academy_flights (trainingid, pilotid, flightid, assignedby)
                        VALUES('$trainingid', '$pilotid', '$flightid', '$assignedby')";
        DB::query($query);
    }
	
	public static function DeleteFlightAssignment($id)    {
        $query = "DELETE FROM academy_flights WHERE id='$id'";

        DB::query($query);
    }
    
    public static function DeleteFlightAssignmentBySchd($id)    {
        $query = "DELETE FROM academy_flights WHERE flightid='$id'";

        DB::query($query);
    }
    
    public static function DeleteTrainingFlight($id){
        $query = "DELETE FROM ".TABLE_PREIFX."schedules WHERE id='$id'";

        DB::query($query);
    }
	
	public static function SaveAddNote($trainingid, $comment, $addedby)    {
		
        $query = "INSERT INTO academy_notes (trainingid, comment, addedby)
                        VALUES('$trainingid', '$comment', '$addedby')";
        DB::query($query);
    }
	
	public static function DeleteNote($id)    {
        $query = "DELETE FROM academy_notes WHERE id='$id'";

        DB::query($query);
    }
	
	public static function GetTrainingNotes($traid) {
        $query = "SELECT n.*, p.firstname, p.lastname FROM academy_notes n
		LEFT JOIN ".TABLE_PREFIX."pilots p ON n.addedby = p.pilotid
		WHERE n.trainingid = '$traid'
		ORDER BY n.submitdate DESC";
        return DB::get_results($query);
    }
	
	public static function GetTrainingNoteByID($id) {
        $query = "SELECT n.*, p.firstname, p.lastname FROM academy_notes n
		LEFT JOIN ".TABLE_PREFIX."pilots p ON n.addedby = p.pilotid
		WHERE n.id = '$id'";
        return DB::get_row($query);
    }
	
	public static function SaveEditNote($id, $comment)    {
        $query = "UPDATE academy_notes SET comment = '$comment' WHERE id='$id'";

        DB::query($query);
    }
	
	public static function MarkNoteRead($id)    {
        $query = "UPDATE academy_notes SET noteread = '1' WHERE id='$id'";

        DB::query($query);
    }
	
	public static function GetMentUnfinishedExams($mentorid) {
        $query = "SELECT e.*, s.examtitle FROM academy_exams e
		LEFT JOIN academy_trainings t ON e.traid = t.id
		LEFT JOIN academy_exam_settings s ON e.exsid = s.id
		WHERE t.mentorid = '$mentorid' AND e.finished != '1'
		";
        return DB::get_results($query);
    }
	
	public static function GetMentPassedExams($mentorid) {
        $query = "SELECT e.*, s.examtitle FROM academy_exams e
		LEFT JOIN academy_trainings t ON e.traid = t.id
		LEFT JOIN academy_exam_settings s ON e.exsid = s.id
		WHERE t.mentorid = '$mentorid' AND e.passfail = 'Passed'
		";
        return DB::get_results($query);
    }
	
	public static function GetMentFailedExams($mentorid) {
        $query = "SELECT e.*, s.examtitle FROM academy_exams e
		LEFT JOIN academy_trainings t ON e.traid = t.id
		LEFT JOIN academy_exam_settings s ON e.exsid = s.id
		WHERE t.mentorid = '$mentorid' AND e.passfail = 'Failed'
		";
        return DB::get_results($query);
    }
	
	public static function GetUnfinishedExams() {
        $query = "SELECT e.*, s.examtitle FROM academy_exams e
		LEFT JOIN academy_trainings t ON e.traid = t.id
		LEFT JOIN academy_exam_settings s ON e.exsid = s.id
		WHERE e.finished != '1'
		";
        return DB::get_results($query);
    }
	
	public static function GetPassedExams() {
        $query = "SELECT e.*, s.examtitle FROM academy_exams e
		LEFT JOIN academy_trainings t ON e.traid = t.id
		LEFT JOIN academy_exam_settings s ON e.exsid = s.id
		WHERE e.passfail = 'Passed'
		";
        return DB::get_results($query);
    }
	
	public static function GetPastTheoExamsForStudent($studentid, $id) {
        $query = "SELECT e.*, s.examtitle FROM academy_exams e
		LEFT JOIN academy_trainings t ON e.traid = t.id
		LEFT JOIN academy_exam_settings s ON e.exsid = s.id
		WHERE e.traid = '$id' AND e.pilotid = '$studentid'
		ORDER BY e.gradedate DESC
		";
        return DB::get_results($query);
    }
	
	
	public static function GetFailedExams() {
        $query = "SELECT e.*, s.examtitle FROM academy_exams e
		LEFT JOIN academy_trainings t ON e.traid = t.id
		LEFT JOIN academy_exam_settings s ON e.exsid = s.id
		WHERE e.passfail = 'Failed'
		";
        return DB::get_results($query);
    }
	
	public static function GetExamDetailed($id) {
        $query = "SELECT e.*, s.examtitle, s.passpercentage FROM academy_exams e
		LEFT JOIN academy_exam_settings s ON e.exsid = s.id
		WHERE e.id = '$id'
		";
        return DB::get_row($query);
    }
	
		public static function DeleteThExam($id)    {
		$query = "DELETE FROM academy_questions_active WHERE exid='$id'";

        DB::query($query);
		
        $query2 = "DELETE FROM academy_exams WHERE id='$id'";

        DB::query($query2);
    }
	
	public static function GetQuestionsForExam($id) {
        $query = "SELECT q.*, a.tquestion, a.answerone, a.answertwo, a.answerthree, a.answerfour, a.questionimage FROM academy_questions_active q
		LEFT JOIN academy_questions a ON q.qid = a.id
		WHERE q.exid = '$id'
		";
        return DB::get_results($query);
    }
	
	public static function PrExamRequest($traid)    {
		
        $query = "INSERT INTO academy_prexams (trainid)
                        VALUES('$traid')";
        DB::query($query);
		$examid = DB::$insert_id;
		
		
		 $query2 = "UPDATE academy_trainings SET pexamid = '$examid' WHERE id='$traid'";

        DB::query($query2);
    }
	
	public static function GetRequestedPreXams() {
        $query = "SELECT ex.*, c.traname, t.mentorid, t.studentid, t.theoexampassed FROM academy_prexams ex
		LEFT JOIN academy_trainings t ON ex.trainid = t.id
		LEFT JOIN academy_classes c ON t.classid = c.id
		WHERE ex.examiner = '0'
		";
        return DB::get_results($query);
    }
	
	
	public static function DeletePrexam($id)    {
        $query = "DELETE FROM academy_prexams WHERE id='$id'";

        DB::query($query);
    }
	
	
	public static function GetPreXamByID($id) {
        $query = "SELECT ex.*, c.traname, t.mentorid, t.studentid, t.theoexampassed, t.id as traid FROM academy_prexams ex
		LEFT JOIN academy_trainings t ON ex.trainid = t.id
		LEFT JOIN academy_classes c ON t.classid = c.id
		WHERE ex.id = '$id'
		";
        return DB::get_row($query);
    }
	
	public static function AssignPrexamToExaminer($examid, $examiner)    {
		
		
		 $query = "UPDATE academy_prexams SET examiner = '$examiner' WHERE id='$examid'";

        DB::query($query);
    }
	
	public static function GetActivePreXams() {
        $query = "SELECT ex.*, c.traname, t.mentorid, t.studentid, t.theoexampassed, t.id as traid FROM academy_prexams ex
		LEFT JOIN academy_trainings t ON ex.trainid = t.id
		LEFT JOIN academy_classes c ON t.classid = c.id
		WHERE ex.examiner != '0' AND result = ''
		";
        return DB::get_results($query);
    }
	
	
		public static function GetPassedPreXams() {
        $query = "SELECT ex.*, c.traname, t.mentorid, t.studentid, t.theoexampassed, t.id as traid FROM academy_prexams ex
		LEFT JOIN academy_trainings t ON ex.trainid = t.id
		LEFT JOIN academy_classes c ON t.classid = c.id
		WHERE result = 'Passed'
		";
        return DB::get_results($query);
    }
	
		public static function GetFailedPreXams() {
        $query = "SELECT ex.*, c.traname, t.mentorid, t.studentid, t.theoexampassed, t.id as traid FROM academy_prexams ex
		LEFT JOIN academy_trainings t ON ex.trainid = t.id
		LEFT JOIN academy_classes c ON t.classid = c.id
		WHERE result = 'Failed'
		";
        return DB::get_results($query);
    }
	
	
	public static function getTraFlightbyExam($examid)
	{
		$sql = "SELECT f.*, f.id as assignid, s.*, s.id as schedid, a.id as aircraftid, a.name as aircraft, a.registration,
					a.minrank as aircraft_minrank, a.ranklevel as aircraftlevel,
					dep.name as depname, dep.lat AS deplat, dep.lng AS deplng,
					arr.name as arrname, arr.lat AS arrlat, arr.lng AS arrlng
					FROM academy_flights AS f
				LEFT JOIN ".TABLE_PREFIX."schedules AS s ON f.flightid = s.id
				LEFT JOIN ".TABLE_PREFIX."airports AS dep ON dep.icao = s.depicao
				LEFT JOIN ".TABLE_PREFIX."airports AS arr ON arr.icao = s.arricao
				LEFT JOIN ".TABLE_PREFIX."aircraft AS a ON a.id = s.aircraft 
				WHERE f.isexam = '$examid'
				ORDER BY f.adddate DESC";
		
		$ret = DB::get_row($sql);
		return $ret;
	}
	
	
	public static function getTrainigIDfromExam($id) {
        $query = "SELECT * FROM academy_prexams 
		WHERE id = '$id'
		";
        return DB::get_row($query);
    }
	
	
	public static function UpdatePrExamCritique($examid, $critique)    {
		
		
		 $query = "UPDATE academy_prexams SET critique = '$critique' WHERE id='$examid'";

        DB::query($query);
		
		
		$training = self::getTrainigIDfromExam($examid);
		$traid = $training->trainid;
		
		$query43 = "UPDATE academy_trainings SET critiqueadded = '1' WHERE id='$traid'";

        DB::query($query43);
    }
	
	
	public static function EditPractExamDetails($examid, $exdate, $extime, $result, $examflight, $traid, $pilotid)    {
		
		
		 $query = "UPDATE academy_prexams SET exdate = '$exdate', extime = '$extime', result = '$result' WHERE id='$examid'";

        DB::query($query);
		
		
		$exfltexistcheck = self::getTraFlightbyExam($examid);
		
		
		$assignedby = Auth::$userinfo->pilotid;
		if(!$exfltexistcheck)
		{
			 $query12 = "INSERT INTO academy_flights (trainingid, pilotid, flightid, assignedby, isexam)
                        VALUES('$traid', '$pilotid', '$examflight', '$assignedby', '$examid')";
        DB::query($query12);
		}
		else
		{	
			
			$query23 = "UPDATE academy_flights SET flightid = '$examflight' WHERE isexam='$examid'";

        DB::query($query23);
			
		}
		
		if($result == 'Passed')
		{
		$query27 = "UPDATE academy_trainings SET practexampassed = '1', progress = 'Practical Exam Passed' WHERE id='$traid'";

        DB::query($query27);
		}
    }
	
	public static function GetMyActivePreXams($examiner) {
        $query = "SELECT ex.*, c.traname, t.mentorid, t.studentid, t.theoexampassed, t.id as traid FROM academy_prexams ex
		LEFT JOIN academy_trainings t ON ex.trainid = t.id
		LEFT JOIN academy_classes c ON t.classid = c.id
		WHERE ex.examiner != '0' AND result = '' AND examiner = '$examiner'
		";
        return DB::get_results($query);
    }
	
	
		public static function GetMyPassedPreXams($examiner) {
        $query = "SELECT ex.*, c.traname, t.mentorid, t.studentid, t.theoexampassed, t.id as traid FROM academy_prexams ex
		LEFT JOIN academy_trainings t ON ex.trainid = t.id
		LEFT JOIN academy_classes c ON t.classid = c.id
		WHERE result = 'Passed' AND examiner = '$examiner'
		";
        return DB::get_results($query);
    }
	
		public static function GetMyFailedPreXams($examiner) {
        $query = "SELECT ex.*, c.traname, t.mentorid, t.studentid, t.theoexampassed, t.id as traid FROM academy_prexams ex
		LEFT JOIN academy_trainings t ON ex.trainid = t.id
		LEFT JOIN academy_classes c ON t.classid = c.id
		WHERE result = 'Failed' AND examiner = '$examiner'
		";
        return DB::get_results($query);
    }
	
	
	public static function GetMyLiveCourses($trainerid) {
        $query = "SELECT * FROM academy_classes
		          WHERE instructor = '$trainerid'
		";
        return DB::get_results($query);
    }
	
	public static function GetLiveCourseAttendees($id) {
        $query = "SELECT t.*, c.traname, p.firstname, p.lastname, p.email FROM academy_trainings t
				  LEFT JOIN academy_classes c ON t.classid = c.id
				  LEFT JOIN ".TABLE_PREFIX."pilots p ON t.studentid = p.pilotid
		          WHERE t.classid = '$id'
		";
        return DB::get_results($query);
    }
	
		public static function GetPrexamsByTraining($traid) {
        $query = "SELECT ex.*, c.traname, t.mentorid, t.studentid, t.theoexampassed, t.id as traid FROM academy_prexams ex
		LEFT JOIN academy_trainings t ON ex.trainid = t.id
		LEFT JOIN academy_classes c ON t.classid = c.id
		WHERE ex.trainid = '$traid'
		";
        return DB::get_results($query);
    }
	
	
	public static function GetAwaitingTrainings() {
        $query = "SELECT t.*, c.traname, c.theoryexamreq, c.practexamreq FROM academy_trainings t
                  LEFT JOIN academy_classes c ON t.classid = c.id
                  WHERE (((c.theoryexamreq = '1' AND t.theoexampassed = '1') OR c.theoryexamreq = '0')                  AND ((c.practexamreq = '1' AND  t.practexampassed = '1') OR c.practexamreq = '0')) 
                  AND t.completed = '0' AND c.tratype != 'oneday'
		";
        return DB::get_results($query);
    }
	
	public static function GetAllCompletedTrainings() {
        $query = "SELECT t.*, c.traname, c.theoryexamreq, c.practexamreq FROM academy_trainings t
                  LEFT JOIN academy_classes c ON t.classid = c.id
                  WHERE (((c.theoryexamreq = '1' AND t.theoexampassed = '1') OR c.theoryexamreq = '0')                  AND ((c.practexamreq = '1' AND  t.practexampassed = '1') OR c.practexamreq = '0')) 
                  AND t.completed = '1' AND c.tratype != 'oneday'
		";
        return DB::get_results($query);
    }
	
	public static function getTrainingReportsbyPilot($pid)
	{
		
		$setting = self::GetSettings();
		$airlinecode = $setting->airlinecode;
		
		$sql = "SELECT p.*, p.submitdate as submitdate, 
					u.pilotid, u.firstname, u.lastname, u.email, u.rank,
					a.id AS aircraftid, a.name as aircraft, a.registration,
					dep.name as depname, dep.lat AS deplat, dep.lng AS deplng,
					arr.name as arrname, arr.lat AS arrlat, arr.lng AS arrlng						
				FROM ".TABLE_PREFIX."pireps p
				LEFT JOIN ".TABLE_PREFIX."aircraft a ON a.id = p.aircraft
				LEFT JOIN ".TABLE_PREFIX."airports AS dep ON dep.icao = p.depicao
				LEFT JOIN ".TABLE_PREFIX."airports AS arr ON arr.icao = p.arricao 
				LEFT JOIN ".TABLE_PREFIX."pilots u ON u.pilotid = p.pilotid 
				WHERE p.code = '$airlinecode' AND p.pilotid = '$pid'
				ORDER BY p.pirepid DESC 
				";
				
		
		$ret = DB::get_results($sql);
		return $ret;
	}
	
	
	public static function ReleaseTheoExam($id)    {
		
		
		 $query = "UPDATE academy_trainings SET exblocked = '0' WHERE id='$id'";

        DB::query($query);
    }
	
	
	public static function CheckAircraftExists($aircraftid)    {
		
		
		 $sql = "SELECT * FROM academy_aircraft WHERE aircraftid = '$aircraftid'";

        return DB::get_results($sql);
    }
	
	
}
