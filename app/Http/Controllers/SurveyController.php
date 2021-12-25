<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    

    public function index()
    {
        $surveys = Survey::all();

        return view("doctor.layouts.survey.index" , ['surveys'=>$surveys]);
    }

    public function show($id)
    {
        $survey = Survey::findOrFail($id);

        $survey->with("questions.answers");

        return view("doctor.layouts.survey.show" , ['survey'=>$survey]);
    }

    public function create()
    {
        return view("doctor.layouts.survey.create");
    }

    public function store(Request $request)
    {

        $data = $request->validate([

            'name' => 'required|string',
            'description' => 'string'
        ]);

        $survey = Auth::user()->surveys()->create($data);

        $request->session()->flash('surveycreated' , '<strong class="alert alert-success">'.$data['name'].' Created Succesfuly..!</strong>');

        return back();

    }
    

    public function ShowForGuest(Survey $survey)
    {
        $survey->load("questions.answers");

        return view("layouts.survey" , ['survey'=>$survey]);
    }

    public function FinishSurvey(Request $request , $id)
    {
        
        $data = $request->validate([

            'response.*.answer_id' => 'required',
            'response.*.question_id' => 'required',
            'user.name' => 'required|string',
            'user.email' => 'required|email'
        ]);

        $survey = Survey::findOrFail($id);

        $survey->responses()->createMany($data['response']);

        $survey->FinishedSurveys()->create($data['user']);

        $request->session()->flash('surveyfinished' , "<strong class='alert alert-success'>Thank You..</strong>");

        return back();
    }


}
