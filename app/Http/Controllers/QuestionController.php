<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;

class QuestionController extends Controller
{
    

    public function create(Survey $survey)
    {

        return view("doctor.layouts.question.create" , ['survey' => $survey]);

    }

    public function store(Request $request , Survey $survey)
    {

       // dd($request->all());

        $data = $request->validate([


            'question.question' => 'required',
            'answer.*.answer' => 'required'

        ]);

        $question = $survey->questions()->create($data['question']);

        $question->answers()->createMany($data['answer']);

        $request->session()->flash("questioncreated" , '<strong class="alert alert-success">Question Stored Successfuly..!</strong>');

        return back();
    }



}
