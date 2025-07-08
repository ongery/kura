@extends('layouts.strategic_app')






@section('content')
<div class="card row mt-2">
    <div class="card-header">
        <a href="/work-plan" class ="btn btn-success float-right">Back</a>
        <h3 class="card-title">Edit Your Work Plan</h3>
    </div>

    @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach


    <!-- /.card-header -->
    <div class="card-body">



        <form action="{{ route('workplan.update', $row->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
<div class="form-row">
<div class="form-group col-md-4">
  {{Form::label('objective', 'Strategic Objective')}}
<select name="objective" class="form-control">
@foreach($score as $row)
<option value="{{$row->objective}}">{{$row->objective}}</option>
@endforeach
</select>
</div>

<div class="form-group col-md-4">
{{Form::label('activity', 'Activity')}}
{{Form::text('activity', '',['class'=>'form-control','placeholder'=>'Enter Activity'])}}
</div>

<div class="form-group col-md-4">
  {{Form::label('description', 'Description')}}
  {{Form::text('description', '',['class'=>'form-control','placeholder'=>'Enter Description'])}}
</div>

<div class="form-group col-md-4">
  {{Form::label('date', 'Start Date')}}
  {{Form::date('date', '',['class'=>'form-control'])}}
</div>
<div class="form-group col-md-4">
  {{Form::label('deadline', 'Deadline Date')}}
  {{Form::date('deadline', '',['class'=>'form-control'])}}
</div>


<div class="form-group col-md-4">
  {{Form::label('KPI', 'KPI')}}
  {{Form::text('KPI', '',['class'=>'form-control','placeholder'=>'Enter KPI'])}}
</div>

<div class="form-group col-md-4">
  {{Form::label('outcome', 'Desired Outcome')}}
  {{Form::text('outcome', '',['class'=>'form-control','placeholder'=>'Enter Desired Outcome'])}}
</div>

<div class="form-group col-md-4">
  {{Form::label('one_off_cost', 'One Off Cost')}}
  {{Form::text('one_off_cost', '',['class'=>'form-control','placeholder'=>'Enter One Off Cost'])}}
</div>

<div class="form-group col-md-4">
  {{Form::label('ongoing-cost', 'Ongoing Cost')}}
  {{Form::text('ongoing_cost', '',['class'=>'form-control','placeholder'=>'Enter Ongoing Cost'])}}
</div>

<div class="form-group col-md-4">
  {{Form::label('Days Left', 'Days Left')}}
  {{Form::text('days_left', '',['class'=>'form-control','type'=>'number','placeholder'=>'Enter Days Left'])}}
</div>

<div class="form-group col-md-4">
    <label for="">Status</label>
    <select name="status" class="form-control">
        <option value="">-- Select Status --</option>
        <option value="Not Started Not due">Not Started Not due</option>
        <option value="Work In Progress oncoarse">Work In Progress oncoarse</option>
        <option value="Work In Progress over due">Work In Progress over due</option>
        <option value="Not started over due">Not started over due</option>
        <option value="Differed">Differed</option>
        <option value="Overdue">Overdue</option>
    </select>
</div>

<div class="form-group col-md-4">
  {{Form::label('department', 'Department Responsible')}}
      <select class="bootstrap-select form-control show-tick dynamic" value="{{ old('department') }}" name="department" data-dependent="names" id="department" >
        <option value="">-- Select Department --</option>
        @foreach($people_list as $datapeople)
        <option value="{{ $datapeople->department}}">{{ $datapeople->department }}</option>
        {{-- {{ $datapeople->department}} --}}
        @endforeach
    </select>
</div>

<div class="form-group col-md-4">
  {{Form::label('person', 'Person Responsible')}}
      <select class="bootstrap-select form-control show-tick" name="person" id="names" data-live-search="true" value="{{ old('person') }}">
      </select>
</div>
</div>
<div>
  {{Form::submit('Save Data',['class'=>'btn btn-outline-primary text-center',])}}
</div>
{!! Form::close() !!}


    </div>
</div>

        <!--- dropdown start here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
       $('.dynamic').change(function(){
        if($(this).val() != '')
        {
         var select = $(this).attr("id");
         var value = $(this).val();
         var dependent = $(this).data('dependent');
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('people.datafetch') }}",
          method:"get",
          data:{select:select, value:value, _token:_token, dependent:dependent},
          success:function(result)
          {
           $('#'+dependent).html(result);
          }
         })
        }
       });
       $('#department').change(function(){
        $('#names').val('');
       });
      });
    </script>
@endsection
