@extends('app')
@section('title' , 'Sign Up')

@section('content')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="login-wrap p-4 p-md-5">
              <div class="icon d-flex align-items-center justify-content-center">
                  <span class="fa fa-user-o"></span>
              </div>
              <h3 class="text-center mb-4">Sign Up</h3>
            
             
                    <form action="/reg" class="login-form" method="post" >
                        @csrf
                  <div class="form-group">
                      @error('username')
                  <span>{{$message}}</span>
                      @enderror
                      <input type="text" name="name" class="form-control rounded-left" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control rounded-left" placeholder="Email" required>
                </div>


            <div class="form-group d-flex">
              <input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
            </div>
     
            <div class="form-group">
                <button type="submit" onclick="this.disabled='disabled';this.closest('form').submit();" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
            </div>
            <div class="form-group d-md-flex">
                <div class="w-50">
                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                  <input type="checkbox" checked>
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="#">Forgot Password</a>
                            </div>
            </div>
          </form>
        </div>
            </div>
        </div>
    </div>
</section>

@endsection
