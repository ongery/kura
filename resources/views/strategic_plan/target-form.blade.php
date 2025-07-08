@extends('layouts.strategic_app')






@section('content')
<div class="card row mt-2">
    <div class="card-header">
        <a href="/target" class ="btn btn-success float-right">Back</a>
        <h3 class="card-title">Add Target</h3>
    </div>

{{--     @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach --}}
        @forelse ($dataid as $dataid)
          @empty       
        @endforelse
 

    <!-- /.card-header -->
    <div class="card-body">


      <form {{ action('App\Http\Controllers\targetController@store',['scorecard_id' => $dataid->scorecard_id]) }}  method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label> Baseline 2020(Number) </label>
                    <input type="text" class="form-control" name="b_2020" placeholder="2020 Target">
                </div>
                <small class="error alert-danger" role="alert">{{ $errors->first('b_2020') }}</small>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> 2021(Number) </label>
                    <input type="text" class="form-control" name="b_2021" placeholder="2021 Target">
                </div>
                <small class="error alert-danger" role="alert">{{ $errors->first('b_2021') }}</small>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> 2022(Number)</label>
                    <input type="text" class="form-control" name="b_2022" placeholder="2022 Target">
                </div>
                <small class="error alert-danger" role="alert">{{ $errors->first('b_2022') }}</small>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> 2023(Number) </label>
                    <input type="text" class="form-control" name="b_2023" placeholder="2023 Target">
                </div>
                <small class="error alert-danger" role="alert">{{ $errors->first('b_2023') }}</small>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> 2024(Number) </label>
                    <input type="text" class="form-control" name="b_2024" placeholder="2024 Target">
                </div>
                <small class="error alert-danger" role="alert">{{ $errors->first('b_2024') }}</small>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> 2025(Number) </label>
                    <input type="text" class="form-control" name="b_2025" placeholder="2025 Target">
                </div>
                <small class="error alert-danger" role="alert">{{ $errors->first('b_2025') }}</small>
            </div>
        </div>
        {{-- <button type="submit" class="btn btn-outline-primary text-center"> <i class="fa fa-save"></i> Save Data</button> --}}
        <button class="btn btn-primary mt-auto" type="submit" name="action">Save Data</button>
        <hr>
      </form>


    </div>
</div>
@endsection