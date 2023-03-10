@extends('layout')
@section('title', 'Home Page')
@section('content')

@auth
<div class="container text-center">
  <div class="row">
    <div class="col-sm-3">
      <button class="btn btn-outline-success me-2" type="button" onclick="window.location.href = '{{route('employee.list')}}'">Employees</button>
     
    </div>
    
  </div>
</div>
@endauth
@endsection