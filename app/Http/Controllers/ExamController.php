<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\User;
use App\Result;
use App\Question;
use DB;
use App\Answer;
class ExamController extends Controller
{
    public function create(){
        $quizzes=(new Quiz)->allQuiz();
        $users=(new User)->allUsers();
        return view('backend.exam.create',compact('quizzes','users'));
    }
    
    public function assignExam(Request $request){
        $quiz=(new Quiz)->assignExam($request->all());
        return redirect()->back()->with('message','Tạo kì thi thành công');
    }

    public function userExam(){
        $quizzes=(new Quiz)->allQuiz();
        return view('backend.exam.index',compact('quizzes'));
    }

    public function removeExam(Request $request){
        $userId=$request->get('user_id');
        $quizId=$request->get('quiz_id');
        $quiz=Quiz::find($quizId);
        $result=Result::where('quiz_id',$quizId)->where('user_id',$userId)->exists();
        if($result){
            return redirect()->back()->with('message','Kì thi này đã hoàn thành, không thể xóa');
        }else{
            $quiz->users()->detach($userId);
            return redirect()->back()->with('message','Xóa kì thi thành công');
        }
    }

    public function getQuizQuestions($quizId){
        $authUser=auth()->user()->id;

        $userId=DB::table('quiz_user')->where('user_id',$authUser)->pluck('quiz_id')->toArray();
        if(!in_array($quizId,$userId)){
            return redirect()->to('/home')->with('error','You are not assign this exam');
        }

         
        $wasCompleted=Result::where('user_id',$authUser)->pluck('quiz_id')->toArray();
        if(in_array($quizId,$wasCompleted)){
            return redirect()->to('/home')->with('error','You are already paticipated this exam');
        } 





        $quiz=Quiz::find($quizId);
        $time=Quiz::where('id',$quizId)->value('minutes');
        $numberOfQuestions=Quiz::where('id',$quizId)->value('paging');
        $quizQuestions=Question::where('quiz_id',$quizId)->with('answers')->get();
        $authUserHasPlayedQuiz=Result::where(['user_id'=>$authUser,'quiz_id'=>$quizId])->get();
        

      
        
        return view('quiz',compact('quiz','time','numberOfQuestions','quizQuestions','authUserHasPlayedQuiz'));

    }

    public function postQuiz(Request $request){
        $questionId=$request['questionId'];
        $answerId=$request['answerId'];
        $quizId=$request['quizId'];

        $authUser=auth()->user();
        $answer=Result::where([['user_id',$authUser->id],['quiz_id',$quizId],['question_id',$questionId]])->first();
        if($answer){
            return $userQuestionAnswer=Result::find($answer->id)->update(['answer_id'=> $answerId]);
            
        }
    else{
        return $userQuestionAnswer=Result::create(['user_id'=> $authUser->id, 'quiz_id'=>$quizId, 'question_id'=>$questionId, 'answer_id'=> $answerId]
    );
    }
    }   

    public function viewResult($userId,$quizId){
        $results=Result::where('user_id',$userId)->where('quiz_id',$quizId)->get();
        return view('result-detail',compact('results'));
    }

    public function result(){
        $quizzes=(new Quiz)->allQuiz();
        return view('backend.result.index',compact('quizzes'));
    }

    public function userQuizResult($userId,$quizId){
        $results=Result::where('user_id',$userId)->where('quiz_id',$quizId)->get();
        $totalQuestions=Question::where('quiz_id',$quizId)->count();
        $attemptQuestion=Result::where('quiz_id',$quizId)->where('user_id',$userId)->count();
        $quiz=Quiz::where('id',$quizId)->get();
        $answers=[];
        foreach($results as $answer){
            array_push($answers,$answer->answer_id);
        }
        $userCorrectedAnswer=Answer::whereIn('id',$answers)->where('is_correct',1)->count();
        $userWrongAnswer=$totalQuestions-$userCorrectedAnswer;
        if($attemptQuestion){
            $percentage=($userCorrectedAnswer/$totalQuestions)*100;
        }else{
            $percentage=0;
        }
        
        return view('backend.result.result',compact('results','totalQuestions','attemptQuestion','userCorrectedAnswer','userWrongAnswer','percentage','quiz'));
    }
}
