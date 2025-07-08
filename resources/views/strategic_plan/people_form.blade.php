@extends('layouts.strategic_app')






@section('content')
<div class="card row mt-2">
    <div class="card-header">
        <a href="/people" class ="btn btn-success float-right">Back</a>
        <h3 class="card-title">Various Departmental Persons</h3>
    </div>

    @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach
 

    <!-- /.card-header -->
    <div class="card-body">
    
        
{!! Form::open(['url' => 'people_form/store']) !!}
{{ csrf_field() }}
<div class="form-row">
<div class="form-group col-md-6">
  {{Form::label('FullNames', 'Fullnames')}}
  {{Form::text('names', '',['class'=>'form-control','placeholder'=>'Persons Fullnames'])}}
</div>

<div class="form-group col-md-6">
{{Form::label('Department', 'Department')}}
<select name="department" class="form-control">
@foreach($depts as $row)
<option value="{{$row->department_name}}">{{$row->department_name}}</option>
@endforeach
</select>
</div>

<div class="form-group col-md-12">
  {{Form::label('Position', 'Position')}}
  {{Form::text('level', '',['class'=>'form-control','placeholder'=>'Departmental Position'])}}
</div>
</div>
<div>
  {{Form::submit('Save Data',['class'=>'btn btn-outline-primary text-center',])}}
</div>
{!! Form::close() !!}


    </div>
</div>
@endsection