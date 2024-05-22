<?php
////////////////////////////////////////////////////////////////////////////
//Crazycreatives Flight Academy module for phpVMS virtual airline system  //
//@author Manuel Seiwald                                                  //
//@copyright Copyright (c) 2013, Manuel Seiwald, All Rights Reserved      //
////////////////////////////////////////////////////////////////////////////

class FlightAcademy extends CodonModule {

    public function index() {
		
		  $setting = FlightAcademyData::GetSettings();
		  $mytraining = FlightAcademyData::GetMyTraining(Auth::$userinfo->pilotid);
		  $myonda = FlightAcademyData::GetMyONDA(Auth::$userinfo->pilotid);
		  $this->set('setting', $setting);
		  
		  if($mytraining)
		  {
			  $this->mytraining();
			  return;
		  }
		  elseif($setting->status == '1')
		  {
	      $this->set('allclasses', FlightAcademyData::getAllActClasses());
	      $this->set('permclasses', FlightAcademyData::GetPermActClasses());
		  $this->set('tyraclasses', FlightAcademyData::GetTyraActClasses());
		  $this->set('ondaclasses', FlightAcademyData::GetOndaActClasses());
		  $this->set('upcoming', FlightAcademyData::getUpcomingClasses());
		  $this->show('flightacademy/menu_notra.tpl');
          $this->show('flightacademy/index.tpl');  
		  }
		  elseif($setting->status == '2')
		  {
          $this->set('message', 'Our Training Center is currently closed! Please check back later!');
		  $this->show('core_error.tpl');
		  }
		  
    }
	
	 public function mytraining() {
		  
		  $mytraining = FlightAcademyData::GetMyTraining(Auth::$userinfo->pilotid);
		
		  if(!$mytraining)
		  {
			  $this->livecourses();
		  }
		  else
		  {
		  $this->set('prexams', FlightAcademyData::GetPrexamsByTraining($mytraining->traid));
		  $this->set('theoexams', FlightAcademyData::GetPastTheoExamsForStudent($mytraining->studentid, $mytraining->traid));
		  $this->set('notes', FlightAcademyData::GetTrainingNotes($mytraining->traid));
		  $this->set('assignedflights', FlightAcademyData::getStudentsAssignedFlights($mytraining->traid));
	      $this->set('materials', FlightAcademyData::getMaterialsforCourse($mytraining->classid));
		  $this->set('lessons', FlightAcademyData::GetActLessonsByClass($mytraining->classid));
		  $this->set('setting', FlightAcademyData::GetSettings());
		  $this->set('training', $mytraining);
		  $this->show('flightacademy/menu.tpl');
          $this->show('flightacademy/progress_sheet.tpl');  
		  }
    }
	
	public function readcomment($id) {
		
		  $note = FlightAcademyData::GetTrainingNoteByID($id);
		  
		  $this->set('note', $note);
		  $this->set('setting', FlightAcademyData::GetSettings());
		  $this->set('training', FlightAcademyData::GetTrainingByID($note->trainingid));
		  
		  FlightAcademyData::MarkNoteRead($id);
		  
          $this->show('flightacademy/viewnote.tpl');  
    }
	
	
	 public function viewlesson($id) {
		  $lessonforid = FlightAcademyData::GetLessonsById($id);
		  $this->set('lesson', $lessonforid);
		  $this->set('lessons', FlightAcademyData::GetActLessonsByClass($lessonforid->classid));
		  $this->show('flightacademy/menu.tpl');
          $this->show('flightacademy/viewlesson.tpl');  
		  
    }
	
	
	 public function trainingfleet() {
		
		  $this->set('aircraft', FlightAcademyData::getTraAircraft());
		  $this->show('flightacademy/menu_notra.tpl');
          $this->show('flightacademy/fleet.tpl');  
		  
    }
	
	public function staff() {
		
		  $this->set('mentors', FlightAcademyData::GetAllMentors());
		  $this->show('flightacademy/menu_notra.tpl');
          $this->show('flightacademy/staff.tpl');  
		  
    }
	
	
	 public function classinfo($id) {
		
		  $this->set('class', FlightAcademyData::GetClassById($id));
		  $this->show('flightacademy/menu_notra.tpl');
          $this->show('flightacademy/classinfo1.tpl');  
		  
    }
	
	public function classinfo_onda($id) {
		
		  $this->set('class', FlightAcademyData::GetClassById($id));
		  $this->set('pilots', FlightAcademyData::GetLiveCourseAttendees($id));
		 
		 $mytraining = FlightAcademyData::GetMyTraining(Auth::$userinfo->pilotid);
		
		
		  if(!$mytraining) {
		  $this->show('flightacademy/menu_notra.tpl');
		  }
		  else
		  {
		  $this->show('flightacademy/menu.tpl');
		  }
		 
          $this->show('flightacademy/classinfo2.tpl');  
		  
    }
	
	public function course_signup($id) {
		 
		  $pilotid = Auth::$userinfo->pilotid;
		  $courseexistcheck = FlightAcademyData::GetMyTraining($pilotid);
		  $exactonedaycheck = FlightAcademyData::ExactOneDayCheck($id, $pilotid);
		  
		  if(!$courseexistcheck)
		  { 
		  FlightAcademyData::CourseSignUp($id, $pilotid);
		  $this->show('flightacademy/menu_notra.tpl');
		  $this->set('message', 'You have successfully signed up for this course! One of our instructors will get in contact with you soon!');
		  $this->show('core_success.tpl'); 
		  }
		  else
		  {
		  $this->set('message', 'You are already signed up for a training course!');
		  $this->show('core_error.tpl'); 
		  }
    }
	
	public function course_signup_onda($id) {
		 
		  $pilotid = Auth::$userinfo->pilotid;
		  $courseexistcheck = FlightAcademyData::GetMyTraining($pilotid);
		  $exactonedaycheck = FlightAcademyData::ExactOneDayCheck($id, $pilotid);
		  
		  if(!$exactonedaycheck)
		  { 
		  FlightAcademyData::CourseSignUp($id, $pilotid);
		  $this->show('flightacademy/menu_notra.tpl');
		  $this->set('message', 'You have successfully signed up for this course! One of our instructors will get in contact with you soon!');
		  $this->show('core_success.tpl'); 
		  }
		  else
		  {
		  $this->set('message', 'You are already signed up for a training course!');
		  $this->show('core_error.tpl'); 
		  }
    }
	
	
	
	
	public function myexams() {
		
		  $this->set('course', FlightAcademyData::GetMyTraining(Auth::$userinfo->pilotid));
		  $this->set('setting', FlightAcademyData::GetSettings());
		  $this->set('exams', FlightAcademyData::GetAvailExams(Auth::$userinfo->pilotid));
		  $this->show('flightacademy/menu.tpl');
          $this->show('flightacademy/exams_1.tpl');  
    }
	
	
	
	
	public function requestprexam($traid) {
		
		  FlightAcademyData::PrExamRequest($traid);
		  
		  $this->show('flightacademy/menu.tpl');
		  $this->set('message', 'You have successfully requested the practical Exam. Our Examiner will get in contact with you soon.');
		  $this->show('core_success.tpl');  
    }
	
	
	
	public function livecourses() {
		
		  $this->set('ondaclasses', FlightAcademyData::GetOndaActClasses());
		  $this->set('myonda', FlightAcademyData::GetMyONDA(Auth::$userinfo->pilotid));
		   
		  $mytraining = FlightAcademyData::GetMyTraining(Auth::$userinfo->pilotid);
		
		
		  if(!$mytraining) {
		  $this->show('flightacademy/menu_notra.tpl');
		  }
		  else
		  {
		  $this->show('flightacademy/menu.tpl');
		  }
		  
          $this->show('flightacademy/livecourses.tpl');  
		  
    }
	
	
	public function ondastuff($id) {
		
		  $this->set('class', FlightAcademyData::GetClassById($id));
		  $this->set('pilots', FlightAcademyData::GetLiveCourseAttendees($id));
		  $this->set('materials', FlightAcademyData::getMaterialsforCourse($id));
		   
		  $mytraining = FlightAcademyData::GetMyTraining(Auth::$userinfo->pilotid);
		
		
		  if(!$mytraining) {
		  $this->show('flightacademy/menu_notra.tpl');
		  }
		  else
		  {
		  $this->show('flightacademy/menu.tpl');
		  }
		  
          $this->show('flightacademy/ondastuff.tpl');  
		  
    }
	
	public function myhistory() {
		
		  $pilot = Auth::$userinfo->pilotid;
		  
		  $this->set('pastperm', FlightAcademyData::GetMyPastPerm($pilot));
		  $this->set('pastonda', FlightAcademyData::GetMyPastONDA($pilot));
		  $this->set('pasttyra', FlightAcademyData::GetMyPastTyra($pilot));
		   
		   
		  $mytraining = FlightAcademyData::GetMyTraining(Auth::$userinfo->pilotid);
		
		
		  if(!$mytraining) {
		  $this->show('flightacademy/menu_notra.tpl');
		  }
		  else
		  {
		  $this->show('flightacademy/menu.tpl');
		  }
		  
          $this->show('flightacademy/myhistory.tpl');  
		  
    }
	
	
	public function viewprogress_sheet($id) {
		
		  $training = FlightAcademyData::GetTrainById($id);
		  
		  $this->set('prexams', FlightAcademyData::GetPrexamsByTraining($training->traid));
		  $this->set('theoexams', FlightAcademyData::GetPastTheoExamsForStudent($training->studentid, $training->traid));
		  $this->set('notes', FlightAcademyData::GetTrainingNotes($training->traid));
		  $this->set('assignedflights', FlightAcademyData::getStudentsAssignedFlights($training->traid));
	      $this->set('materials', FlightAcademyData::getMaterialsforCourse($training->classid));
		  $this->set('lessons', FlightAcademyData::GetActLessonsByClass($training->classid));
		  $this->set('setting', FlightAcademyData::GetSettings());
		  $this->set('training', $training);
		   
		   
		  $mytraining = FlightAcademyData::GetMyTraining(Auth::$userinfo->pilotid);
		
		
		  if(!$mytraining) {
		  $this->show('flightacademy/menu_notra.tpl');
		  }
		  else
		  {
		  $this->show('flightacademy/menu.tpl');
		  }
		  
          $this->show('flightacademy/progress_sheet.tpl');  
		  
    }
	
	public function view_critique($id) {
		  
		  $this->set('exam', FlightAcademyData::GetPreXamByID($id));
		   
		   
		  $mytraining = FlightAcademyData::GetMyTraining(Auth::$userinfo->pilotid);
		
		
		  if(!$mytraining) {
		  $this->show('flightacademy/menu_notra.tpl');
		  }
		  else
		  {
		  $this->show('flightacademy/menu.tpl');
		  }
		  
          $this->show('flightacademy/viewcritique.tpl');  
		  
    }
	
	public function mytraininglog() {
		  
		  $this->set('trainflights', FlightAcademyData::getTrainingReportsbyPilot(Auth::$userinfo->pilotid));
		  
		  $mytraining = FlightAcademyData::GetMyTraining(Auth::$userinfo->pilotid);
		
		
		  if(!$mytraining) {
		  $this->show('flightacademy/menu_notra.tpl');
		  }
		  else
		  {
		  $this->show('flightacademy/menu.tpl');
		  }
		  
          $this->show('flightacademy/traininglog.tpl');  
		  
    }
	
	
	
	
	public function view_exam_detailed($id) {
		  
		  $this->set('exam', FlightAcademyData::GetExamDetailed($id));
		  $this->set('questions', FlightAcademyData::GetQuestionsForExam($id));
		   
		   
		  $mytraining = FlightAcademyData::GetMyTraining(Auth::$userinfo->pilotid);
		
		
		  if(!$mytraining) {
		  $this->show('flightacademy/menu_notra.tpl');
		  }
		  else
		  {
		  $this->show('flightacademy/menu.tpl');
		  }
		  
          $this->show('flightacademy/exams_detailed.tpl');  
		  
    }
}