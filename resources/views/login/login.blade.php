@extends('master.front.master')

@section('title')
    Login Page
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h4> Login Form</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-center text-danger">{{ Session::get('message') }}</p>
                            <form action="{{ route('new-login') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <label class="col-form-label col-md-3">Email Address</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email"/>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <label class="col-form-label col-md-3">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password"/>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <label class="col-form-label col-md-3">Login As</label>
                                    <div class="col-md-9">
                                        <label><input type="radio" name="check" value="1" required/> Teacher</label>
                                        <label><input type="radio" name="check" value="0" required/> Student</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-form-label col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-outline-success" value="Login"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
