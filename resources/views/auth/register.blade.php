@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <form action="{{route('register.store')}}" method="POST" class="card px-5 py-5" id="form1">
                    @csrf
                    <div class="form-data">
                        <div class="forms-inputs mb-4"> <span>Name</span>
                            <input class="form-control" name="name" autocomplete="off" type="text" />
                        </div>
                        <div class="forms-inputs mb-4"> <span>Email</span>
                            <input class="form-control" name="email" autocomplete="off" type="text" />
                        </div>
                        <div class="forms-inputs mb-4"> <span>Password</span>
                            <input class="form-control" autocomplete="off" type="password" name="password" />
                        </div>

                        <div class="forms-inputs mb-4"> <span>Phone</span>
                            <input class="form-control" autocomplete="off" type="tel" name="phone" />
                        </div>
                        <div class="mb-3"> <button  class="btn btn-dark w-100">Register</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
