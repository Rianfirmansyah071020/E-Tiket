@extends('layouts.user')

@section('content')
    <div class="login-form-bg h-100 mt-5">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="/home">
                                    <h4>Login E-Tiket</h4>
                                </a>
                                <form class="mt-5 mb-5 login-input" action="/login" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input name="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" @error('password') is-invalid @enderror"
                                            class="form-control" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
