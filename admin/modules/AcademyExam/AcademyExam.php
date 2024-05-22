<?php
////////////////////////////////////////////////////////////////////////////
//Crazycreatives AcademyExam module for phpVMS virtual airline system     //
//@author Manuel Seiwald                                                  //
//@copyright Copyright (c) 2013, Manuel Seiwald, All Rights Reserved      //
////////////////////////////////////////////////////////////////////////////

class AcademyExam extends CodonModule {
	
	  public function HTMLHead()
    {
        $this->set('sidebar', 'flightacademy/sidebar.php');
    }
	
	public function index() {
		
		  $this->set('exams', AcademyExamData::GetAvailableExams());
          $this->show('academyexam/index.tpl');
    }




    public function exam_index($id) {
		
	
		  $this->set('activeexams', AcademyExamData::GetActiveExams());
		  $this->set('passedexams', AcademyExamData::GetPassedExamsLim());
		  $this->set('setting', AcademyExamData::GetSettings($id));
          $this->set('questions', AcademyExamData::GetQuestions($id));
		  $this->set('disableds', AcademyExamData::GetDisabledQuestions());
          $this->show('academyexam/exam_index.tpl');
    }
	
	public function settings() {
		
		  $this->set('action', 'saveaddexam');
		  $this->set('classes', FlightAcademyData::getAllClasses());
          $this->show('academyexam/settings.tpl');
    }
	
	public function edittheesettings($id) {
		
		  $this->set('action', 'saveeditexam');
		  $this->set('classes', FlightAcademyData::getAllClasses());
		  $this->set('setting', AcademyExamData::GetSettings($id));
          $this->show('academyexam/settings.tpl');
    }
	
	public function addexamaction()
	{
		if(isset($this->post->action))
		{
			if($this->post->action == 'saveaddexam')
			{
				$this->savesettings();
			}
			elseif($this->post->action == 'saveeditexam')
			{
				$this->editsettings();
			}
		}
	}
	
	public function delete_exam($id) {
		
		  AcademyExamData::DeleteExam($id);
		  AcademyExamData::DeleteExamQuestions($id);
		  $this->set('message', 'Exam deleted!');
		  $this->show('core_success.tpl');
          $this->index();
    }
	
	
	public function questions($id) {
	   	  $this->set('setting', AcademyExamData::GetSettings($id));
          $this->set('questions', AcademyExamData::GetQuestions($id));
		  $this->set('disableds', AcademyExamData::GetDisabledQuestions($id));
          $this->show('academyexam/questions.tpl');
    }
	
	public function editquestion($id) {
		  $this->set('action', 'editquestion');
		  $this->set('examid', $this->get-examid);
          $this->set('question', AcademyExamData::GetQuestion($id));
          $this->show('academyexam/editquestion.tpl');
    }
	
	public function addquestion($id) {
		  $this->set('examid', $id);
		  $this->set('action', 'addquestion');
          $this->show('academyexam/editquestion.tpl');
    }
	
	public function deletequestion($id) {

        AcademyExamData::DeleteQuestion($id);
		$examid = $this->get->examid;
        $this->set('message', 'Question deleted!');
	    $this->show('core_success.tpl');
        $this->questions($examid);
    }
	
	public function enablequestion($id) {

        AcademyExamData::EnableQuestion($id);
        $this->set('message', 'Question Enabled!');
	    $this->show('core_success.tpl');
		
		$examid = $this->get->examid;
        $this->questions($examid);
    }
	
	public function disablequestion($id) {

        AcademyExamData::DisableQuestion($id);
		
        $this->set('message', 'Question Disabled!');
	    $this->show('core_success.tpl');
		
		$examid = $this->get->examid;
        $this->questions($examid);
    }
	
	public function editsettings() {
		$id = DB::escape($this->post->id);
        $welcometext = DB::escape($this->post->welcometext);
		$examimage = DB::escape($this->post->examimage);
		$examstatus = DB::escape($this->post->examstatus);
		$questioncount = DB::escape($this->post->questioncount);
		$questiontime = DB::escape($this->post->questiontime);
		$passpercentage = DB::escape($this->post->passpercentage);
		$daysfailed = DB::escape($this->post->daysfailed);
		$classid = DB::escape($this->post->classid);
		$examtitle = DB::escape($this->post->examtitle);
	
		
        AcademyExamData::EditSettings($id, $welcometext, $examimage, $examstatus, $questioncount, $questiontime, $passpercentage, $daysfailed, $classid, $examtitle);
        
		$this->set('message', 'Exam Edited!');
	    $this->show('core_success.tpl');
        $this->index();
    }
	
	public function savesettings() {

        $welcometext = DB::escape($this->post->welcometext);
		$examimage = DB::escape($this->post->examimage);
		$examstatus = DB::escape($this->post->examstatus);
		$questioncount = DB::escape($this->post->questioncount);
		$questiontime = DB::escape($this->post->questiontime);
		$passpercentage = DB::escape($this->post->passpercentage);
		$daysfailed = DB::escape($this->post->daysfailed);
		$classid = DB::escape($this->post->classid);
		$examtitle = DB::escape($this->post->examtitle);
		
        AcademyExamData::SaveSettings($welcometext, $examimage, $examstatus, $questioncount, $questiontime, $passpercentage, $daysfailed, $classid, $examtitle);
        
		$this->set('message', 'Exam Created!');
	    $this->show('core_success.tpl');
        $this->index();
    }
	
	public function questionaction()
	{
		if(isset($this->post->action))
		{
			if($this->post->action == 'addquestion')
			{
				$this->savequestion();
			}
			elseif($this->post->action == 'editquestion')
			{
				$this->saveeditquestion();
			}
		}
	}
	
	
	public function savequestion() {

        $tquestion = DB::escape($this->post->tquestion);
		$answerone = DB::escape($this->post->answerone);
		$answertwo = DB::escape($this->post->answertwo);
		$answerthree = DB::escape($this->post->answerthree);
		$answerfour = DB::escape($this->post->answerfour);
		$questionimage = DB::escape($this->post->questionimage);
		$enabled = DB::escape($this->post->enabled);
		
		
		$goodanswer = DB::escape($this->post->goodanswer);
		$examid = DB::escape($this->post->examid);
		
        AcademyExamData::SaveQuestion($tquestion, $answerone, $answertwo, $answerthree, $answerfour, $questionimage, $enabled, $goodanswer, $examid);
        
		$this->set('message', 'Question Saved!');
	    $this->show('core_success.tpl');
        
        $this->questions($examid);
    }
	
	
	public function saveeditquestion() {
		
        $id = DB::escape($this->post->id);
        $tquestion = DB::escape($this->post->tquestion);
		$answerone = DB::escape($this->post->answerone);
		$answertwo = DB::escape($this->post->answertwo);
		$answerthree = DB::escape($this->post->answerthree);
		$answerfour = DB::escape($this->post->answerfour);
		$questionimage = DB::escape($this->post->questionimage);
		$enabled = DB::escape($this->post->enabled);
		
		
		$goodanswer = DB::escape($this->post->goodanswer);
		
        AcademyExamData::SaveEditQuestion($id, $tquestion, $answerone, $answertwo, $answerthree, $answerfour, $questionimage, $enabled, $goodanswer);
        
		
		$this->set('message', 'Question Edited!');
	    $this->show('core_success.tpl');
        $examid = $this->post->examid;
        $this->questions($examid);
    }
	
}