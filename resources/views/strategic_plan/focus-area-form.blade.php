@extends('layouts.strategic_app')






@section('content')
<div class="card row mt-2">
    <div class="card-header">
        <a href="/focus-area" class ="btn btn-success float-right">Back</a>
        <h3 class="card-title">Create Your FocusArea</h3>
    </div>

    @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach


    <!-- /.card-header -->
    <div class="card-body">


{!! Form::open(['url' => 'focus-area-form/store']) !!}
{{ csrf_field() }}
<div class="form-row">
<div class="form-group col-md-6">
  {{Form::label('focus', 'Strategic Piller')}}
  {{Form::text('goal', '',['class'=>'form-control','placeholder'=>'Strategic Piller'])}}
</div>

{{-- <div class="form-group col-md-6">
    {{Form::label('department', 'Department Responsible')}}
     <br>
    <select name="department[]" class="form-control" id="multiple-checkboxes" multiple="multiple">
        @foreach($depts as $row)
            <option value="{{$row->department_name}}"> {{$row->department_name}} </option>
        @endforeach
    </select>
    <script src="{{ asset('js/script.js') }}"></script>
</div> --}}

<div class="form-group col-md-12">

  {{Form::label('description', 'Description')}}

  {{Form::textarea('description', '',['class'=>'form-control','placeholder'=>'Description'])}}

</div>


</div>
<div>
  {{Form::submit('Save Data',['class'=>'btn btn-outline-primary text-center',])}}
</div>
{!! Form::close() !!}


    </div>
</div>
@endsection




