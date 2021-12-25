@extends('profile.app')
@section('title' , 'Profile')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Messenger</h1>
            <ol class="breadcrumb mb-4" style="background: none;">
                <li class="breadcrumb-item active">{{$friend->name}}</li>
            </ol>

            <div class="row">

                <div class=" col-md-12">

                    <div class="modal-content chat-box">
                        <div class="modal-header">
                            <h5 class="modal-title">Chat With <strong>{{$friend->name}}</strong></h5>
                        </div>
                        <div class="modal-body d-flex justify-content-center">

                            <div id="messages" class="messages bg-dark p-3 border border-light shadow shadow-md rounded-3 m-4"
                                style="height:15rem;width:70%;overflow-y:auto;">
                            </div>

                        </div>

                        <div class="modal-footer justify-content-between">
                            
                                <textarea style="height:15px;width:80%;" name="message" id="message" maxlength="1000"
                                    class="form-control" placeholder="Type.."></textarea>

                        <button  class="btn btn-primary" data-to="{{$friend->id}}" data-from="{{auth()->id()}}" id="send">Send</button>


                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>



@endsection

@push("app-scripts")
<script type="text/javascript" src="{{ asset("js/chat.js") }}"></script>
@endpush