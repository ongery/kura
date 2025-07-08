@extends('layouts.strategic_app')

@section('content')
<div class="card row mt-2">
    <div class="card-header">
        <a href="/departments" class ="btn btn-success float-right">Back</a>
        <h3 class="card-title">The Department Form</h3>
    </div>

    @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach
 

    <!-- /.card-header -->
    <div class="card-body">
    
        
    {!! Form::open(['url' => 'department_form/store']) !!}
{{ csrf_field() }}
<div class="form-row">
<div class="form-group col-md-6">
  {{Form::label('Department Code', 'Department Code')}}
  {{Form::text('department_code', '',['class'=>'form-control','placeholder'=>'Department Code'])}}
</div>
<div class="form-group col-md-6">
  {{Form::label('Department Name', 'Department Name')}}
  {{Form::text('department_name', '',['class'=>'form-control','placeholder'=>'Department Name'])}}
</div>

</div>
<div>
{{Form::submit('Save Data',['class'=>'btn btn-outline-primary text-center',])}}
</div>
{!! Form::close() !!}
    </div>
</div>
@endsection