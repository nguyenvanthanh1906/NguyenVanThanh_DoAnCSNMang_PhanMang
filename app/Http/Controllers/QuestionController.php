<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Quiz;
use App\Answer;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=(new Question)->getQuestions();
        return view('backend.question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$this->validateForm($request);
        $question=(new Question)->storeQuestion($data);
        $answer=(new Answer)->storeAnswer($data,$question);
        return redirect(route('question.create'))->with('message','Tạo câu hỏi thành công');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question=(new Question)->getQuestionById($id);
        return view('backend.question.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question=(new Question)->getQuestionById($id);
        $quizzes=(new Quiz)->allQuiz();
        return view('backend.question.edit',compact('question','quizzes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$this->validateForm($request);
        $question=(new Question)->updateQuestion($data,$id);
        $answer=(new Answer)->updateAnswer($data,$question);
        return  redirect(route('question.index'))->with('message','Update cau hoi thanh cong');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    (new Question)->deleteQuestion($id);
    (new Answer)->deleteAnswer($id);
    return  redirect(route('question.index'))->with('message','Xoa cau hoi thanh cong');
    }
    public function validateForm($request){
        return $this->validate($request,[
            'quiz'=>'required',
            'question'=>'required|min:3',
            'options'=>'bail|required|array|min:4',
            'options.*'=>'bail|required|string|distinct',
            'correct_answer'=>'required'
        ]);
    }
}
