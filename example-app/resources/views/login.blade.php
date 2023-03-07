@extends('layout')
@section('title', 'Login')

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
<form action="{{ route('login.post') }}" method="POST" class="ms-auto me-auto">
    @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection