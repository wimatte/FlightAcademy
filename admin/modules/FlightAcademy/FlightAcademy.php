<?php
////////////////////////////////////////////////////////////////////////////
//Crazycreatives Flight Academy module for phpVMS virtual airline system     //
//@author Manuel Seiwald                                                  //
//@copyright Copyright (c) 2013, Manuel Seiwald, All Rights Reserved      //
////////////////////////////////////////////////////////////////////////////

class FlightAcademy extends CodonModule {
	
	  public function HTMLHead()
    {
		$this->set('mytrainingsforcount', FlightAcademyData::GetMyStudents(Auth::$userinfo->pilotid));
		$this->set('requestedtrainsforcount', FlightAcademyData::GetTrainingRequests());
		$this->set('prexamsforcount', FlightAcademyData::GetRequestedPreXams());
		$this->set('completedstudentsforcount', FlightAcademyData::GetAllCompletedStudents());
		$this->set('activestudentsforcount', FlightAcademyData::GetAllStudents());
        $this->set('sidebar', 'flightacademy/sidebar.php');
    }

    public function NavBar()
    {
        echo '<li><a href="'.SITE_URL.'/admin/index.php/FlightAcademy">Flight Training</a></li>';
    }

    public function index() {
		
		  $this->set('setting', FlightAcademyData::GetSettings());
		  $this->set('awaiting', FlightAcademyData::GetAwaitingTrainings());
		  $this->set('completed', FlightAcademyData::GetAllCompletedTrainings());
		  $this->set('completedstudentsforcount', FlightAcademyData::GetAllCompletedStudents());
		  $this->set('activestudentsforcount', FlightAcademyData::GetAllStudents());
		  $this->set('passedthexamscount', FlightAcademyData::GetPassedExams());
		  $this->set('failedthexamscount', FlightAcademyData::GetFailedExams());
		  $this->set('passedprexamscount', FlightAcademyData::GetPassedPreXams());
		  $this->set('failedprexamscount', FlightAcademyData::GetFailedPreXams());
          $this->show('flightacademy/index.tpl');
    }
	
	public function settings() {
		
		  $this->set('setting', FlightAcademyData::GetSettings());
          $this->show('flightacademy/settings.tpl');
    }
	
	
	public function savesettings($id) {

        $welcometext = DB::escape($this->post->welcometext);
		$logourl = DB::escape($this->post->logourl);
		$status = DB::escape($this->post->status);
		$academyname = DB::escape($this->post->academyname);
		$airlinecode = DB::escape($this->post->airlinecode);
	
		
        FlightAcademyData::SaveSettings($id, $welcometext, $logourl, $status, $academyname, $airlinecode);
        
		$this->set('message', 'Settings Saved!');
	    $this->show('core_success.tpl');
        $this->index();
    }
	
	
	public function instructors() {
		   
		  $this->set('mentors', FlightAcademyData::GetAllMentors());
          $this->show('flightacademy/mentors.tpl');
    }
	
	
	
	
	public function addinstructor() {
		   
		  $this->set('action', 'addmentor');
		  $this->set('pilots', PilotData::getAllPilots());
          $this->show('flightacademy/mentors_form.tpl');
    }
	
	
	public function editinstructor($id) {
		   
		  $this->set('action', 'editmentor');
		  $this->set('pilots', PilotData::getAllPilots());
		  $this->set('mentor', FlightAcademyData::GetMentorByID($id));
          $this->show('flightacademy/mentors_form.tpl');
    }
	
	
	
	public function mentoraction()
	{
		if(isset($this->post->action))
		{
			if($this->post->action == 'addmentor')
			{
				$this->addmentor();
			}
			elseif($this->post->action == 'editmentor')
			{
				$this->editmentor();
			}
		}
	}
	
	
	protected function addmentor() {

        $pilotid = DB::escape($this->post->pilotid);
		$changesettings = DB::escape($this->post->changesettings);
		$addmentors = DB::escape($this->post->addmentors);
		$addcourses = DB::escape($this->post->addcourses);
		$addmaterials = DB::escape($this->post->addmaterials);
		$addflights = DB::escape($this->post->addflights);
		$texaminer = DB::escape($this->post->texaminer);
		$pexaminer = DB::escape($this->post->pexaminer);
		$status = DB::escape($this->post->status);
		$dateadded = date('Y-m-d');
	
		
        FlightAcademyData::SaveMentor($pilotid, $changesettings, $addmentors, $addcourses, $addmaterials, $addflights, $texaminer, $pexaminer, $status, $dateadded);
        
		$this->set('message', 'New Instructor Added!');
	    $this->show('core_success.tpl');
        $this->instructors();
    }
	
	
	protected function editmentor() {

        $id = DB::escape($this->post->id);
		$changesettings = DB::escape($this->post->changesettings);
		$addmentors = DB::escape($this->post->addmentors);
		$addcourses = DB::escape($this->post->addcourses);
		$addmaterials = DB::escape($this->post->addmaterials);
		$addflights = DB::escape($this->post->addflights);
		$texaminer = DB::escape($this->post->texaminer);
		$pexaminer = DB::escape($this->post->pexaminer);
		$status = DB::escape($this->post->status);
		
	
		
        FlightAcademyData::EditMentor($id, $changesettings, $addmentors, $addcourses, $addmaterials, $addflights, $texaminer, $pexaminer, $status);
        
		$this->set('message', 'Instructor Info Updated!');
	    $this->show('core_success.tpl');
        $this->instructors();
    }

	
	public function deletementor($id) {
		
		  FlightAcademyData::DeleteMentor($id);
          $this->instructors();
    }

	
	
	public function classes() {
		   
		  $this->set('permclasses', FlightAcademyData::GetPermClasses());
		  $this->set('tyraclasses', FlightAcademyData::GetTyraClasses());
		  $this->set('ondaclasses', FlightAcademyData::GetOndaClasses());
          $this->show('flightacademy/classes.tpl');
    }
	
	public function lessons($classid) {
		  $this->set('class', FlightAcademyData::GetClassById($classid));
		  $this->set('lessons', FlightAcademyData::GetLessonsByClass($classid));
          $this->show('flightacademy/lessons.tpl');
    }
	
	
	public function addclass() {
		   
          $this->show('flightacademy/classes_form.tpl');
    }
	
	public function addlesson($classid) {
		  $this->set('class', FlightAcademyData::GetClassById($classid));
		  $this->set('action', 'addlesson');
          $this->show('flightacademy/lessons_form.tpl');
    }
	
	public function editlesson($id) {
		   
		  $lesson = FlightAcademyData::GetLessonsById($id);
		  $this->set('action', 'editlesson');
		  $this->set('class', FlightAcademyData::GetClassById($lesson->classid));
		  $this->set('lesson', $lesson);
          $this->show('flightacademy/lessons_form.tpl');
    }
	
	
	public function viewlesson($id) {
		  $this->set('lesson', FlightAcademyData::GetLessonsById($id));
          $this->show('flightacademy/viewlesson.tpl');
    }
	
	public function lessonaction()
	{
		if(isset($this->post->action))
		{
			if($this->post->action == 'addlesson')
			{
				$this->savenewlesson();
			}
			elseif($this->post->action == 'editlesson')
			{
				$this->saveeditlesson();
			}
		}
	}
	
	
	protected function savenewlesson() {

        $lessonnum = DB::escape($this->post->lessonnum);
		$lestitle = DB::escape($this->post->lestitle);
		$lestext = DB::escape($this->post->lestext);
		$status = DB::escape($this->post->status);
		$classid = DB::escape($this->post->classid);
		$addedby = Auth::$userinfo->firstname.' '.Auth::$userinfo->lastname;
	
		
        FlightAcademyData::SaveLesson($lessonnum, $lestitle, $lestext, $status, $classid, $addedby);
        
		$this->set('message', 'New Lesson Added!');
	    $this->show('core_success.tpl');
        $this->lessons($classid);
    }
	
	protected function saveeditlesson() {

        $lessonnum = DB::escape($this->post->lessonnum);
		$lestitle = DB::escape($this->post->lestitle);
		$lestext = DB::escape($this->post->lestext);
		$status = DB::escape($this->post->status);
		$classid = DB::escape($this->post->classid);
		$id = DB::escape($this->post->id);
		
	
		
        FlightAcademyData::EditLesson($id, $lessonnum, $lestitle, $lestext, $status);
        
		$this->set('message', 'Lesson Updated!');
	    $this->show('core_success.tpl');
        $this->lessons($classid);
    }
	
		public function deletelesson($id) {
		FlightAcademyData::DeleteLesson($id);
          $this->classes();
    }
	
	
	
	
	public function addclass_step2() {
		   
		  $trainingtype = DB::escape($this->post->tratype);
		  $trainingname = DB::escape($this->post->traname);
		   
		  $this->set('action', 'addclass');
		  $this->set('trainingtype', $trainingtype);
		  $this->set('trainingname', $trainingname);
		  $this->set('allranks', RanksData::getAllRanks());
		  $this->set('allaircraft', OperationsData::GetAllAircraftSearchList(true));
		  $this->set('mentors', FlightAcademyData::GetAllMentors());
		  
		  
		  if($trainingtype == 'permanent')
		  {
          $this->show('flightacademy/classes_form_perm2.tpl');
		  }
		  elseif($trainingtype == 'typerating')
		  {
          $this->show('flightacademy/classes_form_tyra2.tpl');
		  }
		  elseif($trainingtype == 'oneday')
		  {
          $this->show('flightacademy/classes_form_onda2.tpl');
		  }
		  else
		  {
			  $this->addclass();
		  }
    }
	
	
	
	public function editclass($id) {
		   
		  $classinfo = FlightAcademyData::GetClassById($id);
		   
		  $this->set('action', 'editclass');
		  $this->set('allranks', RanksData::getAllRanks());
		  $this->set('allaircraft', OperationsData::GetAllAircraftSearchList(true));
		  $this->set('mentors', FlightAcademyData::GetAllMentors());
		  $this->set('class',  $classinfo);
		 
		 
		 
          if($classinfo->tratype == 'permanent')
		  {
          $this->show('flightacademy/classes_form_perm2.tpl');
		  }
		  elseif($classinfo->tratype == 'typerating')
		  {
          $this->show('flightacademy/classes_form_tyra2.tpl');
		  }
		  elseif($classinfo->tratype == 'oneday')
		  {
          $this->show('flightacademy/classes_form_onda2.tpl');
		  }
		  else
		  {
			  $this->classes();
		  }
    }
	
	
	public function classaction()
	{
		if(isset($this->post->action))
		{
			if($this->post->action == 'addclass')
			{
				$this->savenewclass();
			}
			elseif($this->post->action == 'editclass')
			{
				$this->editcourse();
			}
		}
	}

protected function savenewclass() {

        $tratype = DB::escape($this->post->tratype);
		$traname = DB::escape($this->post->traname);
		$description = DB::escape($this->post->description);
		$difficultylevel = DB::escape($this->post->difficultylevel);
		$requirements = DB::escape($this->post->requirements);
		$ranklevel = DB::escape($this->post->ranklevel);
		$goals = DB::escape($this->post->goals);
		$imageurl = DB::escape($this->post->imageurl);
		$certificateurl = DB::escape($this->post->certificateurl);
		$startdate = DB::escape($this->post->startdate);
		$starttime = DB::escape($this->post->starttime);
		$platforms = DB::escape($this->post->platforms);
		$instructor = DB::escape($this->post->instructor);
		$aircrafttype = DB::escape($this->post->aircrafttype);
		$theoryexamreq = DB::escape($this->post->theoryexamreq);
		$practexamreq = DB::escape($this->post->practexamreq);
		$status = DB::escape($this->post->status);
	
		
        FlightAcademyData::SaveClass($tratype, $traname, $description, $difficultylevel, $requirements, $ranklevel, $goals, $imageurl, $certificateurl, $startdate, $starttime, $platforms, $instructor, $aircrafttype, $theoryexamreq, $practexamreq, $status);
        
		$this->set('message', 'New Class Added!');
	    $this->show('core_success.tpl');
        $this->classes();
    }
	
	
		protected function editcourse() {

        $id = DB::escape($this->post->id);
		$traname = DB::escape($this->post->traname);
		$description = DB::escape($this->post->description);
		$difficultylevel = DB::escape($this->post->difficultylevel);
		$requirements = DB::escape($this->post->requirements);
		$ranklevel = DB::escape($this->post->ranklevel);
		$goals = DB::escape($this->post->goals);
		$imageurl = DB::escape($this->post->imageurl);
		$certificateurl = DB::escape($this->post->certificateurl);
		$startdate = DB::escape($this->post->startdate);
		$starttime = DB::escape($this->post->starttime);
		$platforms = DB::escape($this->post->platforms);
		$instructor = DB::escape($this->post->instructor);
		$aircrafttype = DB::escape($this->post->aircrafttype);
		$theoryexamreq = DB::escape($this->post->theoryexamreq);
		$practexamreq = DB::escape($this->post->practexamreq);
		$status = DB::escape($this->post->status);
		
	
		
        FlightAcademyData::EditClass($id, $traname, $description, $difficultylevel, $requirements, $ranklevel, $goals, $imageurl, $certificateurl, $startdate, $starttime, $platforms, $instructor, $aircrafttype, $theoryexamreq, $practexamreq, $status);
        
		$this->set('message', 'Class Info Updated!');
	    $this->show('core_success.tpl');
        $this->classes();
    }
	
	
	public function deleteclass($id) {
		FlightAcademyData::DeleteClass($id);
          $this->classes();
    }
	
	
	
	
	
	
	public function materials() {
		
		  $this->set('materials', FlightAcademyData::GetAllMaterials());
          $this->show('flightacademy/materials.tpl');
    }




    public function addmaterial() {
		   
		  $this->set('action', 'addmaterial');
		  $this->set('classes', FlightAcademyData::getAllClasses());
          $this->show('flightacademy/materials_form.tpl');
    }
	
	
	public function editmaterial($id) {
		   
		  $this->set('action', 'editmaterial');
		  $this->set('classes', FlightAcademyData::getAllClasses());
		  $this->set('material', FlightAcademyData::GetMaterialByID($id));
          $this->show('flightacademy/materials_form.tpl');
    }
	
	
	public function materialaction()
	{
		if(isset($this->post->action))
		{
			if($this->post->action == 'addmaterial')
			{
				$this->savenewmaterial();
			}
			elseif($this->post->action == 'editmaterial')
			{
				$this->saveeditmaterial();
			}
		}
	}
	
	
	
	protected function savenewmaterial() {

        $mattitle = DB::escape($this->post->mattitle);
		$matdescription = DB::escape($this->post->matdescription);
		$downloadurl = DB::escape($this->post->downloadurl);
		$belongsto = DB::escape($this->post->belongsto);
		$revision = '1';
		$lastupdate = date('Y-m-d H:i:s');
		$status = DB::escape($this->post->status);
		$addedby = Auth::$userinfo->firstname.' '.Auth::$userinfo->lastname;
	
		
        FlightAcademyData::SaveMaterial($mattitle, $matdescription, $downloadurl, $belongsto, $revision, $lastupdate, $status, $addedby);
        
		$this->set('message', 'New Material Added!');
	    $this->show('core_success.tpl');
        $this->materials();
    }
	
	
	protected function saveeditmaterial() {

        $id = DB::escape($this->post->id);
		$mattitle = DB::escape($this->post->mattitle);
		$matdescription = DB::escape($this->post->matdescription);
		$downloadurl = DB::escape($this->post->downloadurl);
		$belongsto = DB::escape($this->post->belongsto);
		$lastupdate = date('Y-m-d H:i:s');
		$status = DB::escape($this->post->status);
		$addedby = Auth::$userinfo->firstname.' '.Auth::$userinfo->lastname;
		
	
		
        FlightAcademyData::EditTheMaterial($id, $mattitle, $matdescription, $downloadurl, $belongsto, $lastupdate, $status, $addedby);
        
		$this->set('message', 'Material Info Updated!');
	    $this->show('core_success.tpl');
        $this->materials();
    }
	
	
	public function deletematerial($id) {
		FlightAcademyData::DeleteMaterial($id);
          $this->materials();
    }
	
	
	
	public function traflights() {
		  $setting = FlightAcademyData::GetSettings();
		  
		  $this->set('traflights', FlightAcademyData::GetTrainingFlights($setting->airlinecode));
          $this->show('flightacademy/traflights.tpl');
    }
	
	
	
	
	public function addtraflight()
	{
		$this->set('title', 'Add Training Flight');
		$this->set('action', 'addschedule');

        $this->set('setting', FlightAcademyData::GetSettings());
        $this->set('allairlines', OperationsData::GetAllAirlines());
		$this->set('allaircraft', FlightAcademyData::getTraAircraft());
		$this->set('allairports', OperationsData::GetAllAirports());
		//$this->set('airport_json_list', OperationsData::getAllAirportsJSON());
		$this->set('flighttypes', Config::Get('FLIGHT_TYPES'));

		$this->render('flightacademy/traflight_form.tpl');
	}
	
	
	public function edittraflight($id)
	{
		$this->set('title', 'Edit Training Flight');
		$this->set('schedule', SchedulesData::GetSchedule($id));
		
		$this->set('action', 'editschedule');
        $this->set('setting', FlightAcademyData::GetSettings());
        $this->set('allairlines', OperationsData::GetAllAirlines());
		$this->set('allaircraft', FlightAcademyData::getTraAircraft());
		$this->set('allairports', OperationsData::GetAllAirports());
		$this->set('flighttypes', Config::Get('FLIGHT_TYPES'));
		
		$this->render('flightacademy/traflight_form.tpl');
	}
    
    public function deletetraflight($id)
    {
        
    FlightAcademyData::DeleteFlightAssignmentBySchd($id);
    FlightAcademyData::DeleteTrainingFlight($id);
        
        $this->set('message', 'The flight has been deleted!');
		$this->render('core_success.tpl');
        
        $this->traflights();
        
    }
    
	
	public function traflightaction()
	{
		if(isset($this->post->action))
		{
			if($this->post->action == 'addschedule')
			{
				$this->add_schedule_post();
			}
			elseif($this->post->action == 'editschedule')
			{
				$this->edit_schedule_post();
			}
		}
	}
	
	
	protected function add_schedule_post()
	{	
		if($this->post->code == '' || $this->post->flightnum == '' 
			|| $this->post->deptime == '' || $this->post->arrtime == ''
			|| $this->post->depicao == '' || $this->post->arricao == '')
		{
			$this->set('message', 'All of the fields must be filled out');
			$this->render('core_error.tpl');
			
			return;
		}
		

		$sched = SchedulesData::getScheduleByFlight($this->post->code, $this->post->flightnum);
		if(is_object($sched))
		{
			$this->set('message', 'This schedule already exists!');
			$this->render('core_error.tpl');
			
			return;			
		}
		
		$enabled = ($this->post->enabled == 'on') ? true : false;
		
	
		if($this->post->distance == '' || $this->post->distance == 0)
		{
			$this->post->distance = OperationsData::getAirportDistance($this->post->depicao, $this->post->arricao);
		}
		

		$this->post->flightlevel = str_replace(',', '', $this->post->flightlevel);
		$this->post->flightlevel = str_replace(' ', '', $this->post->flightlevel);

		$this->post->route = strtoupper($this->post->route);
		$this->post->route = str_replace($this->post->depicao, '', $this->post->route);
		$this->post->route = str_replace($this->post->arricao, '', $this->post->route);
		$this->post->route = str_replace('SID', '', $this->post->route);
		$this->post->route = str_replace('STAR', '', $this->post->route);
	
		$data = array(	'code'=>$this->post->code,
						'flightnum'=>$this->post->flightnum,
						'depicao'=>$this->post->depicao,
						'arricao'=>$this->post->arricao,
						'route'=>$this->post->route,
						'aircraft'=>$this->post->aircraft,
						'flightlevel'=>$this->post->flightlevel,
						'distance'=>$this->post->distance,
						'deptime'=>$this->post->deptime,
						'arrtime'=>$this->post->arrtime,
						'flighttime'=>$this->post->flighttime,
						'daysofweek'=>implode('', $_POST['daysofweek']),
						'price'=>$this->post->price,
						'flighttype'=>$this->post->flighttype,
						'notes'=>$this->post->notes,
						'enabled'=>$enabled);
				

		$ret = SchedulesData::AddSchedule($data);
			
		if(DB::errno() != 0 && $ret == false)
		{
            $this->set('message', 'There was an error adding the schedule, already exists DB error: '.DB::error());
			$this->render('core_error.tpl');
			return;
		}
		
        $this->set('message', 'The schedule "'.$this->post->code.$this->post->flightnum.'" has been added');
		$this->render('core_success.tpl');
		
		LogData::addLog(Auth::$userinfo->pilotid, 'Added schedule "'.$this->post->code.$this->post->flightnum.'"');
	}

	protected function edit_schedule_post()
	{
		if($this->post->code == '' || $this->post->flightnum == '' 
			|| $this->post->deptime == '' || $this->post->arrtime == ''
			|| $this->post->depicao == '' || $this->post->arricao == '')
		{
			$this->set('message', 'All of the fields must be filled out');
			$this->render('core_error.tpl');
			
			return;
		}
		
		$enabled = ($this->post->enabled == 'on') ? true : false;
		$this->post->route = strtoupper($this->post->route);
		

		$this->post->flightlevel = str_replace(',', '', $this->post->flightlevel);
		$this->post->flightlevel = str_replace(' ', '', $this->post->flightlevel);

		$this->post->route = strtoupper($this->post->route);
		$this->post->route = str_replace($this->post->depicao, '', $this->post->route);
		$this->post->route = str_replace($this->post->arricao, '', $this->post->route);
		$this->post->route = str_replace('SID', '', $this->post->route);
		$this->post->route = str_replace('STAR', '', $this->post->route);
		
		$data = array(	'code'=>$this->post->code,
						'flightnum'=>$this->post->flightnum,
						'depicao'=>$this->post->depicao,
						'arricao'=>$this->post->arricao,
						'route'=>$this->post->route,
						'aircraft'=>$this->post->aircraft,
						'flightlevel'=>$this->post->flightlevel,
						'distance'=>$this->post->distance,
						'deptime'=>$this->post->deptime,
						'arrtime'=>$this->post->arrtime,
						'flighttime'=>$this->post->flighttime,
						'daysofweek'=>implode('', $_POST['daysofweek']),
						'price'=>$this->post->price,
						'flighttype'=>$this->post->flighttype,
						'notes'=>$this->post->notes,
						'enabled'=>$enabled);
		
		$val = SchedulesData::editScheduleFields($this->post->id, $data);
		if(!$val)
		{
			$this->set('message', 'There was an error editing the schedule: '.DB::error());
			$this->render('core_error.tpl');
			return;
		}
		

		SchedulesData::getRouteDetails($this->post->id, $this->post->route);
		
		$this->set('message', 'The schedule "'.$this->post->code.$this->post->flightnum.'" has been edited');
		$this->render('core_success.tpl');
		
		LogData::addLog(Auth::$userinfo->pilotid, 'Edited schedule "'.$this->post->code.$this->post->flightnum.'"');
	}
	
	
	//Aircraft Stuff
	
	public function assignAC() {
		  $this->set('aircraft', FlightAcademyData::getAllaircraft());
          $this->show('flightacademy/assignac.tpl');
    }
	
	
	public function aircraft() {
		
		  $this->set('aircraft', FlightAcademyData::getTraAircraft());
          $this->show('flightacademy/aircraft.tpl');
    }
	
	
	public function addAC() {
		
	    $aircraft = array();

        $aircraft['aircraftid'] = DB::escape($this->post->aircraftid);
        
		$result = FlightAcademyData::CheckAircraftExists($aircraft['aircraftid']);

if ($result)
{
	 $this->set('message', 'Aircraft already Exists!');
	 $this->render('core_error.tpl');
            return;
}

        FlightAcademyData::addAC( $aircraft['aircraftid']
									);  
   
   $this->aircraft();
    
    }
	
	 public function remove_aircraft($id)    {

        FlightAcademyData::remove_aircraft($id);
        $this->aircraft();
    }
	
	
	
	public function trainingrequests() {
		
		  $this->set('setting', FlightAcademyData::GetSettings());
		  $this->set('trainings', FlightAcademyData::GetTrainingRequests());
          $this->show('flightacademy/trrequests.tpl');
    }
	
	 public function assignmentor($id)    {
         
	    $mentid = Auth::$userinfo->pilotid;
        FlightAcademyData::AssignMentor($id, $mentid);
        $this->trainingrequests();
    }
	
	
	public function deletetraining($id)    {
         
        FlightAcademyData::DeleteTraining($id);
        $this->mystudents();
    }
	
	public function closetraining($id)    {
         
        FlightAcademyData::CloseTraining($id);
        $this->mystudents();
    }
	
	public function reopentraining($id)    {
         
        FlightAcademyData::ReOpenTraining($id);
        $this->mystudents();
    }
	
	public function completetraining($id)    {
         
        FlightAcademyData::CompleteTraining($id);
        $this->index();
    }
	
	
		public function mystudents() {
		
		  $this->set('setting', FlightAcademyData::GetSettings());
		  $this->set('completed', FlightAcademyData::GetMyCompletedStudents(Auth::$userinfo->pilotid));
		  $this->set('trainings', FlightAcademyData::GetMyStudents(Auth::$userinfo->pilotid));
          $this->show('flightacademy/mystudents.tpl');
    }
	
	public function allstudents() {
		
		  $this->set('setting', FlightAcademyData::GetSettings());
		  $this->set('completed', FlightAcademyData::GetAllCompletedStudents());
		  $this->set('trainings', FlightAcademyData::GetAllStudents());
          $this->show('flightacademy/allstudents.tpl');
    }
	
	public function changementor($id) {
		  $thetraining = FlightAcademyData::GetTrainingByID($id);
		  
		  $this->set('mentors', FlightAcademyData::GetAllMentors());
		  $this->set('setting', FlightAcademyData::GetSettings());
		  $this->set('training', $thetraining);
          $this->show('flightacademy/changementor_form.tpl');
    }
	
	public function savechangementor()    {
		
		$id = $this->post->id;
		$mentorid = $this->post->mentorid;
         
        FlightAcademyData::SaveChangeMentor($id, $mentorid);
        $this->viewprogress_sheet($id);
    }
	
	public function changeprogress($id) {
		  $thetraining = FlightAcademyData::GetTrainingByID($id);
		  
		  $this->set('setting', FlightAcademyData::GetSettings());
		  $this->set('training', $thetraining);
          $this->show('flightacademy/changeprogress_form.tpl');
    }
	
	public function assigntraflight($id) {
		  $thetraining = FlightAcademyData::GetTrainingByID($id);
		  $setting = FlightAcademyData::GetSettings();
		  
		  $this->set('traflights', FlightAcademyData::GetTrainingFlights($setting->airlinecode));
		  $this->set('setting', $setting);
		  $this->set('training', $thetraining);
          $this->show('flightacademy/assignflight_form.tpl');
    }
	
	public function savechangeprogress()    {
		
		$id = $this->post->id;
		$progress = $this->post->progress;
         
        FlightAcademyData::SaveChangeProgress($id, $progress);
        $this->viewprogress_sheet($id);
    }
	
	public function saveassignflight()    {
		
		$trainingid = $this->post->trainingid;
		$pilotid = $this->post->pilotid;
		$flightid = $this->post->flightid;
		$assignedby = Auth::$userinfo->pilotid;
         
        FlightAcademyData::SaveAssignFlight($trainingid, $pilotid, $flightid, $assignedby);
        $this->viewprogress_sheet($trainingid);
    }
	
	public function removeflightassignment($id)    {
        $traid = $this->get->traid;
        FlightAcademyData::DeleteFlightAssignment($id);
        $this->viewprogress_sheet($traid);
    }
	
	public function viewprogress_sheet($id) {
		
		  $thetraining = FlightAcademyData::GetTrainingByID($id);
		
		  $this->set('trainflights', FlightAcademyData::getTrainingReportsbyPilot($thetraining->studentid));
		  $this->set('prexams', FlightAcademyData::GetPrexamsByTraining($id));
		  $this->set('notes', FlightAcademyData::GetTrainingNotes($id));
		  $this->set('theoexams', FlightAcademyData::GetPastTheoExamsForStudent($thetraining->studentid, $id));
		  $this->set('assignedflights', FlightAcademyData::getStudentsAssignedFlights($id));
		  $this->set('materials', FlightAcademyData::getMaterialsforCourse($thetraining->classid));
		  $this->set('lessons', FlightAcademyData::GetActLessonsByClass($thetraining->classid));
		  $this->set('setting', FlightAcademyData::GetSettings());
		  $this->set('training', $thetraining);
          $this->show('flightacademy/progress_sheet.tpl');  
    }
	
		public function readcomment($id) {
		
		  $note = FlightAcademyData::GetTrainingNoteByID($id);
		  
		  $this->set('note', $note);
		  $this->set('setting', FlightAcademyData::GetSettings());
		  $this->set('training', FlightAcademyData::GetTrainingByID($note->trainingid));
          $this->show('flightacademy/viewnote.tpl');  
    }
	
	public function addnote($id) {
		  $thetraining = FlightAcademyData::GetTrainingByID($id);
		  
		  $this->set('setting', FlightAcademyData::GetSettings());
		  $this->set('training', $thetraining);
		  $this->set('action', 'savenote');
          $this->show('flightacademy/notes_form.tpl');
    }
	
	public function editnote($id) {
		  $note = FlightAcademyData::GetTrainingNoteByID($id);
		  
		  $this->set('note', $note);
		  $this->set('setting', FlightAcademyData::GetSettings());
		  $this->set('training', FlightAcademyData::GetTrainingByID($note->trainingid));
		  $this->set('action', 'editnote');
          $this->show('flightacademy/notes_form.tpl');
    }
	
	public function noteaction()
	{
		if(isset($this->post->action))
		{
			if($this->post->action == 'savenote')
			{
				$this->saveaddnote();
			}
			elseif($this->post->action == 'editnote')
			{
				$this->saveeditnote();
			}
		}
	}
	
	
	public function saveaddnote()    {
		
		$trainingid = DB::escape($this->post->trainingid);
		$comment = DB::escape($this->post->comment);
		$addedby = Auth::$userinfo->pilotid;
         
        FlightAcademyData::SaveAddNote($trainingid, $comment, $addedby);
        $this->viewprogress_sheet($trainingid);
    }
	
	
	public function saveeditnote()    {
		
		$id = DB::escape($this->post->id);
		$trainingid = DB::escape($this->post->trainingid);
		$comment = DB::escape($this->post->comment);
         
        FlightAcademyData::SaveEditNote($id, $comment);
        $this->viewprogress_sheet($trainingid);
    }
	
	
	public function deletenote($id)    {
        $traid = $this->get->traid;
        FlightAcademyData::DeleteNote($id);
        $this->viewprogress_sheet($traid);
    }
	
	public function mystudentexams() {
		  
		  $mentorid = Auth::$userinfo->pilotid;
		  $this->set('unfinished', FlightAcademyData::GetMentUnfinishedExams($mentorid));
		  $this->set('passed', FlightAcademyData::GetMentPassedExams($mentorid));
		  $this->set('failed', FlightAcademyData::GetMentFailedExams($mentorid));
          $this->show('flightacademy/exams_mentor.tpl');
    }
	
	public function exams_overview() {
		  
		  $this->set('unfinished', FlightAcademyData::GetUnfinishedExams());
		  $this->set('passed', FlightAcademyData::GetPassedExams());
		  $this->set('failed', FlightAcademyData::GetFailedExams());
          $this->show('flightacademy/exams_overview.tpl');
    }
	
	public function view_exam_detailed($id) {
		  
		  $this->set('exam', FlightAcademyData::GetExamDetailed($id));
		  $this->set('questions', FlightAcademyData::GetQuestionsForExam($id));
          $this->show('flightacademy/exams_detailed.tpl');
    }
	
	public function deleteexamment($id) {
		  
		  FlightAcademyData::DeleteThExam($id);
		  
		  $this->mystudentexams();  
    }
	
	public function all_prexam_requests() {
		  
		  $this->set('prexams', FlightAcademyData::GetRequestedPreXams());
          $this->show('flightacademy/prexam_request.tpl');
    }
	
	public function deleteprexam($id) {
		  
		  FlightAcademyData::DeletePrexam($id);
		  
		  $this->set('message', 'Exam Request Deleted');
	      $this->show('core_success.tpl');
          $this->all_prexam_requests();
    }
	
	public function assign_prexam_step($id) {
		  
		  $this->set('exam', FlightAcademyData::GetPreXamByID($id));
          $this->show('flightacademy/assign_prexam_step.tpl');
    }
	
	
	public function assign_prexam() {
		  
		  $message = DB::escape($this->post->message);
		  $examid = DB::escape($this->post->examid);
		  $pilotmail = DB::escape($this->post->pilotemail);
		  $mentormail = DB::escape($this->post->mentormail);
		  
		  $empfaenger = $pilotmail;
          $subject = 'Practical Examiner Assigned!';
		  
		  // für HTML-E-Mails muss der 'Content-type'-Header gesetzt werden
          $header  = $mentormail;
		  
		  Util::SendEmail($empfaenger, $subject, $this->post->message, $header);

		  
		  FlightAcademyData::AssignPrexamToExaminer($examid, Auth::$userinfo->pilotid);
		  
		  $this->set('message', 'Exam Assigned!');
	      $this->show('core_success.tpl');
		  $this->all_prexam_requests();
    }
	
	
	public function prexam_overview() {
		  
		  $this->set('prexams', FlightAcademyData::GetActivePreXams());
		  $this->set('passed', FlightAcademyData::GetPassedPreXams());
		  $this->set('failed', FlightAcademyData::GetFailedPreXams());
          $this->show('flightacademy/prexams_overview.tpl');
    }
	
		public function prexams_myoverview() {
		  
		  $this->set('prexams', FlightAcademyData::GetMyActivePreXams(Auth::$userinfo->pilotid));
		  $this->set('passed', FlightAcademyData::GetMyPassedPreXams(Auth::$userinfo->pilotid));
		  $this->set('failed', FlightAcademyData::GetMyFailedPreXams(Auth::$userinfo->pilotid));
          $this->show('flightacademy/prexams_myoverview.tpl');
    }
	
	
	public function edit_prexam_critique($id) {
		  
		  $this->set('directto', $this->get->frompage);
		  $this->set('exam', FlightAcademyData::GetPreXamByID($id));
          $this->show('flightacademy/prexam_critique.tpl');
    }
	
	public function edit_prexam_detail($id) {
		
		  $setting = FlightAcademyData::GetSettings();
		  
		  $this->set('traflights', FlightAcademyData::GetTrainingFlights($setting->airlinecode));
		  $this->set('directto', $this->get->frompage);
		  $this->set('exam', FlightAcademyData::GetPreXamByID($id));
          $this->show('flightacademy/prexam_edit_detail.tpl');
    }
	
	
	public function writecritique() {
		  
		  $directto = DB::escape($this->post->directto);
		  $examid = DB::escape($this->post->examid);
          $critique = DB::escape($this->post->critique);
		  
		  FlightAcademyData::UpdatePrExamCritique($examid, $critique);
		  
		  $this->set('message', 'Critique Saved!');
	      $this->show('core_success.tpl');
		  
		  if($directto == 'allprexams')
		  {
		  $this->prexam_overview();
		  }
		  else
		  {
		  $this->prexams_myoverview();  
		  }
    }
	
	public function deleteprexam_examiner($id) {
		  
		  FlightAcademyData::DeletePrexam($id);
		  
		  $this->set('message', 'Exam Request Deleted');
	      $this->show('core_success.tpl');
		  
		   if($directto == 'allprexams')
		  {
		  $this->prexam_overview();
		  }
		  else
		  {
		  $this->prexams_myoverview();  
		  }
    }
	
	
	public function editprexamdetails() {
		  
		  $directto = DB::escape($this->post->directto);
		  $examid = DB::escape($this->post->examid);
          $exdate = DB::escape($this->post->exdate);
		  $extime = DB::escape($this->post->extime);
		  $result = DB::escape($this->post->result);
		  $examflight = DB::escape($this->post->examflight);
		  $pilotid = DB::escape($this->post->pilotid);
		  $traid = DB::escape($this->post->traid);
		  
		  FlightAcademyData::EditPractExamDetails($examid, $exdate, $extime, $result, $examflight, $traid, $pilotid);
		  
		  $this->set('message', 'Exam Edited!');
	      $this->show('core_success.tpl');
		  
		  if($directto == 'allprexams')
		  {
		  $this->prexam_overview();
		  }
		  else
		  {
		  $this->prexams_myoverview();  
		  }
    }
	
	
	public function mylivecourses() {
		  
		  $this->set('courses', FlightAcademyData::GetMyLiveCourses(Auth::$userinfo->pilotid));
          $this->show('flightacademy/mylivecourses.tpl');
    }
	
	public function livecoursematerials($id) {
		
		  $this->set('materials', FlightAcademyData::getMaterialsforCourse($id));
          $this->show('flightacademy/livecoursematerials.tpl');
    }
	
	public function livecourseattendees($id) {
		
		  $this->set('pilots', FlightAcademyData::GetLiveCourseAttendees($id));
          $this->show('flightacademy/livecourseattendees.tpl');
    }
	
	public function releaseforexam($id) {
		  
		  FlightAcademyData::ReleaseTheoExam($id);
		  
		  $this->viewprogress_sheet($id);
    }
	
	
}