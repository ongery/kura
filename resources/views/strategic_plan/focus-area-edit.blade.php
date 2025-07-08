@extends('layouts.strategic_app')






@section('content')
<div class="card row mt-2">
    <div class="card-header">
        <a href="/focus-area" class ="btn btn-success float-right">Back</a>
        <h3 class="card-title">Edit Your FocusArea</h3>
    </div>

    @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach


    <!-- /.card-header -->
    <div class="card-body">

<form action="{{ route('focus-area.update', $row->id) }}" method="post">
{{ csrf_field() }}
@method('PUT') 
<div class="form-row">
<div class="form-group col-md-6">
  <label for="">Goal/Focus Area / Piller</label>
  <input type="text" name="goal" value="{{ $row->goal }}" class="form-control">
</div>

<div class="form-group col-md-6">
    <label for="">Department Responsible</label>
     <br>
    <input type="text" name="department" value="{{ $row->department }}" class="form-control">
    <script src="{{ asset('js/script.js') }}"></script>
</div>

<div class="form-group col-md-12">

  <label for="">Description</label>
  <textarea class="form-control" name="description" cols="15" rows="5"> {{ $row->description }} </textarea>

</div>


</div>
<div>
  <button type="submit" name="submit" class="btn btn-success">Save</button>
</div>
</form>


    </div>
</div>
@endsection




