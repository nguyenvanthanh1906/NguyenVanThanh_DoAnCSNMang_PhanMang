<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\Quiz;
use App\User;
use App\Result;
class Quiz extends Model
{
    protected $fillable = ['name','description','minutes','paging' ];
    
    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function users(){
        return $this->belongsTomany(User::class,'quiz_user');
    }

    public function storeQuiz($data){
        return Quiz::create($data);
    }

    public function allQuiz(){
        return Quiz::all();
    }

    public function getQuizById($id){
        return Quiz::find($id);
    }

    public function updateQuiz($data,$id){
        return Quiz::find($id)->update($data);
    }

    public function deleteQuiz($id){
        return Quiz::find($id)->delete();
    }

    public function assignExam($data){
        $quizId=$data['quiz_id'];
        $quiz=Quiz::find($quizId);
        foreach($data['user_id'] as $userId){
         $quiz->users()->sync($userId);
         
         
        }
    }

    public function hasQuizAttempted(){
        $attemptQuiz=[];
        $authUser=auth()->user()->id;
        $user=Result::where('user_id',$authUser)->get();
        foreach($user as $u){
            array_push($attemptQuiz,$u->quiz_id);
        }
        return $attemptQuiz;
    }
}
