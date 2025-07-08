@extends('layouts.strategic_app')






@section('content')
<div class="card row mt-2">
    <div class="card-header">
        <a href="/profile" class ="btn btn-success float-right">Back</a>
        <h3 class="card-title">Edit Your Profile</h3>
    </div>

    @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach


    <!-- /.card-header -->
    <div class="card-body">


<form action="{{ route('profile.update', $row->id) }}" method="post">
    {{ csrf_field() }}
    @method('PUT')
<div class="form-row">
<div class="form-group col-md-12">
  {{Form::label('Vision', 'vision')}}
  <input type="text" name="vision" class="form-control" value="{{ $row->vision }}">
</div>

<div class="form-group col-md-12">
{{Form::label('Mission', 'Mission')}}
<input type="text" name="mission" class="form-control" value="{{ $row->mission }}">
</div>

<div class="form-group col-md-6">
  {{Form::label('How We Will Win', 'Position')}}
  <textarea type="text" name="how_win" class="form-control" cols="20" rows="10"> {{ $row->how_win }} </textarea>
</div>

<div class="form-group col-md-6">
  {{Form::label('Core Values', 'Position')}}
  <textarea type="text" name="core_values" class="form-control" cols="20" rows="10"> {{ $row->core_values }} </textarea>
</div>
</div>
<div>
  {{Form::submit('Save Data',['class'=>'btn btn-outline-primary text-center',])}}
</div>
{!! Form::close() !!}


    </div>
</div>
@endsection
