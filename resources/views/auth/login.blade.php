@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row mh-100vh">
        <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
            <div class="m-auto w-lg-75 w-xl-50">
                <h4 class="text-info font-weight-light mb-5"><i class="fa fa-diamond"></i>THU DAU MOT UNIVERSITY</h4>
                <form action="{{ route('user.login') }} " method="POST">
                    @csrf
                    @include('layouts.message')
                    <div class="form-group">
                        <a href="/redirect/facebook" class="text-secondary"><i class="fa fa-facebook" style="font-size: 30px;color: #2962ff" aria-hidden="true"></i>  Đăng nhập bằng tài khoản Facebook</a><br>
                        <a href="/redirect/google" class="text-secondary"><i class="fa fa-google" style="font-size: 25px;color: #ff2400" aria-hidden="true"></i> Đăng nhập bằng tài khoản Google</a>

                    </div>
                    <div class="form-group">
                        <label class="text-secondary">Email</label>
                        <input class="form-control" type="text" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$" name="email"></div>
                    <div class="form-group">
                        <label class="text-secondary">Password</label>
                        <input class="form-control" type="password" required="" name="password">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                        <button class="btn btn-info mt-2" type="submit">Log In</button>
                        </form>
                <p class="mt-3 mb-0"><a href="#" class="text-info small">Forgot your email or password?</a></p>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image: url(&quot;assets/img/TDMU.jpg&quot;);background-size: cover;background-position: center center;">
            <p class="ml-auto small text-dark mb-2">Thu Dau Mot University</p>
        </div>
    </div>
</div>
@endsection