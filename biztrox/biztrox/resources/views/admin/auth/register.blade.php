@extends('admin.master')

@section('title')
    Register
@endsection
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form class="form-horizontal" action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter username">
                    </div>

                    <div class="form-group">
                        <label for="useremail">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="userpassword">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                    </div>

                    <div class="form-group">
                        <label for="userpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Enter password">
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register</button>
                    </div>

                    <div class="mt-4 text-center">
                        <h5 class="font-size-14 mb-3">Sign up using</h5>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                                    <i class="mdi mdi-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                                    <i class="mdi mdi-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                                    <i class="mdi mdi-google"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-4 text-center">
                        <p class="mb-0">By registering you agree to the Skote <a href="#" class="text-primary">Terms of Use</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
