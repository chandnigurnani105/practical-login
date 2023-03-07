@extends('layout')
@section('title', 'Registration')

@section('content')
<div class="container">
    <div class="mt-5">
        @if($errors->any())
            <div> 
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            </div>
        @endif

        @if(session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>

        @endif
         @if(session()->has('success'))
        <div class="alert alert-sucess">{{session('success')}}</div>

        @endif
    </div>
    <form class="ms-auto me-auto" action="{{route('registration.post')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputName" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"> 
        </div>
        <div class="mb-3">
            <label for="exampleInputMobile" class="form-label">Mobile</label>
            <input type="text" class="form-control" id="exampleInputMobile" name="mobile">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection