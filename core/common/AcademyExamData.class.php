<?php
////////////////////////////////////////////////////////////////////////////
//Crazycreatives AcademyExam module for phpVMS virtual airline system      //
//@author Manuel Seiwald                                                  //
//@copyright Copyright (c) 2013, Manuel Seiwald, All Rights Reserved      //
////////////////////////////////////////////////////////////////////////////

class AcademyExamData extends CodonData {


    public static function GetSettings($id) {
        $query = "SELECT * FROM  academy_exam_settings
		WHERE id = '$id'";
        return DB::get_row($query);
    }
	
	
	public static function GetAvailableExams() {
        $query = "SELECT * FROM  academy_exam_settings";
        return DB::get_results($query);
    }
	
	public static function SaveSettings($welcometext, $examimage, $examstatus, $questioncount, $questiontime, $passpercentage, $daysfailed, $classid, $examtitle)
	    {
         $query = "INSERT INTO academy_exam_settings (welcometext, examimage, examstatus, questioncount, questiontime, passpercentage, daysfailed, classid, examtitle)
                        VALUES('$welcometext', '$examimage', '$examstatus', '$questioncount', '$questiontime', '$passpercentage', '$daysfailed', '$classid', '$examtitle')";

        DB::query($query);
    }
	
	public static function EditSettings($id, $welcometext, $examimage, $examstatus, $questioncount, $questiontime, $passpercentage, $daysfailed, $classid, $examtitle)
	    {
        $query = "UPDATE academy_exam_settings SET welcometext='$welcometext', examimage='$examimage', examstatus='$examstatus', questioncount='$questioncount' , questiontime='$questiontime', passpercentage='$passpercentage' , daysfailed='$daysfailed', classid='$classid', examtitle='$examtitle' WHERE id='$id'";

        DB::query($query);
    }
	
	
	public static function GetQuestions($id) {
        $query = "SELECT * FROM academy_questions
		WHERE enabled = '1' AND examid = '$id'";
        return DB::get_results($query);
    }
	
	public static function GetDisabledQuestions($id) {
        $query = "SELECT * FROM academy_questions
		WHERE enabled != '1' AND examid = '$id'";
        return DB::get_results($query);
    }
	
	
	
	public static function GetQuestion($id) {
        $query = "SELECT * FROM academy_questions
		WHERE id ='$id'";
        return DB::get_row($query);
    }
	
	public static function GetExamsbyEmail($email) {
        $query = "SELECT * FROM academy_exams
		WHERE email ='$email'
		LIMIT 1";
        return DB::get_results($query);
    }
	
	public static function CheckExamExist($pilotid) {
        $query = "SELECT * FROM academy_exams
		WHERE pilotid ='$pilotid' AND finished != '1'
		";
        return DB::get_results($query);
    }
	
	
	
	
	public static function SaveQuestion($tquestion, $answerone, $answertwo, $answerthree, $answerfour, $questionimage, $enabled, $goodanswer, $examid)    {
        $query = "INSERT INTO academy_questions (tquestion, answerone, answertwo, answerthree, answerfour, questionimage, enabled, goodanswer, examid)
                        VALUES('$tquestion', '$answerone', '$answertwo', '$answerthree', '$answerfour', '$questionimage', '$enabled', '$goodanswer', '$examid')";

        DB::query($query);
    }
	
	
	public static function SaveEditQuestion($id, $tquestion, $answerone, $answertwo, $answerthree, $answerfour, $questionimage, $enabled, $goodanswer)
	    {
        $query = "UPDATE academy_questions SET tquestion='$tquestion', answerone='$answerone', answertwo='$answertwo', answerthree='$answerthree' , answerfour='$answerfour', questionimage='$questionimage' , enabled='$enabled', goodanswer='$goodanswer' WHERE id='$id'";

        DB::query($query);
    }
	
	public static function EnableQuestion($id)
	    {
        $query = "UPDATE academy_questions SET enabled='1' WHERE id='$id'";

        DB::query($query);
    }
	
	public static function DisableQuestion($id)
	    {
        $query = "UPDATE academy_questions SET enabled='0' WHERE id='$id'";

        DB::query($query);
    }
	
	
	 public static function DeleteQuestion($id)    {
        $query = "DELETE FROM academy_questions WHERE id='$id'";

        DB::query($query);
    }
	
	
	
	public static function GetRandomQuestions($number, $setid) {
        $query = "SELECT id, goodanswer FROM academy_questions
		WHERE enabled = '1' AND examid ='$setid'
		ORDER BY RAND()
		LIMIT $number";
        return DB::get_results($query);
    }
	
	
	public static function CreateExam($email, $firstname, $lastname, $traid, $pilotid, $setid, $startdate)    {
		$setting = self::GetSettings($setid);
		$questions = self::GetRandomQuestions($setting->questioncount, $setid);
		
		if($firstname == '' || $firstname == ' ')
		{
			return;
		}
		
        $query = "INSERT INTO academy_exams (firstname, lastname, email, startdate, traid, pilotid, exsid)
                        VALUES('$firstname', '$lastname', '$email', '$startdate', '$traid', '$pilotid', '$setid')";

        DB::query($query);
		$examid = DB::$insert_id;
		
		
		foreach($questions as $question)
		{
			$questionid = $question->id;
			$goodanswer = $question->goodanswer;
			 $query2 = "INSERT INTO  academy_questions_active (qid, exid, correctanswer)
                        VALUES('$questionid', '$examid', '$goodanswer')";

        DB::query($query2);
		}
		
		$query3 = "SELECT qnum FROM academy_questions_active
		WHERE exid = '$examid'
		ORDER BY qnum ASC
		LIMIT 1";
        $lowest = DB::get_row($query3);
		
		$curquest = $lowest->qnum;
		 $query4 = "UPDATE academy_exams SET currentquestion='$curquest' WHERE id='$examid'";

        DB::query($query4);
		
		
	
		 $query5 = "UPDATE academy_trainings SET texamid='$examid' WHERE id='$traid'";

        DB::query($query5);
    }
	
	public static function GetExamEmail($email) {
        $query = "SELECT * FROM academy_exams
		WHERE email ='$email' AND finished != '1'
		LIMIT 1";
        return DB::get_row($query);
    }
	
	public static function GetExambyID($exid) {
        $query = "SELECT * FROM academy_exams
		WHERE id ='$exid'
		LIMIT 1";
        return DB::get_row($query);
    }
	
	
	public static function GetQuestionInfo($number, $exid) {
        $query = "SELECT s.*, q.* FROM academy_questions_active s
		LEFT JOIN academy_questions q ON s.qid=q.id
		WHERE qnum ='$number' AND exid = '$exid'";
        return DB::get_row($query);
    }
	
	public static function GetNextQuestion($exid) {
		$query = "SELECT currentquestion FROM academy_exams
		WHERE id ='$exid'
		LIMIT 1";
        $currquest = DB::get_row($query);
		
		
		$qquest = $currquest->currentquestion;
        $query2 = "SELECT qnum FROM academy_questions_active
		WHERE exid ='$exid' AND qnum > '$qquest' AND finished != '1'
		ORDER BY qnum ASC
		LIMIT 1";
        return DB::get_row($query2);
    }
	
	public static function IncrementCurrentQuestion($id)
	    {
			
		$nextquestion = self::GetNextQuestion($id);
		$nextq = $nextquestion->qnum;
		
        $query = "UPDATE academy_exams SET currentquestion='$nextq' WHERE id='$id'";

        DB::query($query);
    }
	
	public static function IncrementCurrentPenaltyQuestion($id)
	    {
			
		$nextquestion = self::GetNextQuestion($id);
		$nextq = $nextquestion->qnum;
			
        $query = "UPDATE academy_exams SET currentquestion='$nextq', wrongq=wrongq+1 WHERE id='$id'";

        DB::query($query);
    }
	
	
	public static function CorrectQuestion($id)
	    {
	
        $query = "UPDATE academy_exams SET correctq=correctq+1 WHERE id='$id'";

        DB::query($query);
    }
	
	
	public static function FalseQuestion($id)
	    {
	
        $query = "UPDATE academy_exams SET wrongq=wrongq+1 WHERE id='$id'";

        DB::query($query);
    }
	
	public static function MarkQuestionFinished($exid, $questionid, $useranswer)
	    {
	
        $query = "UPDATE academy_questions_active SET finished='1', givenanswer = '$useranswer' WHERE exid='$exid' AND qid='$questionid'";

        DB::query($query);
    }
	
	public static function FinishQuestionTest($exid, $questionid)
	    {
	
        $query = "SELECT * FROM academy_questions_active
		WHERE exid='$exid' AND qid='$questionid'
		";
        return DB::get_row($query);
    }
	
	public static function GetQuestionNum($exid, $qnum)
	    {
	
        $query = "SELECT * FROM academy_questions_active
		WHERE exid='$exid' AND qnum='$qnum'
		";
        return DB::get_row($query);
    }
	
	public static function IncrementPassed()
	    {
	
        $query = "UPDATE academy_exam_settings SET totalpassed=totalpassed+1";

        DB::query($query);
    }
	
	public static function IncrementFailed()
	    {
	
        $query = "UPDATE academy_exam_settings SET totalfailed=totalfailed+1";

        DB::query($query);
    }
	
	public static function GradeExam($exid, $reachedpercentage, $passfail, $gradedate)
	    {
	
        $query = "UPDATE academy_exams SET result='$reachedpercentage', passfail='$passfail', finished='1', gradedate='$gradedate' WHERE id='$exid'";

        DB::query($query);
		
		if($passfail == 'Passed')
		{
			$query2 = "UPDATE academy_trainings SET theoexampassed='1', progress = 'Theoretical Exam Passed' WHERE texamid='$exid'";
			
			DB::query($query2);
		}
		else
		{
            $query3 = "UPDATE academy_trainings SET texamid='0', theoexampassed='2', progress = 'Theoretical Exam Failed', exblocked = '1' WHERE texamid='$exid'";
			
			DB::query($query3);
		}
		
    }
	
	public static function GetActiveExams() {
        $query = "SELECT * FROM academy_exams
		WHERE finished ='0'
		";
        return DB::get_results($query);
    }
	
	public static function GetPassedExams() {
		
		$setting = self::GetSettings();
		
        $query = "SELECT * FROM academy_exams
		WHERE passfail ='Passed'
		";
        return DB::get_results($query);
    }
	
	public static function GetPassedExamsLim() {	
		
        $query = "SELECT * FROM academy_exams
		WHERE passfail ='Passed'
		LIMIT 20
		";
        return DB::get_results($query);
    }
	
	public static function GetFailedExams() {

        $query = "SELECT * FROM academy_exams
		WHERE passfail ='Failed'
		";
        return DB::get_results($query);
    }
	
	public static function DeleteExam($id)    {
        $query = "DELETE FROM academy_exam_settings WHERE id='$id'";

        DB::query($query);
    }
	
	public static function DeleteExamQuestions($id)    {
        $query = "DELETE FROM academy_questions WHERE examid='$id'";

        DB::query($query);
    }
	
	public static function GetExipredExams() {

        $query = "SELECT * FROM academy_exams
		WHERE finished='0' AND startdate < DATE_SUB(NOW(), INTERVAL $delday DAY)
		";
        return DB::get_results($query);
    }
	
}
