@extends('app')
@section('title' , 'Survey | '. $survey->name)

@section('content')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-5">
                <div class="login-wrap p-4 p-md-5">

                    <h3 class="text-center mb-4">{{$survey->name}}</h3>

                    @if ($errors->any())
                    <div class="alert alert-danger">

                        <ul>
                            @foreach ($errors->all() as $error )
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>

                    @endif


                <form action="/survey/finish/{{$survey->id}}" method="post">
                        @csrf
                        @foreach ($survey->questions as $key => $question )
                        <div class="card mb-2 shadow-sm">
                            <div class="card-header">
                                <h4>{{$question->question}}</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach ($question->answers as $answer)
                                    <label for="answer{{$answer->id}}">
                                        <li class="list-group-item">
                                            {{$answer->answer}}
                                            <input class="float-right mt-1" type="radio" class="form-group" name="response[{{$key}}][answer_id]"
                                                value="{{$answer->id}}" id="answer{{$answer->id}}">

                                            <input type="hidden" name="response[{{$key}}][question_id]"
                                                value="{{$question->id}}">
                                        </li>

                                    </label>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endforeach

                        <div class="card mt-3">
                            <div class="card-header">
                                <h4>Your Information</h4>
                            </div>
                            <div class="card-body">

                                <div class="form-group d-flex">
                                    <input type="text" name="user[name]" class="form-control rounded-left" placeholder="Name"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="user[email]" class="form-control rounded-left"
                                        placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3"
                                        onclick="this.disabled='disabled';this.closest('form').submit();">Submit</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
