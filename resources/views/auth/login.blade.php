@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-5" id="form1">
                    <form action="{{route('login.authenticate')}}" method="POST"  class="form-data">
                        @csrf
                        <div class="forms-inputs mb-4"> <span>Email or username</span>
                            <input class="form-control" name="email" autocomplete="off" type="text" />
                            <div class="invalid-feedback">A valid email is required!</div>
                        </div>
                        <div class="forms-inputs mb-4"> <span>Password</span>
                            <input class="form-control" autocomplete="off" type="password" name="password" />
                            <div class="invalid-feedback">Password must be 8 character!</div>
                        </div>
                        <div class="mb-3"> <button  class="btn btn-dark w-100">Login</button> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
