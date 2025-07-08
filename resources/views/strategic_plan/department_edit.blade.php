@extends('layouts.strategic_app')

@section('content')
<div class="card row mt-2">
    <div class="card-header">
        <a href="/departments" class ="btn btn-success float-right">Back</a>
        <h3 class="card-title">Department Update</h3>
    </div>

    @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach
 

    <!-- /.card-header -->
    <div class="card-body">
 
    </div>
</div>
@endsection