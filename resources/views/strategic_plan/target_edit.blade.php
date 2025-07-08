@extends('layouts.strategic_app')






@section('content')
<div class="card row mt-2">
    <div class="card-header">
        <a href="/target" class ="btn btn-success float-right">Back</a>
        <h3 class="card-title">Add Target</h3>
    </div>

    @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach

        @forelse ($row as $row)
          @empty       
        @endforelse


    <!-- /.card-header -->
    <div class="card-body">


        <form action="{{ route('target.update', $row->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
<div class="form-row">
<div class="form-group col-md-4">
  {{Form::label('Baseline 2020', 'Baseline 2020(Number)')}}
  <input type="text" name="b_2020" class="form-control" value="{{ $row->b_2020 }}">
</div>

<div class="form-group col-md-4">
{{Form::label('b_2021', '2021(Number)')}}
<input type="text" name="b_2021" class="form-control" value="{{ $row->b_2021 }}">
</div>

<div class="form-group col-md-4">
  {{Form::label('b_2022', '2022(Number)')}}
  <input type="text" name="b_2022" class="form-control" value="{{ $row->b_2022 }}">
</div>

<div class="form-group col-md-4">
  {{Form::label('b_2023', '2023(Number)')}}
  <input type="text" name="b_2023" class="form-control" value="{{ $row->b_2023 }}">
</div>
<div class="form-group col-md-4">
  {{Form::label('b_2024', '2024(Number)')}}
  <input type="text" name="b_2024" class="form-control" value="{{ $row->b_2024 }}">
</div>

<div class="form-group col-md-4">
  {{Form::label('b_2025', '2025(Number)')}}
  <input type="text" name="b_2025" class="form-control" value="{{ $row->b_2025 }}">
</div>
</div>
<div>
  {{Form::submit('Save Data',['class'=>'btn btn-outline-primary text-center',])}}
</div>
{!! Form::close() !!}


    </div>
</div>
@endsection
