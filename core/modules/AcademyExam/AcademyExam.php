<?php
////////////////////////////////////////////////////////////////////////////
//Crazycreatives AcademyExam module for phpVMS virtual airline system     //
//@author Manuel Seiwald                                                  //
//@copyright Copyright (c) 2013, Manuel Seiwald, All Rights Reserved      //
////////////////////////////////////////////////////////////////////////////

class AcademyExam extends CodonModule {
   
   
    public function index($id) {
		  $this->set('traid', $this->get->traid);
		  $this->set('setting', AcademyExamData::GetSettings($id));
          $this->show('academyexam/index.tpl');
    }
	
	public function createexam() {
	        
			
			$firstname = Auth::$userinfo->firstname;
			$lastname = Auth::$userinfo->lastname;
			$email = Auth::$userinfo->email;
			$traid = $this->get->traid;
			$pilotid = Auth::$userinfo->pilotid;
			$setid = $this->get->setid;
			$checkexam = AcademyExamData::CheckExamExist(Auth::$userinfo->pilotid);
			$startdate = date('Y-m-d h:i:s');
			if(!$checkexam)
			{
			AcademyExamData::CreateExam($email, $firstname, $lastname, $traid, $pilotid, $setid, $startdate);

            $show = '1';
			
			$activeexam = AcademyExamData::GetExamEmail($email);
			header('Location:'.SITE_URL.'/index.php/AcademyExam/academyexam_question/'.$activeexam->id.'?show=1');

			}
			else
			{
			$this->set('message', '<div align="center">You cannot have more than 1 exams active! Please contact your Instructor to have your exam reset!</div>');
             $this->show('academyexam/message.tpl'); 
			}
    }
	
	
	public function academyexam_question($exid, $show = "0") {
          
		  $activeexam = AcademyExamData::GetExambyID($exid);		  
		  $setting = AcademyExamData::GetSettings($activeexam->exsid);
		  
		  
		  
		   if($this->post->show == '1')
		   {
		   $show =  '1';
	       }
		   
		   if($this->get->show == '1')
		   {
		   $show =  '1';
	       }
			
			$questiontograde = $this->post->questionid;
			$totalquestion = $this->post->totalquestion;
			$useranswer = $this->post->useranswer;

            $questionfinish = AcademyExamData::FinishQuestionTest($exid, $questiontograde);
			 if($questionfinish->finished == '1')
		   
		   {
			$this->set('message', '<div align="center">You are not allowed to use the return function in your browser! Please contact your Instructor to have your exam reset!</div>');
             $this->show('academyexam/message.tpl');   
			 return;
		   }
		   
			
			if($this->post->gradequestion == '1')
		   { 
		   $this->gradequestion($exid, $questiontograde, $useranswer);
		   header('Location:'.SITE_URL.'/index.php/AcademyExam/academyexam_question/'.$exid.'?show=1');
		   }
		   
		   if(($activeexam->correctq + $activeexam->wrongq) == $setting->questioncount)
		   {
			$this->gradeexam($exid);
			return;
		   }
		   
		   
		   if($totalquestion == $setting->questioncount)
		   {
			$this->gradeexam($exid);
			return;
		   }
		   
		   
		   if($show == '1')
		   {
		  $activeexam = AcademyExamData::GetExambyID($exid);
		  $currentquestion = $activeexam->currentquestion;
		  
		  $this->set('setting', $setting);
		  $this->set('exam', $activeexam);
		  $this->set('question', AcademyExamData::GetQuestionInfo($currentquestion, $exid));
          
		  $this->show('academyexam/question.tpl');
		  
		  
		   }
		   else
		   {

		  $activeexam = AcademyExamData::GetExambyID($exid);
		  $questiontomark = AcademyExamData::GetQuestionNum($exid, $activeexam->currentquestion);
          AcademyExamData::IncrementCurrentPenaltyQuestion($exid);
		  AcademyExamData::MarkQuestionFinished($exid, $questiontomark->qid);
		  
		  
		  $show = '1';
		  header('Location:'.SITE_URL.'/index.php/AcademyExam/academyexam_question/'.$exid.'?show=1');
		  
		   }
		   
		
		
    }
	
	
	
	public function gradequestion($exid, $questionid, $useranswer) {
		   
         
          $questioninfo = AcademyExamData::GetQuestion($questionid);
		  
		  if($questioninfo->goodanswer == $useranswer)
		  {
		  AcademyExamData::CorrectQuestion($exid);
		  AcademyExamData::IncrementCurrentQuestion($exid);
		  AcademyExamData::MarkQuestionFinished($exid, $questionid, $useranswer);
		  
		  
		  }
		  else
		  {
	      AcademyExamData::FalseQuestion($exid);
		  AcademyExamData::IncrementCurrentQuestion($exid);
		  AcademyExamData::MarkQuestionFinished($exid, $questionid, $useranswer);
		  }
		  
    }
	
	public function gradeexam($exid) {
		   
          $exam = AcademyExamData::GetExambyID($exid);
		  $setting = AcademyExamData::GetSettings($exam->exsid);
		  
		  $totalquestions = ($exam->correctq + $exam->wrongq);
		  $reachedpercentage = round((100 / $totalquestions ) * $exam->correctq);
		  
		  if($reachedpercentage >= $setting->passpercentage)
		  {
		  $passfail = "Passed";
		  $gradedate = date('Y-m-d');
		  
		  AcademyExamData::IncrementPassed();
		  AcademyExamData::GradeExam($exid, $reachedpercentage, $passfail, $gradedate);
		  $this->set('setting', AcademyExamData::GetSettings($exam->exsid));
		  $this->set('exam', AcademyExamData::GetExambyID($exid));
		  $this->show('academyexam/exam_passed.tpl');
		  }
		  else
		  {
		  $passfail = "Failed";
		  $gradedate = date('Y-m-d');
		  
		  AcademyExamData::IncrementFailed();
		  AcademyExamData::GradeExam($exid, $reachedpercentage, $passfail, $gradedate);
		  $this->set('setting', AcademyExamData::GetSettings($exam->exsid));
		  $this->set('exam', AcademyExamData::GetExambyID($exid));
		  $this->show('academyexam/exam_failed.tpl');
		  }
		  
    }
	
}