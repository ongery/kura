@extends('layouts.strategic_app')






@section('content')
<div class="card row mt-2">
    <div class="card-header">
        <a href="/score-card" class ="btn btn-success float-right">Back</a>
        <h3 class="card-title">Create Your Score Card</h3>
    </div>

    @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach


    <!-- /.card-header -->
    <div class="card-body">


{!! Form::open(['url' => 'score-card-form/store']) !!}
{{ csrf_field() }}
<div class="form-row">
<div class="form-group col-md-4">
  {{Form::label('goal', 'Strategic Piller')}}

<select name="goal" class="form-control">
  <option value="">-- Select Strategic Piller --</option>
@foreach($focus as $row)
<option value="{{$row->goal}}">{{$row->goal}}</option>
@endforeach
</select>

</div>

<div class="form-group col-md-4">
    <label for="">Strategic Objective</label>
    <select name="objective" class="form-control">
        <option selected disabled> Select Objective </option>
        @foreach ($objective as $row)
          <option value="{{ $row->name }}">{{ $row->name }}</option>
        @endforeach
    </select>
  </div>

<div class="form-group col-md-4">
{{Form::label('Target', 'Target')}}
{{Form::text('target', '',['class'=>'form-control','placeholder'=>'Enter Target'])}}
</div>



<div class="form-group col-md-4">
  {{Form::label('measure', 'Measure (KPI)')}}
  {{Form::text('measure', '',['class'=>'form-control','placeholder'=>'Enter Measure'])}}
</div>
{{-- <div class="form-group col-md-4">
  {{Form::label('monitoring', 'Monitoring Type')}}
  {{Form::select('monitoring', [''=>'Select Monitoring Type','Track'=>'Track','Benchmark'=>'Bench Mark'],null,['class'=>'form-control'])}}
</div> --}}


{{-- <div class="form-group col-md-4">
  {{Form::label('priority', 'Select Priority')}}
  {{Form::select('priority', [''=>'Select Priority','Low'=>'Low','Medium'=>'Medium','High'=>'High'],null,['class'=>'form-control'])}}
</div> --}}

{{-- <div class="form-group col-md-4">
  {{Form::label('indicator', 'Indicator')}}
  {{Form::select('indicator', [''=>'Select Indicator','Percentage'=>'Percentage','Number'=>'Number','USD'=>'USD','KSH'=>'KSH'],null,['class'=>'form-control'])}}
</div> --}}

<div class="form-group col-md-4">
  {{Form::label('frequency', 'Monitoring Frequency')}}
  {{Form::select('frequency', [''=>'Select Monitoring Frequency','Daily'=>'Daily','Weekly'=>'Weekly','Monthly'=>'Monthly','Quarterly'=>'Quarterly','Half Year'=>'Half Year','Annually'=>'Annually','BiAnnual'=>'BiAnnual',],null,['class'=>'form-control'])}}
</div>

<div class="form-group col-md-4">
  {{Form::label('department', 'Department')}}
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
