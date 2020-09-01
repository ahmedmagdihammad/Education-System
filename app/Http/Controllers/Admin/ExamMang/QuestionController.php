<?php

namespace App\Http\Controllers\Admin\ExamMang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Question;
use App\Exam;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        $exams = Exam::all();
        return view('pages.examMang.questions', compact('questions', 'exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qusetion = new Question();
        $qusetion->exam = $request->exam_id;
        $qusetion->qtype = $request->question_type;
        $qusetion->question = $request->question;
        $qusetion->atype = $request->answer_type;
        $qusetion->answers = $request->correct_answer;
        $qusetion->correct = $request->correct_answer;
        $qusetion->content = $request->correct_answer;
        $qusetion->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $qusetion = Question::find($id);
        $qusetion->exam_id = $request->upexam_id;
        $qusetion->question_type = $request->upquestion_type;
        $qusetion->question = $request->upquestion;
        $qusetion->answer_type = $request->upanswer_type;
        $qusetion->correct_answer = $request->upcorrect_answer;
        $qusetion->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::find($id)->delete();
        return back();
    }
}
