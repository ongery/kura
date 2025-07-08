@extends('layouts.strategic_app')






@section('content')
<div class="card row mt-2">
    <div class="card-header">
        <a href="/score-card" class ="btn btn-success float-right">Back</a>
        <h3 class="card-title">Edit Your Score Card</h3>
    </div>

    @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach


    <!-- /.card-header -->
    <div class="card-body">


        <form action="{{ route('score.update', $row->scorecard_id) }}" method="post">
            {{ csrf_field() }}
            @method('PUT')
<div class="form-row">
<div class="form-group col-md-4">
  {{Form::label('goal', 'Goal/Focus Area / Piller')}}
    <input type="text" name="goal" class="form-control" value="{{ $row->goal }}">

</div>

<div class="form-group col-md-4">
{{Form::label('scorecardarea', 'Score Card Area')}}
<input type="text" name="scorecardarea" class="form-control" value="{{ $row->scorecardarea }}">
</div>

<div class="form-group col-md-4">
  {{Form::label('objective', 'Strategic Objective')}}
  <input type="text" name="objective" class="form-control" value="{{ $row->objective }}">
</div>

<div class="form-group col-md-4">
  {{Form::label('measure', 'Measure')}}
  <input type="text" name="measure" class="form-control" value="{{ $row->measure }}">
</div>
<div class="form-group col-md-4">
  {{Form::label('monitoring', 'Monitoring Type')}}
  <input type="text" name="monitoring" class="form-control" value="{{ $row->monitoring }}">
</div>


<div class="form-group col-md-4">
  {{Form::label('priority', 'Select Priority')}}
  <input type="text" name="priority" class="form-control" value="{{ $row->priority }}">
</div>

<div class="form-group col-md-4">
  {{Form::label('indicator', 'Indicator')}}
  <input type="text" name="indicator" class="form-control" value="{{ $row->indicator }}">
</div>

<div class="form-group col-md-4">
  {{Form::label('frequency', 'Monitoring Frequency')}}
  <input type="text" name="frequency" class="form-control" value="{{ $row->frequency }}">
</div>

<div class="form-group col-md-4">
  {{Form::label('department', 'Department')}}
  <input type="text" name="department" class="form-control" value="{{ $row->department }}">
</div>

<div class="form-group col-md-4">
  {{Form::label('person', 'Person Responsible')}}
  <input type="text" name="person" class="form-control" value="{{ $row->person }}">
</div>


</div>
<div>
  {{Form::submit('Save Data',['class'=>'btn btn-outline-primary text-center',])}}
</div>
{!! Form::close() !!}


    </div>
</div>
@endsection
