@extends('layout.main')
@section('title','Login')
@section('container')
<body class="bg">
    <div class="main-content">
        <!-- Page content -->
        <div class="container pt-6">
            <div class="row form-login justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card" style="background-color: #E2E7D5;">
                <div class="card-header">
                    {{-- <div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div> --}}
                    <div class="btn-wrapper text-center mt-2">
                        {{-- <a href="#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon"><i class="fab fa-google"></i></span>
                            <span class="btn-inner--text">Github</span>
                        </a>
                        <a href="#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon"><i class="fab fa-github"></i></span>
                            <span class="btn-inner--text">Google</span>
                        </a> --}}
                        <h1><img src="{{url('argon/assets/img/icons/logokly.png')}}" class="navbar-brand-img" alt="Logo Pyxis"></h1>
                    </div>
                </div>
                <div class="card-body px-lg-5">
                    <div class="text-center text-muted mb-4">
                        <b>Selamat Datang</b>
                        @include('layout.with')
                    </div>
                    <form role="form" action="{{url('/login')}}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input autocomplete="off" autofocus class="form-control" required placeholder="ID ADMIN" type="text" name="nia">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="PASSWORD" required type="password" name="password">
                        </div>
                    </div>
                    <div class="custom-control custom-control-alternative custom-checkbox">
                        <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                        <label class="custom-control-label" for=" customCheckLogin">
                        <span class="text-muted">Remember me</span>
                        </label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4 btn-login">Sign in</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@include('layout.js')
</body>
@endsection
